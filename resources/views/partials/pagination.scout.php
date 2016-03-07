<nav>
    <?php
    global $wp_query;
    $max = intval($wp_query->max_num_pages);
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    sort($links);

    ?>
    @if($max > 1)
    <div class="pagination-wrapper">
        <ul class="pagination pagination-lg">
            @if($paged-1 > 0)
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @endif
            @foreach($links as $link)
            <li>
                @if($link == $paged)
                <span class="page-numbers current">
                    {{ $link }}
                </span>
                @else
                <a href="{{ get_pagenum_link($link) }}" class="page-numbers">
                    {{ $link }}
                </a>
                @endif
            </li>
            @endforeach
            @if($paged+1 <= $max)
            <li>
                <a href="{{ get_pagenum_link($paged+1) }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    @endif

</nav>

