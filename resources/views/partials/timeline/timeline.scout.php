
<ul class="timeline">
    @loop
    <li class="{{ arrayRand(["timeline-inverted", ""]) }}">
        <div class="timeline-badge">
            <a href="{{ get_day_link(Loop::date("Y"),Loop::date("m"),Loop::date("d")) }}" class="inherit bold miangeza">
                {{ Loop::date("d") }}
            </a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">
                    <a href="{{ Loop::link() }}" title="{{ Loop::title() }}">
                        {{ Loop::title() }}
                    </a>
                </h4>
                <p>
                    <small class="text-muted">
                        <i class="glyphicon glyphicon-time"></i>
                        <time datetime="{{ Loop::date() }}">
                            {{ Loop::date() }}
                        </time>
                    </small>
                </p>
            </div>
            <div class="timeline-body">
                {{ Loop::excerpt() }}
            </div>
        </div>
    </li>
    @endloop
</ul>
