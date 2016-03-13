@extends('layouts.default')

@section('content')
<div class="container pt-50">
    @include('partials.timeline.event')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop