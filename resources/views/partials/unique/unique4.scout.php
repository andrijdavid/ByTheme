<div class="left-panel {{ isset($containerClass) ? $containerClass : '' }}">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                <a href="{{ $link }}"><img src="{{ $thumbnail }}"
                                                                   alt="{{ $title }}"/></a>
                            </div>
                            <div class="icerik-bilgi">
                                <a href="{{ $link }}"><h2>{{ $title }}</h2></a>
                                <p>
                                    {{ $excerpt }}
                                </p>
                                <div class="btn-group">
                                    <a class="btn btn-social btn-facebook" href="https://www.facebook.com/sharer.php?u={{ $link }}" data-toggle="tooltip"
                                       title="<?php _e('Share Facebook', THEME_TEXT_DOMAIN) ?>"><i class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social btn-twitter" href="https://twitter.com/share?source=tweetbutton&text={{ $title }}&url={{ $link  }}" data-toggle="tooltip"
                                       title="<?php _e('Share Twitter', THEME_TEXT_DOMAIN) ?>"><i class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social btn-google" href="https://plus.google.com/share?url={{ $link  }}" data-toggle="tooltip"
                                       title="<?php _e('Share Google', THEME_TEXT_DOMAIN) ?>"><i
                                                class="fa fa-google"></i></a>
                                </div>
                                <a href="{{ $link }}">
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
