<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(  ); ?>>

	<div class="container-fluid">
		<div class="col-md-8">
			<?php
				/**
				 * woocommerce_before_single_product_summary hook.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>

			<div class="entry-summary col-md-7">

				<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>

				<div class="product-description-container">
					<?php echo the_content(); ?>
					<p>All parts provided by AP+M are guaranteed with a <a href="http://apm4parts.com/wp-content/uploads/Terms-Conditions-of-Sale.pdf" target="_blank">warranty</a>. We offer OEM-approved repair and overhaul services along with expert technical support to all customers.</p>
					<br>
					<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Related Part:', 'Related Parts:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

					<!-- <p>Related Parts:</p> -->
					<!-- Below gets product tags -->
					<!-- <?php echo $product->get_tags(); ?> -->
				</div>


			</div><!-- .summary -->
		</div> <!-- end col md 8 -->


	<div class="col-md-4 form-sidebar">
			<section id="parts-quote-form">
					<h3><?php the_field( 'parts-title', 'options' ); ?></h3>
					<h4 style="margin-top:0px;">Need Immediate Assistance? Call 1-800-998-9844</h4>
					<?php echo ninja_forms_display_form( get_field( 'parts-form',' options' ) ); ?>
			</section>
	</div>

</div><!-- .container -->

	<div class="add-info">
		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
