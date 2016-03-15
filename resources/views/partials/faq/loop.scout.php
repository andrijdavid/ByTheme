@extends('layouts.default')

@section('content')
    <div class="container pt-50">
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @loop
                    @unless(empty(Meta::get(Loop::id(), 'answer')))
                        <div class="panel panel-default">
                            <div class="panel-heading" id="heading-{{Loop::id()}}">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ Loop::id() }}">
                                        {{ Loop::title() }}</a>
                                    <a href="{{ Loop::link() }}" title="{{ Loop::title() }}" class="pull-right">
                                        <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    </a>
                                </h4>

                            </div>
                            <div id="collapse-{{Loop::id()}}" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="heading-{{Loop::id()}}">
                                <div class="panel-body">
                                    {{ Meta::get(Loop::id(), 'answer') }}
                                </div>
                                <div class="panel-footer">
                                    <a href="{{Loop::link()}}">Open</a>
                                </div>
                            </div>
                        </div>
                    @endunless
                @endloop
            </div>
        </div>
        <div class="col md-4 col-lg-4 col-xs-12 col-sm-12">
            <div class="panel panel-default faq-panel">
                <div class="panel-heading"><?php _e('Faqs Categories', THEME_TEXT_DOMAIN)?></div>
                <div class="panel-body no-padding">
                    <div class="faq-category-container">
                        <ul class="faq-category-list list-group no-margin-bottom">

                            @foreach(get_terms('faq-category', array(
                            'orderby'    => 'count',
                            'order' => 'DESC',
                            'hide_empty' => true
                            )) as $term)

                                <li class="list-group-item no-border-radius">
                                    <span class="badge">{{ $term->count }}</span>
                                    <div class="faq-title">
                                        <a href="{{ get_term_link($term) }}" title="{{ $term->name }}">
                                            {{ $term->name }}
                                        </a>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default faq-panel">
                <div class="panel-heading"><?php _e('Faqs Tags', THEME_TEXT_DOMAIN)?></div>
                <div class="panel-body no-padding">
                    <div class="faq-taq-container">
                        <ul class="faq-tag-list list-group no-margin-bottom">
                            @foreach(get_terms('faq-tag', array(
                                   'orderby'    => 'count',
                                   'order' => 'DESC',
                                   'hide_empty' => true
                                   )) as $term)

                                <li class="list-group-item no-border-radius">
                                    <span class="badge">{{ $term->count }}</span>
                                    <div class="faq-title">
                                        <a href="{{ get_term_link($term) }}" title="{{ $term->name }}">
                                            {{ $term->name }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.back-to-top')
@stop