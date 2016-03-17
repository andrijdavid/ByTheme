@extends(\Themosis\Page\Option::get('theme-option-layout', 'siteLayout'))


@section('main')
    <div class="clearfix">
        @yield('header')
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="container-fluid fit">
                <div class="row clearfix">
                    <aside class="sidebar sidebar-primary widget-area col-xs-12 col-md-3 col-lg-3 pull-left" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                        <div class="container-fluid">
                            <div class="row">
                                @yield('sidebar')
                            </div>
                        </div>
                    </aside>

                    <div class="col-xs-12 col-md-9 col-lg-9 pull-right no-padding-left no-padding-right">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
