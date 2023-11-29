<?php
 /**
  * Title: Best Seller
  * Slug: drinkify-lite/best-seller	
  * Categories: drinkify-lite, featured
  */
?>
<!-- wp:group {"align":"full","className":"product best-seller-section wp-block-section scroller-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull product best-seller-section wp-block-section scroller-section">
	<!-- wp:group {"align":"wide","className":"section-heading","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide section-heading">
		<!-- wp:group {"align":"wide","layout":{"className":"section-heading","type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide section-heading">
			<!-- wp:heading {"fontSize":"section-title"} -->
			<h2 class="wp-block-heading has-section-title-font-size"><?php esc_html_e ( 'Best Seller', 'drinkify-lite' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-drinkify-lite-button"} -->
				<div class="wp-block-button is-style-drinkify-lite-button">
					<a class="wp-block-button__link wp-element-button"><?php esc_html_e ( 'All natural Wines', 'drinkify-lite' ); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","className":"inner-wrap","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull inner-wrap">
		<!-- wp:woocommerce/product-best-sellers {"columns":6,"rows":1,"align":"wide"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->