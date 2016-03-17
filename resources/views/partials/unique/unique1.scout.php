{{-- Mahintsy --}}
{{--<div class="row m-5">--}}
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 bg-white {{ isset($containerClass) ? $containerClass : '' }}">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <a href="{{  $link }}">
                    <img src="{{  $thumbnail }}" alt="{{  $title }}"
                         class="media-object img-responsive"
                         width="244px" height="300px">
                </a>
            </div>
            <div class="col-sm-12 col-xs-12  col-lg-8 col-md-8">
                <h2 class="">
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
            </div>
        </div>
    </div>
{{--</div>--}}