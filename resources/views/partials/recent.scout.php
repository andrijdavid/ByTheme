<div class="row p-20">
    @foreach($posts as $item)
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 xcentrik_recent p-10">
        <div class="thumbnail no-padding">
            <div class="caption">
                <h4>
                    <a href="{{ $item->link() }}" class="inherit" title="{{ $item->title() }}">
                        {{ $item->title() }}
                    </a>
                </h4>
                <p>
                    <a href="{{ $item->link() }}"
                       class="label label-primary"><?php _e("Read More ", THEME_TEXT_DOMAIN) ?></a>
                </p>
            </div>
            <img src="{{ $item->thumbnailUrl('recentPostThumbnail') }}" alt="{{ $item->title() }}" class="no-margin"
                 width="600" height="450">
        </div>
    </div>
    @endforeach
</div>