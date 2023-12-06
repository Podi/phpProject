<?php
/**
 * Drinkify Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Drinkify Lite
 * @since 1.0
 */

if ( ! function_exists( 'drinkify_lite_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function drinkify_lite_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'drinkify_lite_support' );

if ( ! function_exists( 'drinkify_lite_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */

	function drinkify_lite_styles() {
		// Enqueue theme stylesheet.
		wp_enqueue_style(
			'drinkify-lite-style',
			get_template_directory_uri() . '/style.css',
			array(),
			filemtime( get_theme_file_path( 'style.css' ) )
		);

		wp_enqueue_script(
            'drinkify-lite-script',
            get_theme_file_uri( 'assets/js/custom.js' ),
            array(),
            filemtime( get_theme_file_path( 'assets/js/custom.js' ) ),
            true
        );

        if (is_page('wine-of-the-day')) {
          wp_enqueue_script(
            'wine-of-the-day-script',
            get_theme_file_uri( 'assets/js/wine-of-the-day.js' ),
            array(),
            filemtime( get_theme_file_path( 'assets/js/wine-of-the-day.js' ) ),
            true
          );
        }
	}

endif;

add_action( 'wp_enqueue_scripts', 'drinkify_lite_styles' );

if ( ! function_exists( 'drinkify_lite_block_editor_styles' ) ) :

    /**
     * Enqueue rtl editor styles
     */

     function drinkify_lite_block_editor_styles() {
        if( is_rtl() ){
            wp_enqueue_style(
                'drinkify-lite-rtl',
                get_theme_file_uri( 'rtl.css' ),
                array(),
                filemtime( get_theme_file_path( 'rtl.css' ) )
            );
        }
    }

endif;

add_action( 'enqueue_block_editor_assets', 'drinkify_lite_block_editor_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

add_action('add_attachment', 'set_default_featured_image');

function set_default_featured_image($attachment_id) {
    if (wp_get_attachment_metadata($attachment_id)['post_mime_type'] === 'image/jpeg') {
        update_post_thumbnail(0, $attachment_id);
    }
}

add_action( 'rest_api_init', 'prefix_register_example_routes' );

function prefix_register_example_routes() {
  register_rest_route( 'wine/v1', '/wine-of-the-day', array(
      'methods'  => WP_REST_Server::READABLE,
      'callback' => 'get_wine_of_the_day',
  ) );
}

function get_wine_of_the_day(WP_REST_Request $request) {
    $day = $request['day'];

    $url = "https://wine-of-the-day.azurewebsites.net/api/wine-of-the-day";
    $api_key = "A66ZQEVgwHyLQDVWEc0lnEDSBdLFBhzTsLbd_ZQvQIlBAzFuwN7Itg==";

    $wineOfTheDay = file_get_contents("{$url}?day={$day}&code={$api_key}");
    $wineOfTheDay = json_decode($wineOfTheDay, true);

    return rest_ensure_response($wineOfTheDay);
}

