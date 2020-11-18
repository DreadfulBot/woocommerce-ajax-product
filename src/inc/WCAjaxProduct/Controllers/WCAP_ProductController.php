<?php


namespace WCAjaxProduct\Controllers;


class WCAP_ProductController
{
	public static function get_product()
	{
		$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : null;

		if ($product_id) {
			$markup = do_shortcode(sprintf('[product_page id="%s"]', $product_id));
			wp_send_json_success(array('markup' => $markup));
		}

		wp_send_json_error(array('error' => 'id not passed'));

		die();
	}

}
