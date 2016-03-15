@loop
@extends(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout')) ? 'layouts.default' :\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout'))
@endloop

@section('content')
    <div class="container-fluid full-height">
        @loop
        <div id="slider" class="carousel slide sliders" data-ride="carousel" data-interval="3000" data-pause="click">
            <div class="carousel-inner" role="listbox">

                @unless( empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'images')))
                    @foreach(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'images') as $key => $image)
                        <div class="item <?php if ($key == 0) { ?> active <?php } ?>">
                            @if(empty(wp_get_attachment_image_src($image, 'productSingleSlider')[0]))
                                <img src="{{\Themosis\Page\Option::get("theme-option-theme", "defaultSlider") }}"
                                     alt="{{\Themosis\Facades\Loop::title() }}">
                            @else
                                <img src="{{  wp_get_attachment_image_src($image, 'productSingleSlider')[0] }}"
                                     alt="{{\Themosis\Facades\Loop::title() }}"
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
        <article class="{{\Themosis\Facades\Loop::postClass() }}">
            <div class="row carousel-caption hidden-xs hidden-sm silde-description">
                <div class="text-float col-sm-9 col-md-6 col-md-offset-6">
                    <h3>
                        {{\Themosis\Facades\Loop::title() }}
                    </h3>
                    <p class="text-justify">
                        {{\Themosis\Facades\Loop::excerpt() }}
                    </p>


                </div>
            </div>

            <div class="row mt-20 pr-20 pl-20">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @unless(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'description')))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2> {{\Themosis\Facades\Loop::title() }} </h2>
                            </div>
                            <div class="panel-body">
                                <p class="text-justify">
                                    {{\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'description') }}
                                </p>
                            </div>
                        </div>
                    @endunless
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @unless(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'info')))
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                @foreach(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'info') as $key => $arr)
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