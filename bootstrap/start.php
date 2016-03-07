<?php
/*----------------------------------------------------*/
// Load Whoops
/*-----------------------------------------------------*/

use Composer\Autoload\ClassLoader;
use Illuminate\Cache\CacheManager;
use Illuminate\Cache\MemcachedConnector;
use Themosis\Configuration\Constant;
use Themosis\Configuration\Images;
use Themosis\Configuration\Menu;
use Themosis\Configuration\Sidebar;
use Themosis\Configuration\Support;
use Themosis\Configuration\Template;
use Themosis\Core\AdminLoader;
use Themosis\Core\WidgetLoader;
use Themosis\Facades\Config;

$run = new \Whoops\Run;
$handler = new \Whoops\Handler\PrettyPageHandler;

// Set the title of the error page:
$handler->setPageTitle("Whoops! There was a problem.");

$run->pushHandler($handler);

// Add a special handler to deal with AJAX requests with an
// equally-informative JSON response. Since this handler is
// first in the stack, it will be executed before the error
// page handler, and will have a chance to decide if anything
// needs to be done.
if (\Whoops\Util\Misc::isAjaxRequest()) {
    $run->pushHandler(new \Whoops\Handler\JsonResponseHandler);
}

// Register the handler with PHP, and you're set!
$run->register();

/*----------------------------------------------------*/
// Set theme's configurations.
/*----------------------------------------------------*/
// Load the theme configuration files.
add_filter('themosisConfigPaths', function ($paths) {
    $paths[] = themosis_path('theme') . 'config' . DS;
    return $paths;
});


/*----------------------------------------------------*/
// Autoload theme classes.
/*----------------------------------------------------*/
$loader = new ClassLoader();
$classes = Config::get('loading');

foreach ($classes as $prefix => $path) {
    $loader->addPsr4($prefix, $path);
}

$loader->register();

/*----------------------------------------------------*/
// Load Cache
/*-----------------------------------------------------*/


$cacheConfig = Config::get('cache');
$databaseConfig = Config::get('database');

$cnt = new \Illuminate\Container\Container();

\Illuminate\Container\Container::setInstance($cnt);

$cnt->singleton('memcached.connector', function () {
    return new MemcachedConnector;
});

$cnt->singleton('cache', function ($app) {
    return new  CacheManager($app);
});

$cnt->singleton('config', function () use ($cacheConfig) {
    $cc = array_dot(array_except($cacheConfig, 'stores'), 'cache.');
    foreach ($cacheConfig["stores"] as $key => $value) {
        $cc["cache.stores." . $key] = $value;
    }
    return $cc;
});

$cacheManager = new CacheManager($cnt);

//$cache = $cacheManager->driver();

/*----------------------------------------------------*/
// Register theme view paths.
/*----------------------------------------------------*/
add_filter('themosisViewPaths', function ($paths) {
    $paths[] = themosis_path('theme') . 'views' . DS;
    return $paths;
});

/*----------------------------------------------------*/
// Register theme asset paths.
/*----------------------------------------------------*/
add_filter('themosisAssetPaths', function ($paths) {
    $paths[THEMOSIS_ASSETS] = themosis_path('theme') . 'assets';
    return $paths;
});

/*----------------------------------------------------*/
// Theme class aliases.
/*----------------------------------------------------*/
add_filter('themosisClassAliases', function ($aliases) {
    // application.config.php aliases
    $themeAliases = Config::get('application.aliases');

    // Allow developer to overwrite an existing alias
    $aliases = array_merge($aliases, $themeAliases);
    return $aliases;
});

/*----------------------------------------------------*/
// Theme textdomain.
/*----------------------------------------------------*/
defined('THEMOSIS_TEXTDOMAIN') ? THEMOSIS_TEXTDOMAIN : define('THEMOSIS_TEXTDOMAIN', Config::get('application.textdomain'));

/*----------------------------------------------------*/
// Theme cleanup.
/*----------------------------------------------------*/
if (Config::get('application.cleanup')) {
    add_action('init', 'themosisThemeCleanup');
}

/*----------------------------------------------------*/
// Theme restriction. Block wp-admin access.
/*----------------------------------------------------*/
$access = Config::get('application.access');

if (!empty($access) && is_array($access)) {
    add_action('init', 'themosisThemeRestrict');
}

/*----------------------------------------------------*/
// Theme constants.
/*----------------------------------------------------*/
$constants = Config::get('constants');
$constant = new Constant($constants);
$constant->make();

