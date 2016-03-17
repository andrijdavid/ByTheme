@extends('layouts.default')

@section('content')
<div class="container pt-20">
    @include('partials.timeline.event')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop