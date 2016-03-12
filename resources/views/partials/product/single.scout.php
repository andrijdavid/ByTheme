@loop
@extends(empty(Meta::get(Loop::id(), 'layout')) ? 'layouts.default' : Meta::get(Loop::id(), 'layout'))
@endloop

@section('content')
    <div class="container-fluid full-height">
        @loop
        <div id="slider" class="carousel slide sliders" data-ride="carousel" data-interval="3000" data-pause="click">
            <div class="carousel-inner" role="listbox">

                @unless( empty(Meta::get(Loop::id(), 'images')))
                    @foreach(Meta::get(Loop::id(), 'images') as $key => $image)
                        <div class="item <?php if ($key == 0) { ?> active <?php } ?>">
                            @if(empty(wp_get_attachment_image_src($image, 'productSingleSlider')[0]))
                                <img src="{{ Option::get("theme-option-theme", "defaultSlider") }}"
                                     alt="{{ Loop::title() }}">
                            @else
                                <img src="{{  wp_get_attachment_image_src($image, 'productSingleSlider')[0] }}"
                                     alt="{{ Loop::title() }}"
                                     class="img-responsive">
                            @endif
                        </div>
                    @endforeach
                @endunless

            </div>

            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only"><?php _e('Previous', THEME_TEXT_DOMAIN) ?></span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only"><?php _e('Next', THEME_TEXT_DOMAIN) ?></span>
            </a>
        </div>
        <article class="{{ Loop::postClass() }}">
            <div class="row carousel-caption hidden-xs hidden-sm silde-description">
                <div class="text-float col-sm-9 col-md-6 col-md-offset-6">
                    <h3>
                        {{ Loop::title() }}
                    </h3>
                    <p class="text-justify">
                        {{ Loop::excerpt() }}
                    </p>


                </div>
            </div>

            <div class="row mt-20 pr-20 pl-20">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @unless(empty(Meta::get(Loop::id(), 'description')))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2> {{ Loop::title() }} </h2>
                            </div>
                            <div class="panel-body">
                                <p class="text-justify">
                                    {{ Meta::get(Loop::id(), 'description') }}
                                </p>
                            </div>
                        </div>
                    @endunless
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @unless(empty(Meta::get(Loop::id(), 'info')))
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                @foreach(Meta::get(Loop::id(), 'info') as $key => $arr)
                                    <tr>
                                        <td class="capitalize"> {{ $arr['title'] }}</td>
                                        <td class="capitalize"> {{ $arr['value'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endunless
                </div>
            </div>
        </article>
        @endloop
    </div>
@stop

@section('sidebar')
    @if(is_active_sidebar('single-product-sidebar'))
        <?php dynamic_sidebar('single-product-sidebar')?>
    @elseif(is_active_sidebar('single-post-sidebar'))
        <?php dynamic_sidebar('single-post-sidebar')?>
    @endif
@stop