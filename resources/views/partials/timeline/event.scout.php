<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 pt-50 pb-40">
        <ul class="event-list">
            @loop
            <li>
                <time datetime="{{ Themosis\Facades\Loop::date() }}">
                    <span class="day">
                        <a href="{{ get_day_link(Themosis\Facades\Loop::date("Y"),Themosis\Facades\Loop::date("m"),Themosis\Facades\Loop::date("d")) }}" class="inherit">
                            {{ Themosis\Facades\Loop::date('d') }}
                        </a>
                    </span>
                    <span class="month">
                        <a href="{{ get_month_link(Themosis\Facades\Loop::date("Y"),Themosis\Facades\Loop::date("m")) }}" class="inherit">
                            {{ Themosis\Facades\Loop::date('M') }}
                        </a>
                    </span>
                    <span class="year">
                        <a href="{{ get_year_link(Themosis\Facades\Loop::date("Y")) }}" class="inherit">
                            {{ Themosis\Facades\Loop::date('Y') }}
                        </a>>
                    </span>
                </time>
{{--                <a href="{{ Themosis\Facades\Loop::link() }}" title="{{ Themosis\Facades\Loop::title() }}" class="inherit">--}}
                @unless(empty(Themosis\Facades\Loop::thumbnailUrl('eventThumbnail')))
                    <img alt="{{ Themosis\Facades\Loop::title() }}" class="responsive-img img transparent-overlay"
                         src="{{ Themosis\Facades\Loop::thumbnailUrl('eventThumbnail') }}"/>
                @endunless
                {{--</a>--}}
                <div class="info">
                    <h2 class="title">
                        <a href="{{ Themosis\Facades\Loop::link() }}" title="{{ Themosis\Facades\Loop::title() }}" class="inherit">
                            {{ Themosis\Facades\Loop::title() }}
                        </a>
                    </h2>
                    <p class="desc truncate scrollable">
                        {{ truncate(Themosis\Facades\Loop::excerpt(), 20) }}
                    </p>
                </div>
                <div class="social">
                    <ul>
                        <li class="facebook" style="width:33%;"><a
                                    href="https://www.facebook.com/sharer.php?u={{ Themosis\Facades\Loop::link() }}"><span
                                        class="fa fa-facebook"></span></a>
                        </li>
                        <li class="twitter" style="width:34%;"><a
                                    href="https://twitter.com/share?source=tweetbutton&text={{ Themosis\Facades\Loop::title() }}&url={{ Themosis\Facades\Loop::link() }}"><span
                                        class="fa fa-twitter"></span></a></li>
                        <li class="google-plus" style="width:33%;"><a
                                    href="https://plus.google.com/share?url={{ Themosis\Facades\Loop::link() }}"><span
                                        class="fa fa-google-plus"></span></a></li>
                    </ul>
                </div>
            </li>
            @endloop
        </ul>
    </div>
</div>