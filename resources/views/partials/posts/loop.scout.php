@extends('layouts.default')

@section('content')
<div class="container-fluid pt-20 post-loop">
    @loop
    @include(empty(\Themosis\Page\Option::get('theme-option-layout', 'postLoopType')) ? 'partials.unique.unique1' :\Themosis\Page\Option::get('theme-option-layout', 'postLoopType'), [
          'title' =>\Themosis\Facades\Loop::title(),
          'link' =>\Themosis\Facades\Loop::link(),
          'category' =>\Themosis\Facades\Loop::gategory(),
          'tags' =>\Themosis\Facades\Loop::tags(),
          'excerpt' =>\Themosis\Facades\Loop::excerpt(),
          'thumbnail' =>\Themosis\Facades\Loop::thumbnailUrl(empty(\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'loopType')) ? 'partials.unique.unique1' :\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'loopType')),
          'date' =>\Themosis\Facades\Loop::date(),
          'year' =>\Themosis\Facades\Loop::date('Y'),
          'month' =>\Themosis\Facades\Loop::date('m'),
          'day' =>\Themosis\Facades\Loop::date('d')
      ])
    @endloop
    @if(!have_posts())
        @include('partials.empty.default')
    @endif
</div>
<div class="container">
            @include('partials.pagination')
</div>
    <script>
        var gal = document.querySelector(".post-loop"), masonry = new Masonry(gal, {
            percentPosition: !0,
            itemSelector: ".post-item",
            isResizeBound: !0
        });
        masonry.layout();
    </script>
@stop