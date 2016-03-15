@extends('layouts.default')

@section('content')
    <div class="container pt-50 mt-20">
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
            @loop
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{\Themosis\Facades\Loop::title() }}
                    </div>
                    <div class="panel-body">
                        {{\Themosis\Metabox\Meta::get(\Themosis\Facades\Loop::id(), 'answer') }}
                    </div>
                    <div class="panel-footer social-share-here">
                        <div class="scrollable">
                            @include('partials.social.horizontal', [
                            'url' =>\Themosis\Facades\Loop::link(),
                            'title' =>\Themosis\Facades\Loop::title()
                        ])
                        </div>
                    </div>
                </div>
            @endloop
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