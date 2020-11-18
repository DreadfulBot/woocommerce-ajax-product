(function ($) {
	window.wc_ajax_product = {
		ajax_endpoint: '/wp-admin/admin-ajax.php',

		get_product: function (product_id) {
			var data = {
				action: 'wcap_get_product',
				product_id: product_id
			};

			var d = $.Deferred();
			$.post(this.ajax_endpoint, data)
				.success(function (response) {
					d.resolve(response);
				})
				.error(function () {
					console.error("WcAjaxProduct - unable to load product");
					d.reject();
				});

			return d;
		}
	};
}(jQuery));
