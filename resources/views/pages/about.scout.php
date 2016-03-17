@extend('layouts.default')

@section('content')
    <div class="container pt-20">
        @loop
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10 col-xs-12 col-sm-12 bg-white">
                <div class=" fit">
                    <article>
                        <header>
                            <h1 class="text-center">{{\Themosis\Facades\Loop::title()}}</h1>
                        </header>
                        <section>
                            {{\Themosis\Facades\Loop::content() }}
                        </section>
                    </article>

                </div>
            </div>
        </div>
        @endloop
    </div>
@stop

@section('script')
<script></script>
@stop