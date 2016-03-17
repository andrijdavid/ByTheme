@extends('layouts.default')

@section('content')
<div class="container pt-20 mt-20pb-40">
    @include('partials.timeline.event')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop