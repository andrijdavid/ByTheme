<div class="site-footer">
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
    <div class="bottom-footer pt-20 pb-10">
        <p class="white-text text-center"><a href="">Xcentrick</a></p>
    </div>
</div>
