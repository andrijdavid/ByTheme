
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 {{ isset($containerClass) ? $containerClass : '' }}">
        <div class="thumbnail no-padding">
            <a href="{{  $link }}">
                <img src="{{  $thumbnail }}" alt="{{ $title }}" class="no-padding no-margin img-responsive fit full-width image">
            </a>

            <div class="caption">
                <h3 class="text-center">
                    <a href="{{  $link }}">
                        {{$title }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
