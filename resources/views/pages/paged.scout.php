@extends('layouts.default')

@section('content')
<div class="container mr-20 pt-20 ml-20">
    <div class="col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10 col-xs-12 col-sm-12">
        <div class="bg-white fit">
            <article>
                <header>
                    <h1>{{ Loop::title()}}</h1>
                </header>
                <section>
                    {{ Loop::content() }}
                </section>
            </article>

        </div>
    </div>
</div>
@stop

@section('script')
<script></script>
@stop