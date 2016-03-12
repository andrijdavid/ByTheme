{{--<nav class="navbar navbar-inverse cands navbar-fixed-top">--}}
    {{--<div class="container">--}}
        {{--<div class="navbar-header navbar-default">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"--}}
                    {{--aria-expanded="false" aria-controls="navbar">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="glyphicon glyphicon-menu-hamburger"></span>--}}
            {{--</button>--}}
        {{--</div>--}}
        {{--<div class="collapse navbar-collapse">--}}
            {{--<div class="bottom-header">--}}
                {{--<a class="navbar-brand capitalize" href="<?php //esc_url( home_url() ) ?>" title="<?php //bloginfo('name') ?>">--}}
                    {{--@if(empty( Option::get("theme-option-image", "logo") ))--}}
<!--                    --><?php //bloginfo('name') ?>
                    {{--@else--}}
                    {{--<img src="{{ Option::get(" theme-option-image", "logo") }}" alt="<?php //bloginfo('name') ?>">--}}
                    {{--@endif--}}
                {{--</a>--}}
                {{--<div class="container-fluid">--}}
                    <?php /*wp_nav_menu(array(
                        'theme_location' => 'header',
                        'depth' => 2,
                        'container' => 'div',
                        'menu_id' => 'navbar',
                        //'container_class' => 'nav-container  navbar-collapse collapse',
                        //'container_id' => 'navbar',
                        'menu_class' => 'nav navbar-nav navbar-right main-menu',
                        'fallback_cb' => 'wp_bootstrap_navwallker::fallback',
                        'walker' => new wp_bootstrap_navwalker(),
                    )) */?>

                    {{--<div class="nav navbar-form navbar-rigth search-field">--}}
                        {{--@include('partials.header.search')--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="top-header">--}}
                {{--<div class="container-fluid">--}}
                    <?php
                    /*wp_nav_menu([
                        'theme_location' => 'topnav',
                        'menu_id' => 'topnav',
                        'menu_class' => 'nav navbar-nav navbar-right main-menu'
                    ])*/
                    ?>
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!--/.nav-collapse -->--}}
    {{--</div>--}}
{{--</nav>--}}
<div class="top-header">
    <div class="container-fluid">
        <?php
        wp_nav_menu([
                'theme_location' => 'topnav',
                'menu_id' => 'topnav',
                'menu_class' => 'nav navbar-nav navbar-right main-menu'
        ])
        ?>
    </div>
</div>
<nav class="navbar navbar-inverse cands navbar-fixed-top">
    <div class="container">
        <div class="navbar-header navbar-default">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <a class="navbar-brand capitalize" href="<?php esc_url( home_url() ) ?>" title="<?php bloginfo('name') ?>">
                @if(empty( Option::get("theme-option-image", "logo") ))
                    <?php bloginfo('name') ?>
                @else
                    <img src="{{ Option::get(" theme-option-image", "logo") }}" alt="<?php bloginfo('name') ?>">
                @endif
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php wp_nav_menu(array(
                            'theme_location' => 'header',
                            'depth' => 2,
                            'container' => 'div',
            //              'menu_id' => 'navbar',
                        //'container_class' => 'nav-container  navbar-collapse collapse',
                        //'container_id' => 'navbar',
                            'menu_class' => 'nav navbar-nav navbar-right main-menu',
                            'fallback_cb' => 'wp_bootstrap_navwallker::fallback',
                            'walker' => new wp_bootstrap_navwalker(),
            )) ?>

                 @include('partials.header.search')

        </div><!--/.nav-collapse -->
    </div>
</nav>