@extends('layouts.default')

@section('content')
<div class="container pt-50">
    <div class="container mt-50 mb-50">
        @loop
        @include('partials.unique.unique2',[
            'title' => Themosis\Facades\Loop::title(),
            'link' => Themosis\Facades\Loop::link(),
            'category' => Themosis\Facades\Loop::category(),
            'tags' => Themosis\Facades\Loop::tags(),
            'excerpt' => Themosis\Facades\Loop::excerpt(),
            'thumbnail' => Themosis\Facades\Loop::thumbnailUrl(),
            'date' => Themosis\Facades\Loop::date(),
            'year' => Themosis\Facades\Loop::date('Y'),
            'month' => Themosis\Facades\Loop::date('m'),
            'day' => Themosis\Facades\Loop::date('d'),

        ])
        @endloop
    </div>
</div>
@stop

@section('script')
<script></script>
@stop