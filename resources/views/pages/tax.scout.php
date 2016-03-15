@extends('layouts.default')

@section('content')
    <div class="container pt-60 mt-20 pb-40">
        @loop
        @include('partials.unique.unique3',[
            'title' =>\Themosis\Facades\Loop::title(),
            'link' =>\Themosis\Facades\Loop::link(),
            'category' =>\Themosis\Facades\Loop::category(),
            'tags' =>\Themosis\Facades\Loop::tags(),
            'excerpt' =>\Themosis\Facades\Loop::excerpt(),
            'thumbnail' =>\Themosis\Facades\Loop::thumbnailUrl(),
            'date' =>\Themosis\Facades\Loop::date(),
            'year' =>\Themosis\Facades\Loop::date('Y'),
            'month' =>\Themosis\Facades\Loop::date('m'),
            'day' =>\Themosis\Facades\Loop::date('d'),

        ])
        @endloop
    </div>
@stop

@section('script')
<script></script>
@stop