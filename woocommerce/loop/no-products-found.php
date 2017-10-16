<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

	<div class="col-md-8">
		<div class="alert alert-danger">
		    <p>Sorry, we currently do not have that part in stock.</p>
		</div>

		<div class="no-result-search-bar">
				<?php
					if ( function_exists( 'woocommerce_product_search' ) ) {
						echo woocommerce_product_search( array( 'limit' => 20, 'sku' => 'yes', 'placeholder' => 'Enter Your Part Number Here', 'submit_button' => 'yes', 'submit_button_label' => 'Go' ) );
					}
				?>
		</div>

		<div class="business-hours">
			<h3>Need Immediate Assistance?</h3>
			<p>
				Call 1-800-998-9844<br>
				Business Hours: Monday-Friday 8am-5pm
			</p>
		</div>

	</div>

	<div class="col-md-4 form-sidebar" style="margin-bottom:60px;">
		<section id="parts-quote-form">
				<h3>Can't find your part?</h3>
				<h4 style="margin-top:0px;">Please provide us with additional information below and one of our Customer Service personnel will assist</h4>
				<?php ninja_forms_display_form(  $form_id = '8' );  ?>
		</section>
	</div>
