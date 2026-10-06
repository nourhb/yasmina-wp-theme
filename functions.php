<?php
/**
 * Yasmina theme functions.
 *
 * @package Yasmina
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version used for asset cache busting.
 */
define( 'YASMINA_VERSION', '1.0.0' );

/**
 * Set up theme defaults and register support for WordPress features.
 */
function yasmina_setup() {
	// Block styles and responsive embeds.
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );

	// Featured images, document title, and feeds.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

	// Semantic HTML5 markup.
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Flexible custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Navigation menu locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'yasmina' ),
			'footer'  => esc_html__( 'Footer Menu', 'yasmina' ),
			'social'  => esc_html__( 'Social Links Menu', 'yasmina' ),
		)
	);

	// Translation files.
	load_theme_textdomain( 'yasmina', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'yasmina_setup' );

/**
 * Register the footer widget area.
 */
function yasmina_register_sidebars() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'yasmina' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Widgets displayed in the site footer.', 'yasmina' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'yasmina_register_sidebars' );

/**
 * Enqueue front-end styles and scripts.
 */
function yasmina_enqueue_assets() {
	// Google Fonts: Cormorant Garamond (display) and Jost (body).
	wp_enqueue_style(
		'yasmina-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Jost:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	// Main stylesheet.
	wp_enqueue_style(
		'yasmina-style',
		get_stylesheet_uri(),
		array( 'yasmina-fonts' ),
		YASMINA_VERSION
	);

	// Theme behaviour script, loaded deferred in the footer.
	wp_enqueue_script(
		'yasmina-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		YASMINA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'yasmina_enqueue_assets' );

/**
 * Enqueue editor-only styles.
 */
function yasmina_enqueue_editor_assets() {
	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'yasmina_enqueue_editor_assets' );

/**
 * Register custom block styles.
 */
function yasmina_register_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'  => 'pill',
			'label' => esc_html__( 'Pill', 'yasmina' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'outline-gold',
			'label' => esc_html__( 'Outline Gold', 'yasmina' ),
		)
	);

	register_block_style(
		'core/quote',
		array(
			'name'  => 'large',
			'label' => esc_html__( 'Large', 'yasmina' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => esc_html__( 'Card', 'yasmina' ),
		)
	);
}
add_action( 'init', 'yasmina_register_block_styles' );

/**
 * Register the Yasmina block pattern category.
 */
function yasmina_register_pattern_category() {
	register_block_pattern_category(
		'yasmina',
		array(
			'label' => esc_html__( 'Yasmina', 'yasmina' ),
		)
	);
}
add_action( 'init', 'yasmina_register_pattern_category' );

/**
 * Shorten excerpts to keep cards tidy.
 *
 * @param int $length Current excerpt length.
 * @return int
 */
function yasmina_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'yasmina_excerpt_length' );

/**
 * Append an elegant "Continue reading" link to excerpts.
 *
 * @param string $more Current excerpt suffix.
 * @return string
 */
function yasmina_excerpt_more( $more ) {
	return sprintf(
		' &hellip; <a class="yasmina-read-more" href="%1$s">%2$s</a>',
		esc_url( get_permalink() ),
		esc_html__( 'Continue reading →', 'yasmina' )
	);
}
add_filter( 'excerpt_more', 'yasmina_excerpt_more' );

/**
 * Return a whitelisted inline SVG icon.
 *
 * The markup is static and safe to output directly. Unknown names
 * return an empty string.
 *
 * @param string $name Icon name: scissors, sparkle, leaf, arrow.
 * @return string
 */
function yasmina_svg_icon( $name = '' ) {
	$icons = array(
		'scissors' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></svg>',
		'sparkle'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/><path d="M19 15l.9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15z"/></svg>',
		'leaf'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.5 19 2c1 2.5 2 5.5 1.5 9.5C19.5 17.5 15 21 11 20z"/><path d="M2 21c4-6 8-9 12-11"/></svg>',
		'arrow'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
	);

	if ( isset( $icons[ $name ] ) ) {
		return $icons[ $name ];
	}

	return '';
}
