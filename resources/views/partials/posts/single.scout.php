@loop
    @extends(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout')) ? 'layouts.rightsidebar' :\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'layout'))
@endloop

@section('sidebar')
@if(is_active_sidebar('single-post-sidebar'))
<?php dynamic_sidebar('single-post-sidebar') ?>
@endif
@stop

@section('header')
<div class="no-padding no-margin full-width singlepost-header">
    <img src="{{\Themosis\Facades\Loop::thumbnailUrl('singlePostThumbnail')}}" alt="{{\Themosis\Facades\Loop::title() }}"
         class="img-responsive transparent-overlay">
</div>

@stop

@section('content')
{{--<div class="containerfit bg-white no-padding-on-mobile">--}}
    <article itemscope itemtype="http://schema.org/NewsArticle" {{\Themosis\Facades\Loop::postClass(
    'post-unique p-20') }} />

    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
          itemid="https://google.com/article"/>

    <header class="text-center page-header jumbotron singlepost-title">
        <h1 itemprop="headline" class="text-center uppercase">{{\Themosis\Facades\Loop::title() }}</h1>
        <h2>
            <a href="{{ get_day_link(\Themosis\Facades\Loop::date('Y'),\Themosis\Facades\Loop::date('n') ,Themosis\Facades\Loop::date('j')) }}">
                <time itemprop="datePublished" datetime="{{\Themosis\Facades\Loop::date() }}">
                    {{\Themosis\Facades\Loop::date() }}
                </time>
            </a>
        </h2>
        @unless(empty(\Themosis\Facades\Loop::category()))
        <div class="">
            <?php _e("In", THEME_TEXT_DOMAIN) ?>
            @foreach(\Themosis\Facades\Loop::category() as $cat)
            <br><a href="{{ get_term_link($cat) }}" title="{{ $cat->name}}" class="capitalize">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
        @endunless
    </header>

    <main itemprop="articleBody" class="clearfix text-justify">
        {{\Themosis\Facades\Loop::content() }}
    </main>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-margin">
                    <hr>
                </div>
            </div>
            <br>
            @include('partials.social.horizontal', [
            'title' =>\Themosis\Facades\Loop::title(),
            'url' =>\Themosis\Facades\Loop::link(),
            'img' =>\Themosis\Facades\Loop::thumbnailUrl('thumbnail')
            ])
        </div>

        <div class="container-fluid">
            @unless(empty(\Themosis\Facades\Loop::category()))
                @include('partials.category', [
                'categories' =>\Themosis\Facades\Loop::category()
                ])
            @endunless
        </div>

        <div class="container-fluid">
            @unless(empty(\Themosis\Facades\Loop::tags()))
                @include('partials.tag', [
                'tags' =>\Themosis\Facades\Loop::tags()
                ])
            @endunless
        </div>

        <div class="container-fluid">
            @unless(empty(\Themosis\Facades\Loop::tags()))
            {{--
            <div class="right">--}}
                {{--@foreach(\Themosis\Facades\Loop::tags() as $tag)--}}
                {{--
                <div class="chip">--}}
                    {{--<a href="{{ get_term_link($tag) }}" rel="tag" title="{{ $tag->name }}">--}}
                        {{--{{ $tag->name }}--}}
                        {{--</a>--}}
                    {{--
                </div>
                --}}
                {{--@endforeach--}}
                {{--
            </div>
            --}}
            @include('partials.tag', [
            'tags' =>\Themosis\Facades\Loop::tags()
            ])
            @endunless
        </div>

    </footer>
    </article>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p-30">
            @include('partials.related', [
            'id' =>\Themosis\Facades\Loop::id()
            ])

            @include('partials.recent', [
            'posts' => PostModel::all(4)
            ])
        </div>
    </div>

    @include('partials.back-to-top')
</div>
</article>
{{--</div>--}}

@loop


@endloop

@stop