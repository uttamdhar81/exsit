<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */


// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main functions file which contains all the functions and features of the theme. It also includes all the necessary files for the theme to function properly.
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/exsit-constants.php';

//theme setup
require_once EXSIT_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once EXSIT_DIR_PATH_INC . 'essential-scripts.php';


if( class_exists( 'WooCommerce' ) ){
    // Woo Hooks
    require_once EXSIT_DIR_PATH_INC . 'woo-hooks/woo-hooks.php';

    // Woo Hooks Functions
    require_once EXSIT_DIR_PATH_INC . 'woo-hooks/woo-hooks-functions.php';
}

// plugin activation
require_once EXSIT_DIR_PATH_INC . 'plugins-activation/exsit-active-plugins.php';

// sidebar register
require_once EXSIT_DIR_PATH_INC . 'widgets-registration.php';

//essential functions
require_once EXSIT_DIR_PATH_INC . 'helpers.php';

//customcss functions
require_once EXSIT_DIR_PATH_INC . 'exsit-customcss.php';

// helper function
require_once EXSIT_DIR_PATH_INC . 'wp-html-helper.php';

// hooks
require_once EXSIT_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once EXSIT_DIR_PATH_HOOKS . 'hooks-functions.php';




// hooks funtion























