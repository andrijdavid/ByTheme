@extends('layouts.default')

@section('content')
<div class="container">
    @include('partials.timeline.timeline')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop