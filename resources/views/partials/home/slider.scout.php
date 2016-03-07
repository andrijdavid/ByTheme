<div id="slider" class="carousel slide sliders" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner" role="listbox">
        @foreach($post as $key => $item)
            <div class="item <?php if($key == 0) {?> active <?php } ?>">
                @if(empty($item->thumbnailUrl('homeSlider')))
                    <img src="{{ Option::get("theme-option-theme", "defaultSlider") }}" alt="{{ $item->title() }}">
                @else
                    <img src="{{  $item->thumbnailUrl('homeSlider') }}" alt="{{ $item->title() }}" class="img-responsive">
                @endif
                <div class="row carousel-caption hidden-xs hidden-sm">
                    <div class="text-float col-sm-9 col-md-6 col-md-offset-6 home-slider-caption">
                        <h3>
                            <a href="{{ $item->link() }}">{{ $item->title() }}</a>
                        </h3>
                        <p class="text-justify">
                            {{ $item->excerpt() }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?php _e('Previous',THEME_TEXT_DOMAIN) ?></span>
    </a>
    <a class="right carousel-control" href="#slider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?php _e('Next',THEME_TEXT_DOMAIN) ?></span>
    </a>
</div>
