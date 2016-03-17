<div class="site-footer footer-color">
    <div class="container">
        <div class="row pt-20">
            <div class="col col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-10">
                <div class="row">
                    <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        @if(is_active_sidebar('footer-first-sidebar'))
                            <?php dynamic_sidebar('footer-first-sidebar') ?>
                        @endif
                    </div>
                    <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        @if(is_active_sidebar('footer-second-sidebar'))
                            <?php dynamic_sidebar('footer-second-sidebar') ?>
                        @endif
                    </div>
                    <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        @if(is_active_sidebar('footer-third-sidebar'))
                            <?php dynamic_sidebar('footer-third-side-bar') ?>
                        @endif
                    </div>
                    <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        @if(is_active_sidebar('footer-fourth-sidebar'))
                            <?php dynamic_sidebar('footer-fourth-sidebar') ?>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bottom-footer pt-20 pb-10">
        <div class="copyright pull-left">
            <p class="white-text">
                Made by <a href="http://xcentrik.online" title="XCentrik">XCentrik</a>
            </p>
        </div>
        <div class="pull-right">
            @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'facebook') ))
                <a href="{{\Themosis\Page\Option::get('theme-option-social', 'facebook')}}" title="Facebook">
                    <i class="fa fa-facebook"></i>
                </a>
            @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'twitter') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'twitter')}}" title="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'google-plus') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'google-plus')}}" title="Google+">
                        <i class="fa fa-google-plus"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'linkedin') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'linkedin')}}" title="LinkedIn">
                        <i class="fa fa-linkedin"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'youtube') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'youtube')}}" title="Youtube">
                        <i class="fa fa-youtube"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'vkontakte') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'vkontakte')}}" title="Vkontakte">
                        <i class="fa fa-vk"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'instagram') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'instagram')}}" title="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                @endunless
                @unless(empty( \Themosis\Page\Option::get('theme-option-social', 'rss') ))
                    <a href="{{\Themosis\Page\Option::get('theme-option-social', 'rss')}}" title="RSS">
                        <i class="fa fa-rss"></i>
                    </a>
                @endunless
        </div>
    </div>
</div>
