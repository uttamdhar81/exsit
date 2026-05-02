<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit();
}

if (defined('ELEMENTOR_PRO_VERSION')) {
    return;
} else {
    exsit_global_header();
}