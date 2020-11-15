### Woocommerce Ajax Product

This plugin an endpoint-wrapper for woocommerce default shortcode
```[product page id="<id>"]```

#### You can call

**wc_ajax_product.get_product(product_id) from everywhere for returning same html markup over ajax.**

Very useful for displaying full product pages, for example, in modal windows.

#### Usage case

Landing page with products on it. And, for time reducing, you want to show products in modals, without visiting full product page.

**Solution also should be optimized:** common case: do not load all products at one. Load it 'on demand';

#### How to do:

##### Installation
_NOTE: plugin made on wp cli plugin scaffold_
1. in `src/` make `composer dump-autoload -o`
2. install the plugin

##### Usage
1. Make modal (I use [Wordpress Popup Maker](https://wppopupmaker.com/) because it is one of the most popular).
    1. Sure, you can create modal for each product and put woocommerce `product page` shortcode in it, but performance will be very bad at all. That happens so because all shortcodes are processing on server side and all products will be loading at once.

2. After that, you can use global object `wc_ajax_product` and it's method `get_product` everywhere. Just pass product id and it will return you `jquey deffered` object (JS promise wrapper).
3. Take product page html markup from `response.data.markup`

##### Some example source code from me:
It shows product markup in modal after loading it:

```
window.wc_ajax_product.get_product(product_id).then(function (response) {
    showModal(modal_selector, response.data.markup);
    reloadWooCommerce();
    reloadGallery();
    $.unblockUI();
});
```

And, my advice to you, especially if you're working with woocommerce and any JS plugins, that affects your product page after load: BE CAREFUL. Often such plugins triggers on `document.load` event and, sometimes, it's hard to re-init them on demand.
