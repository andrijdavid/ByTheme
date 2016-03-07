@loop
@extends(empty(Meta::get(Loop::id(), 'layout')) ? 'layouts.rightsidebar' : Meta::get(Loop::id(), 'layout'))
@endloop

@section('sidebar')
@if(is_active_sidebar('single-post-sidebar'))
<?php dynamic_sidebar('single-post-sidebar') ?>
@endif
@stop

@section('header')
<div class="no-padding no-margin full-width singlepost-header">
    <img src="{{ Loop::thumbnailUrl('singlePostThumbnail')}}" alt="{{ Loop::title() }}"
         class="img-responsive transparent-overlay">
</div>

@stop

@section('content')
<div class="container fit bg-white">
    <article itemscope itemtype="http://schema.org/NewsArticle" {{ Loop::postClass(
    'post-unique p-20') }} />

    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
          itemid="https://google.com/article"/>

    <header class="text-center page-header jumbotron singlepost-title">
        <h1 itemprop="headline" class="text-center uppercase">{{ Loop::title() }}</h1>
        <h2>
            <a href="{{ get_day_link(Loop::date('Y'), Loop::date('n') ,Loop::date('j')) }}">
                <time itemprop="datePublished" datetime="{{ Loop::date() }}">
                    {{ Loop::date() }}
                </time>
            </a>
        </h2>
        @unless(empty(Loop::category()))
        <div class="">
            <?php _e("In", THEME_TEXT_DOMAIN) ?>
            @foreach(Loop::category() as $cat)
            <br><a href="{{ get_term_link($cat) }}" title="{{ $cat->name}}" class="capitalize">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
        @endunless
    </header>

    <main itemprop="articleBody" class="clearfix text-justify">
        {{ Loop::content() }}
    </main>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <hr>
                </div>
            </div>
            @include('partials.social.horizontal', [
            'title' => Loop::title(),
            'url' => Loop::link(),
            'img' => Loop::thumbnailUrl('thumbnail')
            ])
        </div>

        <div class="container-fluid">
            @unless(empty(Loop::category()))
            @include('partials.category', [
            'categories' => Loop::category()
            ])
            @endunless
        </div>

        <div class="container-fluid">
            @unless(empty(Loop::tags()))
            {{--
            <div class="right">--}}
                {{--@foreach(Loop::tags() as $tag)--}}
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
            'tags' => Loop::tags()
            ])
            @endunless
        </div>

    </footer>
    </article>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p-30">
            @include('partials.related', [
            'id' => Loop::id()
            ])

            @include('partials.recent', [
            'posts' => PostModel::all(4)
            ])
        </div>
    </div>

    @include('partials.back-to-top')
</div>
</article>
</div>

@loop


@endloop

@stop