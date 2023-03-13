<?php
/*
Plugin Name: Shyvarbidze Pro modules for WPBakery
Description: Theme modules for WPBakery
Author: Zurab Shyvarbdize
Version: 1.0.8
Author URI: https://shyvarbidze.pro/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// init styles & scripts
function themeslug_enqueue_style() {
	wp_enqueue_style( 'zshStyle', plugins_url( '/assets/css/style.css', __FILE__ ), false );

	wp_enqueue_script( 'zshScript', plugins_url( '/assets/js/script.js', __FILE__ ), [ 'jquery' ], null, true );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );


// WPBakery
require_once( 'class/class-vc-cleanup.php' );

//Components
require_once( 'class/class-vc-product.php' );
