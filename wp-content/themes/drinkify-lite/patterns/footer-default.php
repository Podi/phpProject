<?php
 /**
  * Title: Footer
  * Slug: drinkify-lite/footer
  * Categories: drinkify-lite, footer
  */
?>
<!-- wp:group {"align":"wide","className":"wp-block-footer  wp-block-site-generator bottom-footer","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide wp-block-footer wp-block-site-generator bottom-footer">
		<!-- wp:group {"align":"wide","className":"wp-block-site-info","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
		<div class="wp-block-group alignwide wp-block-site-info">
			<!-- wp:paragraph -->
			<p><?php printf( 
				_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'drinkify-lite' ), 
				esc_attr( date_i18n( __( 'Y', 'drinkify-lite' ) ) ), 
				'<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a><span class="sep"> | </span>Drinkify Lite by <a target="_blank" href="https://catchthemes.com">Catch Themes</a>' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:navigation {} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
