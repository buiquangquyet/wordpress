<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$mode_view = apply_filters('wooxon_filter_products_mode_view','grid');
$product_layout  = wooxon_get_option_data('optn_woo_archive_products_layout', '1'); 
if($product_layout == '3' && $mode_view == 'grid'){
    remove_action( 'wooxon_after_shop_loop_item_title', 'wooxon_wc_template_loop_product_button_action', 15 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'wooxon_wc_template_loop_product_button_wishlist', 7,1 );
    
}
if($mode_view == 'list'){
    $product_layout = '1';
}
?>
<article <?php post_class(); ?>>
    <div class="product-wrap pl-<?php echo esc_attr($product_layout); ?>">
	<?php	
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10//remove
         * @hooked woocommerce_template_loop_product_title - 10 //add
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	

	/**
	 * wooxon_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5//remove
	 * @hooked woocommerce_template_loop_price - 10//remove
	 */
	do_action( 'wooxon_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
        
	?>
    </div>
</article>