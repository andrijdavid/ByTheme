@extends('layouts.default')

@section('content')
<div class="container pt-60 mt-20 pb-40">
    <div class="col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10 col-xs-12 col-sm-12">
        <div class="bg-white fit">
            <article>
                <header>
                    <h1>{{\Themosis\Facades\Loop::title()}}</h1>
                </header>
                <section>
                    {{\Themosis\Facades\Loop::content() }}
                </section>
            </article>

        </div>
    </div>
</div>
@stop

@section('script')
<script></script>
@stop