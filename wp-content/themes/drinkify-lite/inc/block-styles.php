<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package Drinkify Lite
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 0.1
	 *
	 * @return void
	 */
	function drinkify_lite_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'drinkify-lite-padding-0',
				'label' => esc_html__( 'No Padding', 'drinkify-lite' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'drinkify-lite-post-author-card',
				'label' => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'drinkify-lite-button',
				'label'        => esc_html__( 'Plain', 'drinkify-lite' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'drinkify-lite-post-comments',
				'label'        => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'drinkify-lite-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'drinkify-lite-wp-table',
				'label'        => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'drinkify-lite-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'drinkify-lite-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'drinkify-lite' ),
			)
		);
	}
	add_action( 'init', 'drinkify_lite_register_block_styles' );
}
