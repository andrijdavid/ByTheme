@extends('layouts.default')

@section('content')
    <div class="container pt-50 pb-40">
        @loop
            @unless(empty(Meta::get(Loop::id(), 'images')))
                @include(empty(Option::get('theme-option-layout', 'galleryLoopType')) ? 'partials.unique.unique1' : Option::get('theme-option-layout', 'galleryLoopType'), [
                    'title' => Loop::title(),
                    'link' => Loop::link(),
                    'category' => Loop::terms('gallery-category'),
                    'tags' => Loop::terms('gallery-tags'),
                    'excerpt' => Loop::excerpt(),
                    'thumbnail' => Loop::thumbnailUrl(empty(Meta::get(Loop::id(), 'loopType')) ? 'partials.unique.unique1' : Meta::get(Loop::id(), 'loopType')),
                    'date' => Loop::date(),
                    'year' => Loop::date('Y'),
                    'month' => Loop::date('m'),
                    'day' => Loop::date('d'),
                    'description' => Meta::get(Loop::id(), 'description'),
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