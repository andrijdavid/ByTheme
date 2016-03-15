@extends('layouts.default')

@section('content')
<div class="container pt-60 mt-20 pb-40">
    @include('partials.timeline.event')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop