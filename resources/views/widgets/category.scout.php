<div class="col l12 m12 s12">
    <div class="widget">
        <div class="widget_categories">
            <div class="section">
                <h3><?php _e('CATEGORIES', THEME_TEXT_DOMAIN) ?></h3>
            </div>
            <ul>
                @foreach($categories as $category)
                <li class="cat-item cat-item-3">
                    <a href="{{ get_term_link($category)}}" title="{{ $category->name }}" class="uppercase">
                        {{ $category->name }} ({{ $category->count }})
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>