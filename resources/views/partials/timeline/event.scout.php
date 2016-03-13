<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 ">
        <ul class="event-list">
            @loop
            <li>
                <time datetime="{{ Loop::date() }}">
                    <span class="day">
                        <a href="{{ get_day_link(Loop::date("Y"),Loop::date("m"),Loop::date("d")) }}">
                            {{ Loop::date('d') }}
                        </a>
                    </span>
                    <span class="month">
                        <a href="{{ get_month_link(Loop::date("Y"),Loop::date("m")) }}">
                            {{ Loop::date('m') }}
                        </a>
                    </span>
                    <span class="year">
                        <a href="{{ get_year_link(Loop::date("Y")) }}">
                            {{ Loop::date('Y') }}
                        </a>>
                    </span>
                </time>
                <a href="{{ Loop::link() }}" title="{{ Loop::title() }}" class="inherit">
                    <img alt="{{ Loop::title() }}" class="responsive-img img transparent-overlay"
                         src="{{ Loop::thumbnailUrl('eventThumbnail') }}"/>
                </a>
                <div class="info">
                    <h2 class="title">
                        <a href="{{ Loop::link() }}" title="{{ Loop::title() }}" class="inherit">
                            {{ Loop::title() }}
                        </a>
                    </h2>
                    <p class="desc">{{ Loop::excerpt() }}</p>
                </div>
                <div class="social">
                    <ul>
                        <li class="facebook" style="width:33%;"><a
                                    href="https://www.facebook.com/sharer.php?u={{ Loop::link() }}"><span
                                        class="fa fa-facebook"></span></a>
                        </li>
                        <li class="twitter" style="width:34%;"><a
                                    href="https://twitter.com/share?source=tweetbutton&text={{ Loop::title() }}&url={{ Loop::link() }}"><span
                                        class="fa fa-twitter"></span></a></li>
                        <li class="google-plus" style="width:33%;"><a
                                    href="https://plus.google.com/share?url={{ Loop::link() }}"><span
                                        class="fa fa-google-plus"></span></a></li>
                    </ul>
                </div>
            </li>
            @endloop
        </ul>
    </div>
</div>