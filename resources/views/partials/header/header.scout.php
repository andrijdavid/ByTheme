@if(\Themosis\Page\Option::get('theme-option-layout', 'fixed-nav'))
    <nav class="navbar navbar-default nav-color navbar-fixed-top sticky-navigation">
        @else
            <nav class="navbar navbar-inverse nav-color no-margin-bottom">
                @endif
                <div class="topnav top-header">
                    <div class="container">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                            <?php
                            wp_nav_menu([
                                    'theme_location' => 'topnav',
                                    'menu_id' => 'topnav',
                                    'depth' => 2,
                                    'container' => '',
                                    'menu_class' => 'navbar-nav navbar-right top-main-menu'
                            ])
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
                            @if(empty(\Themosis\Page\Option::get("theme-option-image", "logo") ))
                                <?php bloginfo('name') ?>
                            @else
                                <img src="{{\Themosis\Page\Option::get(" theme-option-image", "logo") }}"
                                     alt="<?php bloginfo('name') ?>">
                            @endif
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php wp_nav_menu(array(
                                'theme_location' => 'header',
                                'depth' => 2,
                                'container' => '',
                                'menu_id' => '',
                            //  'container_class' => 'pull-right',
                            //'container_id' => 'navbar',
                                'menu_class' => 'nav navbar-nav navbar-right  main-menu',
                                'fallback_cb' => 'wp_bootstrap_navwallker::fallback',
                                'walker' => new wp_bootstrap_navwalker(),
                        )) ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>