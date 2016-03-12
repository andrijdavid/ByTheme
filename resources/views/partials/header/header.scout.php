<nav class="navbar navbar-inverse cands navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed white gray-border" data-toggle="collapse"
                    data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only white">Toggle navigation</span>
                <span class="glyphicon glyphicon-menu-hamburger white"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <div class="top-header hidden-xs hidden-sm">
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
            <div class="bottom-header">
                <a class="navbar-brand capitalize " href="<?php esc_url(home_url()) ?>" title="<?php bloginfo('name') ?>">
                    @if(empty( Option::get("theme-option-image", "logo") ))
                        <?php bloginfo('name') ?>
                    @else
                        <img src="{{ Option::get(" theme-option-image", "logo") }}" alt="<?php bloginfo('name') ?>">
                    @endif
                </a>
                <div class="container ">
                    <?php wp_nav_menu(array(
                            'theme_location' => 'header',
                            'depth' => 2,
                            'container' => 'div',
                            'menu_id' => '',
                            'container_class' => 'pull-right',
                        //'container_id' => 'navbar',
                            'menu_class' => 'nav navbar-nav navbar-right  main-menu',
                            'fallback_cb' => 'wp_bootstrap_navwallker::fallback',
                            'walker' => new wp_bootstrap_navwalker(),
                    )) ?>


                </div>
            </div>
        </div>
    </div>
</nav>