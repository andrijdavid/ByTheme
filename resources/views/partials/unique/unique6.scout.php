
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 {{ isset($containerClass) ? $containerClass : '' }}">
    <div class="thumbnail no-padding">
        <a href="{{  $link }}">
            <img src="{{  $thumbnail }}" alt="{{  $title }}" class="no-padding no-margin img-responsive fit full-width image">
        </a>

        <div class="caption">
            <h3 class="text-center">
                <a href="{{  $link }}">
                    {{ $title }}
                </a>
            </h3>
            <p class="text-justified">
                <?php _e('Published at ', THEME_TEXT_DOMAIN) ?>
                <a
                    href="{{get_day_link($year, $month, $day)}}">
                    <time datetime="{{$date}}">{{$date}}</time>
                </a>
                @unless(empty($category))
                @foreach($category as $item)
                <span>/</span>
                <a href="{{ get_term_link($item)}}" rel="tag">{{ $item->name }}</a>
                @endforeach
                @endunless
            </p>
        </div>
    </div>
</div>