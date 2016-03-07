@extends('layouts.default')

@section('head')

@stop


@section('content')
<div class="">
    @include('partials.home.slider',[
        'post' => PostModel::all(5)
    ])
</div>
@stop


@section('sidebar')

@stop