/*----------------------------------------------------*/
// Theme page templates.
/*----------------------------------------------------*/
$templates = Config::get('templates');
$tpl = new Template($templates);
$tpl->make();

/*----------------------------------------------------*/
// Theme image sizes.
/*----------------------------------------------------*/
$sizes = Config::get('images');
$images = new Images($sizes);
$images->make();

/*----------------------------------------------------*/
// Theme menus.
/*----------------------------------------------------*/
$menus = Config::get('menus');
new Menu($menus);

/*----------------------------------------------------*/
// Theme sidebars.
/*----------------------------------------------------*/
$bars = Config::get('sidebars');
new Sidebar($bars);

/*----------------------------------------------------*/
// Theme supports.
/*----------------------------------------------------*/
$supports = Config::get('supports');
new Support($supports);

/*----------------------------------------------------*/
// Parse application files and include them.
// Extends the 'functions.php' file by loading
// files located under the 'admin' folder.
/*----------------------------------------------------*/
$adminPath = themosis_path('admin');
new AdminLoader($adminPath);

/*----------------------------------------------------*/
// Theme widgets.
/*----------------------------------------------------*/
$widgetPath = themosis_path('theme') . 'widgets' . DS;
new WidgetLoader($widgetPath);

/*----------------------------------------------------*/
// Theme global JS object.
/*----------------------------------------------------*/
add_action('wp_head', 'themosisInstallThemeGlobalObject');

/*----------------------------------------------------*/
// Theme cleanup.
/*----------------------------------------------------*/
function themosisThemeCleanup()
{
    global $wp_widget_factory;

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    if (array_key_exists('WP_Widget_Recent_Comments', $wp_widget_factory->widgets)) {
        remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
    }

    add_filter('use_default_gallery_style', '__return_null');
}

/*----------------------------------------------------*/
// Theme restriction.
/*----------------------------------------------------*/
function themosisThemeRestrict()
{
    $access = Config::get('application.access');

    if (is_admin()) {
        $user = wp_get_current_user();
        $role = $user->roles;
        $role = (count($role) > 0) ? $role[0] : '';

        if (!in_array($role, $access) && !(defined('DOING_AJAX') && DOING_AJAX) && !(defined('WP_CLI') && WP_CLI)) {
            wp_redirect(home_url());
            exit;
        }
    }
}

/*----------------------------------------------------*/
// Theme JS global object.
/*----------------------------------------------------*/
function themosisInstallThemeGlobalObject()
{
    $namespace = Config::get('application.namespace');
    $url = admin_url() . Config::get('application.ajaxurl') . '.php';

    $datas = apply_filters('themosisGlobalObject', []);

    $output = "<script type=\"text/javascript\">\n\r";
    $output .= "//<![CDATA[\n\r";
    $output .= "var " . $namespace . " = {\n\r";
    $output .= "ajaxurl: '" . $url . "',\n\r";

    if (!empty($datas)) {
        foreach ($datas as $key => $value) {
            $output .= $key . ": " . json_encode($value) . ",\n\r";
        }
    }

    $output .= "};\n\r";
    $output .= "//]]>\n\r";
    $output .= "</script>";

    // Output the datas.
    echo($output);
}


/*----------------------------------------------------*/
// Register Shortcode
/*----------------------------------------------------*/
$short = Config::get('shortcodes');

foreach ($short as $s) {
    add_shortcode($s, function ($atts, $content, $tags) use ($s) {

        return View::make("shortcodes." . $s, array_merge($atts, ['content' => $content, 'tags' => $tags]))->render();
    });
}


/*----------------------------------------------------*/
// UnRegister Widgets
/*----------------------------------------------------*/
$widgets = Config::get('widgets.delete');

add_action('widgets_init', function () use ($widgets) {
    foreach ($widgets as $widget) {
        unregister_widget($widget);
    }
});


/*----------------------------------------------------*/
// Set Carbon locale
/*----------------------------------------------------*/
setlocale(LC_TIME, get_locale());
//\Carbon\Carbon::setLocale(get_locale());

/*----------------------------------------------------*/
// Handle application requests/responses.
/*----------------------------------------------------*/
function themosis_start_app()
{
    do_action('themosis_parse_query', $arg = '');

    /*----------------------------------------------------*/
    // Application routes.
    /*----------------------------------------------------*/
    require themosis_path('theme') . 'routes.php';

    /*----------------------------------------------------*/
    // Run application and return a response.
    /*----------------------------------------------------*/
    do_action('themosis_run');
}