@extends('layouts.default')

@section('content')
<div class="container mr-20 pt-50 ml-20">
    @include('partials.timeline.timeline')
    @include('partials.pagination')
</div>
@stop

@section('script')
<script></script>
@stop