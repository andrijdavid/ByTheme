@extends('layouts.default')

@section('content')
<div class="container pt-50">
    @include('partials.timeline.timeline')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop