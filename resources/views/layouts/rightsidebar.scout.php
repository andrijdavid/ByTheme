<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head itemscope itemtype="http://schema.org/WebPage">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Zingabory">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
    <meta name="application-name" content="<?php bloginfo('name'); ?>">
    <meta name="msapplication-TileColor" content="#3372DF">
    <meta itemprop="name" content="webpage"/>
    <meta name="description" content="">
    <meta name="language" content="<?php bloginfo('language'); ?>">
    <meta name="web_author" content="XCentrik">
    <meta name="copyright" content="<?php bloginfo('name'); ?>">
    <meta name="DC.title"
          content="<?php wp_title(\Themosis\Page\Option::get('theme-option-general', 'separator'), true, \Themosis\Page\Option::get('theme-option-general', 'seplocation')) ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    @unless(empty(\Themosis\Page\Option::get(" theme-option-image
    ", "favicon")))
    <link rel="icon" href="{{ \Themosis\Page\Option::get(" theme-option-image
    ", "favicon") }}">
    @endunless
    <link rel="canonical" href="<?php bloginfo('url'); ?>" itemprop="url">
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    <style>
        {{ \Themosis\Page\Option::get("theme-option-custom-code", "style") }}
    </style>
    @yield('head')
    <?php wp_head(); ?>
</head>
<body <?php body_class('clearfix mdc-bg-grey-50'); ?> >
<div class="hidden" id="ambony"></div>
<header itemscope itemtype="http://schema.org/WPHeader">
    @include('partials.header.header')
</header>


<main role="main" class="container-fluid clearfix">
    <div class="row clearfix">
        @yield('header')
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="container">
                <div class="row clearfix">
                    <aside class="sidebar sidebar-primary widget-area col-xs-12 col-md-3 col-lg-3 pull-right mt-50 pt-10"
                           role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                        <div class="container-fluid">
                            <div class="row">
                                @yield('sidebar')
                            </div>
                        </div>
                    </aside>

                    <div class="col-xs-12 col-md-9 col-lg-9 pull-left">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<footer itemscope itemtype="http://schema.org/WPFooter" class="footer">
    @include('partials.footer.footer')
</footer>
<div class="hidden" id="ambany"></div>

<?php wp_footer(); ?>
@yield('scripts')
<script defer>
    {{  \Themosis\Page\Option::get("theme-option-custom-code", "javascript")  }}
</script>
<script defer>
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style');
        msViewportStyle.appendChild(
                document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                )
        );
        document.querySelector('head').appendChild(msViewportStyle);
    }
</script>

</body>
</html>