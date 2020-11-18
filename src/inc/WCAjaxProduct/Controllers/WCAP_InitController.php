<?php


namespace WCAjaxProduct\Controllers;


class WCAP_InitController
{
	public static function plugin_init()
	{
		self::register_scripts();
		self::register_api_endpoint();
	}

	public static function register_shortcodes()
	{

	}

	public static function register_api_endpoint()
	{
		add_action('wp_ajax_wcap_get_product', array(WCAP_ProductController::class, 'get_product'));
		add_action('wp_ajax_nopriv_wcap_get_product', array(WCAP_ProductController::class, 'get_product'));
	}

	public static function register_scripts()
	{
		wp_register_script('wc-ajax-product', PLUGIN_URL . 'src/assets/js/wc-ajax-product.js', array('jquery'));
		wp_enqueue_script('wc-ajax-product');
	}

	public static function register_styles()
	{

	}
}
