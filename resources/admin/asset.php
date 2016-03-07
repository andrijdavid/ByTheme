<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/19/16
 * Time: 9:51 PM
 */

/**
 * Frontend asset
 * */
Asset::add('main-style', 'css/style.css', false, '0.7.3', 'all', 'style');
Asset::add('main-script', 'js/script.js', false, '0.7.3', false, 'script');



/**
 * Backend asset
 * */
Asset::add('admin-script', 'js/admin.js', false, '1.0', false, 'script')->to("admin");
Asset::add('ace-script', 'src/vendor/ace-builds/src-min-noconflict/ace.js', false, '1.0', false, 'script')->to('admin');