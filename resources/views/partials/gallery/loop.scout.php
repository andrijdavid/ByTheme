@extends('layouts.default')

@section('content')
    <div class="container pt-60 mt-20 pb-40">
        @loop
            @unless(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'images')))
                @include(empty(\Themosis\Page\Option::get('theme-option-layout', 'galleryLoopType')) ? 'partials.unique.unique1' :\Themosis\Page\Option::get('theme-option-layout', 'galleryLoopType'), [
                    'title' =>\Themosis\Facades\Loop::title(),
                    'link' =>\Themosis\Facades\Loop::link(),
                    'category' =>\Themosis\Facades\Loop::terms('gallery-category'),
                    'tags' =>\Themosis\Facades\Loop::terms('gallery-tags'),
                    'excerpt' =>\Themosis\Facades\Loop::excerpt(),
                    'thumbnail' =>\Themosis\Facades\Loop::thumbnailUrl(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'loopType')) ? 'partials.unique.unique1' :\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'loopType')),
                    'date' =>\Themosis\Facades\Loop::date(),
                    'year' =>\Themosis\Facades\Loop::date('Y'),
                    'month' =>\Themosis\Facades\Loop::date('m'),
                    'day' =>\Themosis\Facades\Loop::date('d'),
                    'description' =>\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'description'),
                ])
            @endunless
        @endloop

        @if(!have_posts())
            @include('partials.empty.default')
        @endif

        <div class="row">
            <div class="">
                @include('partials.pagination')
            </div>
        </div>
    </div>
@stop