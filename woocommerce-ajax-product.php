<?php
/**
 * Plugin Name:     Woocommerce Ajax Product
 * Plugin URI:      https://github.com/DreadfulBot/woocommerce-ajax-product.git
 * Description:     Loads woocommerce products over ajax requests
 * Author:          Krivoshchekov Artem
 * Author URI:      https://github.com/DreadfulBot
 * Text Domain:     woocommerce-ajax-product
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Woocommerce_Ajax_Product
 */

// Your code starts here.

use WCAjaxProduct\Controllers\WCAP_InitController;

require_once __DIR__ . '/src/index.php';
define('PLUGIN_URL', plugin_dir_url(__FILE__));

add_action('init', array(WCAP_InitController::class, 'plugin_init'));

