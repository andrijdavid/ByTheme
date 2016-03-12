@extends('layouts.default')

@section('content')
    <div class="container pt-50 mr-20 ml-20">
        @loop
            @include(empty(Option::get('theme-option-layout', 'searchLoopType')) ? 'partials.unique.unique1' : Option::get('theme-option-layout', 'searchLoopType'), [
                  'title' => Loop::title(),
                  'link' => Loop::link(),
                  'category' => Loop::gategory(),
                  'tags' => Loop::tags(),
                  'excerpt' => Loop::excerpt(),
                  'thumbnail' => Loop::thumbnailUrl(empty(Meta::get(Loop::id(), 'loopType')) ? 'partials.unique.unique1' : Meta::get(Loop::id(), 'loopType')),
                  'date' => Loop::date(),
                  'year' => Loop::date('Y'),
                  'month' => Loop::date('m'),
                  'day' => Loop::date('d')
              ])
        @endloop
        @if(!have_posts())
            @include('partials.empty.search')
        @endif
        <div class="row">
            <div class="">
                @include('partials.pagination', ['s' => $s])
            </div>
        </div>
    </div>
@stop