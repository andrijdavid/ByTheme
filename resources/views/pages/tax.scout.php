@extends('layouts.default')

@section('content')
    <div class="container mt-50 mb-50">
        @loop
        @include('partials.unique.unique3',[
            'title' => Loop::title(),
            'link' => Loop::link(),
            'category' => Loop::category(),
            'tags' => Loop::tags(),
            'excerpt' => Loop::excerpt(),
            'thumbnail' => Loop::thumbnailUrl(),
            'date' => Loop::date(),
            'year' => Loop::date('Y'),
            'month' => Loop::date('m'),
            'day' => Loop::date('d'),

        ])
        @endloop
    </div>
@stop

@section('script')
<script></script>
@stop