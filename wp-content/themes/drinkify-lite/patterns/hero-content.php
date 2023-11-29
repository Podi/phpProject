<?php
 /**
  * Title: Hero Content
  * Slug: drinkify-lite/hero-content	
  * Categories: drinkify-lite, featured
  */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/hero-img.jpg' ) ); ?>","id":145,"dimRatio":0,"isDark":false,"align":"full","className":"hero-section wp-block-section"} -->
<div class="wp-block-cover alignfull is-light hero-section wp-block-section">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background wp-image-145" alt="" src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/hero-img.jpg' ) ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"100%"} -->
			<div class="wp-block-column" style="flex-basis:100%">
				<!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"100%","className":"hero-content"} -->
			<div class="wp-block-column hero-content" style="flex-basis:100%">
				<!-- wp:heading {"textAlign":"left","fontSize":"large-section-title"} -->
				<h2 class="wp-block-heading has-text-align-left has-large-section-title-font-size"><?php esc_html_e ( 'Wine Spectator', 'drinkify-lite' ); ?></h2>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"left","placeholder":"Write title…","className":"content"} -->
				<p class="has-text-align-left content"><?php esc_html_e ( 'White dry wine of Appellation of Controlled Origin. Made from grape varieties cultivated in France. WooCommerce theme by Catch Themes. Modern edgy Full-Site editing theme.', 'drinkify-lite' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button">
						<a class="wp-block-button__link wp-element-button"><?php esc_html_e ( 'Read More', 'drinkify-lite' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
		<!-- wp:image {"id":1059,"sizeSlug":"full","linkDestination":"none","className":"hero-overlay-img"} -->
		<figure class="wp-block-image size-full hero-overlay-img">
			<img src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/bottle.png' ) ); ?>" alt="" class="wp-image-1059"/>
		</figure>
		<!-- /wp:image -->
	</div>
</div>
<!-- /wp:cover -->