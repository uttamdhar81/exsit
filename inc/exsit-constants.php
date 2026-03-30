<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */


// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'EXSIT_DIR_URI' ) ) {
    define('EXSIT_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'EXSIT_DIR_ASSIST_URI' ) ) {
    define( 'EXSIT_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'EXSIT_DIR_CSS_URI' ) ) {
    define( 'EXSIT_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'EXSIT_DIR_SKIN_CSS_URI' ) ) {
    define( 'EXSIT_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('EXSIT_DIR_JS_URI')) {
    define('EXSIT_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('EXSIT_DIR_PLUGIN_URI')) {
    define('EXSIT_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('EXSIT_DIR_PATH')) {
    define('EXSIT_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('EXSIT_DIR_PATH_INC')) {
    define('EXSIT_DIR_PATH_INC', EXSIT_DIR_PATH . 'inc/');
}

//EXSIT framework Folder Directory
if (!defined('EXSIT_DIR_PATH_FRAM')) {
    define('EXSIT_DIR_PATH_FRAM', EXSIT_DIR_PATH_INC . 'exsit-framework/');
}

//Classes Folder Directory
if (!defined('EXSIT_DIR_PATH_CLASSES')) {
    define('EXSIT_DIR_PATH_CLASSES', EXSIT_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('EXSIT_DIR_PATH_HOOKS')) {
    define('EXSIT_DIR_PATH_HOOKS', EXSIT_DIR_PATH_INC . 'hooks/');
}
