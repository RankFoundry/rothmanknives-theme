<?php
/**
 * Rothman Knives Theme
 *
 * @package   RothmanKnives_Theme
 * @link      https://rankfoundry.com
 * @copyright Copyright (C) 2021-2024, Rank Foundry LLC - support@rankfoundry.com
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/*--------------------------------------------------------------*/
/*---------------------- Theme Setup ---------------------------*/
/*--------------------------------------------------------------*/
// Define theme version
if (!defined('RothmanKnives_THEME_VERSION')) {
    define('RothmanKnives_THEME_VERSION', '1.0.0');
}

// Define theme directory path
if (!defined('RothmanKnives_THEME_DIR')) {
    define('RothmanKnives_THEME_DIR', trailingslashit( get_stylesheet_directory() ));
}

// Define theme directory URI
if (!defined('RothmanKnives_THEME_DIR_URI')) {
    define('RothmanKnives_THEME_DIR_URI', trailingslashit( esc_url( get_stylesheet_directory_uri() )));
}

// Define current theme name
if (!defined('CURRENT_THEME_NAME')) {
    $current_theme_obj = wp_get_theme();
    define('CURRENT_THEME_NAME', $current_theme_obj->get('Name'));
}

// Load the Composer autoloader.
require_once RothmanKnives_THEME_DIR . 'vendor/autoload.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;


/*--------------------------------------------------------------*/
/*------------------ Theme Update Checker ----------------------*/
/*--------------------------------------------------------------*/
if ( 'RothmanKnives' === CURRENT_THEME_NAME ) {
	$themeUpdateChecker = PucFactory::buildUpdateChecker(
		'https://github.com/rankfoundry/rothmanknives-theme/',
		RothmanKnives_THEME_DIR . '/functions.php',
		'RothmanKnives'
	);
	$themeUpdateChecker->setBranch('main');
}


/*---------------------------------------------------------------*/
/*---------------------- Theme Styles ---------------------------*/
/*---------------------------------------------------------------*/
function RothmanKnives_enqueue_styles() {
	wp_enqueue_style( 'RothmanKnives', get_stylesheet_directory_uri() . '/style.css', array() );
}

add_action( 'wp_enqueue_scripts', 'RothmanKnives_enqueue_styles' ); 

