
<ul class="timeline">
    @loop
    <li class="{{ arrayRand(["timeline-inverted", ""]) }}">
        <div class="timeline-badge">
            <a href="{{ get_day_link(Themosis\Facades\Loop::date("Y"),Themosis\Facades\Loop::date("m"),Themosis\Facades\Loop::date("d")) }}" class="inherit bold miangeza" data-toggle="tooltip" data-placement="{{arrayRand(['top', 'bottom', 'left', 'right']) }}" title="{{ Themosis\Facades\Loop::date() }}">
                {{ Themosis\Facades\Loop::date("d") }}
            </a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">
                    <a href="{{ Themosis\Facades\Loop::link() }}" title="{{ Themosis\Facades\Loop::title() }}">
                        {{ Themosis\Facades\Loop::title() }}
                    </a>
                </h4>
                <p>
                    <small class="text-muted">
                        <i class="glyphicon glyphicon-time"></i>
                        <time datetime="{{ Themosis\Facades\Loop::date() }}">
                            {{ Themosis\Facades\Loop::date() }}
                        </time>
                    </small>
                </p>
            </div>
            <div class="timeline-body">
                {{ Themosis\Facades\Loop::excerpt() }}
            </div>
        </div>
    </li>
    @endloop
</ul>
