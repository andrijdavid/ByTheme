{{-- Thumbnail tsaratsara  --}}
<div class="row">
    @foreach($posts as $item)
        <div class="left-panel">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                <a href="{{ $item->link() }}"><img src="{{ $item->thumbnailUrl('unique4Th') }}"
                                                                   alt="{{ $item->title() }}"/></a>
                            </div>
                            <div class="icerik-bilgi">
                                <a href="{{ $item->link() }}"><h2>{{ $item->title() }}</h2></a>
                                <p>
                                    {{ $item->excerpt() }}
                                </p>
                                <div class="btn-group">
                                    <a class="btn btn-social btn-facebook" href="https://www.facebook.com/sharer.php?u={{ $item->link() }}" data-toggle="tooltip"
                                       title="<?php _e('Share Facebook', THEME_TEXT_DOMAIN) ?>"><i class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social btn-twitter" href="https://twitter.com/share?source=tweetbutton&text={{ $title }}&url={{ $url }}" data-toggle="tooltip"
                                       title="<?php _e('Share Twitter', THEME_TEXT_DOMAIN) ?>"><i class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social btn-google" href="https://plus.google.com/share?url={{ $url }}" data-toggle="tooltip"
                                       title="<?php _e('Share Google', THEME_TEXT_DOMAIN) ?>"><i
                                                class="fa fa-google"></i></a>
                                </div>
                                <a href="{{ $item->link() }}">
                                    <button type="button" class="btn btn-primary">
                                <span class="btn btn-google"><?php _e("Read More ", THEME_TEXT_DOMAIN) ?><i
                                            class="fa fa-chevron-right"></i></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>