@loop
@extends(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout')) ? 'layouts.default' :\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout'))
@endloop

@section("header")
<div class="no-padding no-margin full-width singlepost-header">
    <img src="{{\Themosis\Facades\Loop::thumbnailUrl('singlePostThumbnail')}}" alt="{{\Themosis\Facades\Loop::title() }}"
         class="img-responsive transparent-overlay">

    <header class="animated fadeInUpBig center text-center gallery-caption">
        <h1 class="">
            <strong class="uppercase">
                {{\Themosis\Facades\Loop::title() }}
            </strong>
        </h1>

        <div class="">
            <!--  <a href="{{\Themosis\Facades\Loop::link() }}" rel="bookmark" style="color:inherit"> -->
            <a href="{{ get_day_link(\Themosis\Facades\Loop::date('Y'),\Themosis\Facades\Loop::date('n') ,Themosis\Facades\Loop::date('j')) }}">
                <time class="" datetime="{{\Themosis\Facades\Loop::date() }}">
                    {{\Themosis\Facades\Loop::date() }}
                </time>
            </a>
            <span>
                @unless(empty(\Themosis\Facades\Loop::terms("gallery-category")))
                    @foreach(\Themosis\Facades\Loop::terms("gallery-category") as $category)
                        <span>/</span>
                        <a href="{{ get_term_link($category) }}" title="{{ $category->name }}" class="uppercase">
                            {{ $category->name }}
                        </a>
                    @endforeach
                @endunless
            </span>

        </div>
    </header>
</div>
@stop

@section('content')
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">


        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">


            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>
    </div>
    @loop
    <div class="container gal-wrapper">

        <div class="my-gallery gal" itemscope itemtype="http://schema.org/ImageGallery">
            @unless(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'images') ))
                @foreach(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'images') as $image)
                    <?php
                    $attachment = get_post($image);
                    ?>
                    <figure itemprop="associatedMedia" itemscope
                            itemtype="http://schema.org/ImageObject"
                            class="no-padding no-margin hoverable gal-item no-margin-bottom no-padding-bottom wow slideIn">

                        <a href="{{ wp_get_attachment_url($image) }}" itemprop="contentUrl"
                           data-size="{{ wp_get_attachment_metadata($image)['width']}}x{{ wp_get_attachment_metadata($image)['height'] }}">

                            <img class="img responsive-img transparent-overlay"
                                 src="{{ wp_get_attachment_image_src($image, 'galleryThumbnail')[0] }}" itemprop="thumbnail"
                                 alt="{{ get_post_meta( $image, '_wp_attachment_image_alt', true ) }}"
                                 title="{{ $attachment->post_title }}" data-title="{{ $attachment->post_title }}"
                                 data-caption="{{ $attachment->post_excerpt }}"/>
                        </a>
                        <figcaption itemprop="caption description" class="clearfix justify gal-effect">
                            <h4>{{ $attachment->post_title }}</h4>
                            {{ $attachment->post_excerpt }}
                            <br>
                    <span itemprop="copyrightHolder">
                        <a href="{{ get_post_meta($image, 'source_url', true) }}"
                           title="{{ get_post_meta($image, 'name', true) }}" class="inherit">
                            {{ get_post_meta($image, 'name', true) }}
                        </a>
                    </span>
                        </figcaption>
                    </figure>
                @endforeach
            @endunless
        </div>
        @unless(empty(\Themosis\Facades\Loop::terms('gallery-tag') ))
            <div class="row">
                <div class="right">
                    @foreach(\Themosis\Facades\Loop::terms('gallery-tag') as $tag)
                        <div class="chip">
                            <a href="{{ get_term_link($tag) }}" title="{{ $tag->name }}" class="uppercase">
                                {{ $tag->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endunless
    </div>
    @endloop

    @include('partials.back-to-top')
@stop

@section("sidebar")
    @if(is_active_sidebar('single-gallery'))
        <?php dynamic_sidebar('single-gallery') ?>
    @endif
@stop

@section("scripts")
    <script>
        var initPhotoSwipeFromDOM = function (e) {
            for (var t = function (e) {
                for (var t, n, i, r, a = e.childNodes, o = a.length, l = [], d = 0; o > d; d++)t = a[d], 1 === t.nodeType && (n = t.children[0], i = n.getAttribute("data-size").split("x"), r = {
                    src: n.getAttribute("href"),
                    w: parseInt(i[0], 10),
                    h: parseInt(i[1], 10)
                }, t.children.length > 1 && (r.title = t.children[1].innerHTML), n.children.length > 0 && (r.msrc = n.children[0].getAttribute("src")), r.el = t, l.push(r));
                return l
            }, n = function s(e, t) {
                return e && (t(e) ? e : s(e.parentNode, t))
            }, i = function (e) {
                e = e || window.event, e.preventDefault ? e.preventDefault() : e.returnValue = !1;
                var t = e.target || e.srcElement, i = n(t, function (e) {
                    return e.tagName && "FIGURE" === e.tagName.toUpperCase()
                });
                if (i) {
                    for (var r, o = i.parentNode, l = i.parentNode.childNodes, d = l.length, g = 0, s = 0; d > s; s++)if (1 === l[s].nodeType) {
                        if (l[s] === i) {
                            r = g;
                            break
                        }
                        g++
                    }
                    return r >= 0 && a(r, o), !1
                }
            }, r = function () {
                var e = window.location.hash.substring(1), t = {};
                if (e.length < 5)return t;
                for (var n = e.split("&"), i = 0; i < n.length; i++)if (n[i]) {
                    var r = n[i].split("=");
                    r.length < 2 || (t[r[0]] = r[1])
                }
                return t.gid && (t.gid = parseInt(t.gid, 10)), t
            }, a = function (e, n, i, r) {
                var a, o, l, d = document.querySelectorAll(".pswp")[0];
                if (l = t(n), o = {
                            galleryUID: n.getAttribute("data-pswp-uid"), getThumbBoundsFn: function (e) {
                                var t = l[e].el.getElementsByTagName("img")[0], n = window.pageYOffset || document.documentElement.scrollTop, i = t.getBoundingClientRect();
                                return {x: i.left, y: i.top + n, w: i.width}
                            }
                        }, r)if (o.galleryPIDs) {
                    for (var g = 0; g < l.length; g++)if (l[g].pid == e) {
                        o.index = g;
                        break
                    }
                } else o.index = parseInt(e, 10) - 1; else o.index = parseInt(e, 10);
                isNaN(o.index) || (i && (o.showAnimationDuration = 0), a = new PhotoSwipe(d, PhotoSwipeUI_Default, l, o), a.init())
            }, o = document.querySelectorAll(e), l = 0, d = o.length; d > l; l++)o[l].setAttribute("data-pswp-uid", l + 1), o[l].onclick = i;
            var g = r();
            g.pid && g.gid && a(g.pid, o[g.gid - 1], !0, !0)
        };
        initPhotoSwipeFromDOM(".my-gallery");
        var gal = document.querySelector(".gal"), masonry = new Masonry(gal, {
            percentPosition: !0,
            itemSelector: ".gal-item",
            isResizeBound: !0
        }), imgLoaded = imagesLoaded(gal, function () {
            masonry.layout(), eventie.bind(gal, "hover", function (e) {
                classie.has(e.target, ".gal-item") && (classie.toggle(e.target, ".gal-item--gigante"), masonry.layout())
            })
        });
    </script>
@stop