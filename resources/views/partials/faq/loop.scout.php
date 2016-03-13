@extends('layouts.default)

@section('content')

    <ul class="faq-category-list">
        @foreach(get_terms('faq-category', array(
            'orderby'    => 'count',
            'hide_empty' => 0
        )) as $term)
            <li>
                <div class="faq-title">
                    <a href="{{ get_term_link($term) }}" title="{{ $term->name }}">
                        {{ $term->name }}
                    </a>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @query([
                        'post_type' => 'faqs',
                        'tax_query' => [
                            [
                                'taxonomy' => 'faqs-category',
                                'field'    => 'slug',
                                'terms'    => $term->name,
                            ],
                        ],
                    ])
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{ Loop::id() }}">
                            <h4 class="panel-title">
                                <a role="button" title="{{ Loop::title() }}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ Loop::id() }}" aria-expanded="true" aria-controls="collapse{{ Loop::id() }}">
                                    {{ Loop::title() }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{ Loop::id() }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{ Loop::id() }}">
                            <div class="panel-body">
                                {{ Meta::get(Loop::id(), 'answer') }}
                            </div>
                        </div>
                    </div>
                    @endquery
                </div>

            </li>
        @endforeach
    </ul>

@stop