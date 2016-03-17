@extends(\Themosis\Page\Option::get('theme-option-layout', 'siteLayout'))

@section('main')
    @yield('header')
    @yield('content')
@stop