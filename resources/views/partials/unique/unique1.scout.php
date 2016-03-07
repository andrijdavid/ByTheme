{{-- Mahintsy --}}
<div class="row mt-20">
    <div class="col col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
        <div class="media">
            <div class="media-left media-middle">
                <a href="{{  $link }}">
                    <img src="{{  $thumbnail }}" alt="{{  $title }}"
                         class="media-object"
                         width="244px" height="300px">
                </a>
            </div>
            <div class="media-body">
                <h2 class="media-heading">
                    <a href="{{  $link }}">{{ $title }}</a>
                </h2>
                <p class="text-justified">
                    <?php _e('Published at ', THEME_TEXT_DOMAIN) ?>
                    <a
                        href="{{get_day_link($year, $month, $day)}}">
                        <time datetime="{{$date}}">{{$date}}</time>
                    </a>
                    @unless(empty($category))
                    @foreach($category as $item)
                    <span>/</span>
                    <a href="{{ get_term_link($item)}}" rel="category">{{ $item->name }}</a>
                    @endforeach
                    @endunless
                </p>

                <p class="text-justify">
                    {{ $excerpt }}
                </p>
                {{--
                <p class="text-center">
                    @unless(empty($tags)))
                <ul>
                    @foreach($tags as $tag)
                    <li>
                        <a href="{{ get_term_link($tag)}}" rel="tag">{{ $tag->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endunless
                </p>
                --}}
            </div>
        </div>
    </div>
</div>