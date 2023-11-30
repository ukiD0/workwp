<?php
/**
 * VW Automobile Lite functions and definitions
 *
 * @package VW Automobile Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function vw_automobile_lite_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if (!function_exists('vw_automobile_lite_setup')):

function vw_automobile_lite_setup() {

	if (!isset($content_width)) {
		$content_width = 640;
	}
	/* pixels */
	load_theme_textdomain('vw-automobile-lite', get_template_directory().'/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support('title-tag');
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support('custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	));
	add_image_size('vw-automobile-lite-homepage-thumb', 240, 145, true);

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'vw-automobile-lite'),
	));

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array('image', 'video', 'gallery', 'audio', ));

	add_theme_support('custom-background', array(
			'default-color' => 'f1f1f1',
		));

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', vw_automobile_lite_font_url()));

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'vw_automobile_lite_activation_notice');
	}

	// Theme Activation Redirects To Get Started Page
	if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated']) && wp_get_theme()->get('TextDomain') === 'vw-automobile-lite') {
		wp_redirect(admin_url('themes.php?page=vw_automobile_lite_guide'));
	}
}
endif;
add_action('after_setup_theme', 'vw_automobile_lite_setup');

// Notice after Theme Activation
function vw_automobile_lite_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'.esc_html__('Thank you for choosing VW Automobile theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Automobile theme.', 'vw-automobile-lite').'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw_automobile_lite_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-automobile-lite' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-automobile-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-automobile-lite' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/themes/automobile-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-automobile-lite' ) .'</a></span>';
	echo '</div>';
}

/* Theme Widgets Setup */
function vw_automobile_lite_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'vw-automobile-lite'),
		'description'   => __('Appears on blog page sidebar', 'vw-automobile-lite'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'vw-automobile-lite'),
		'description'   => __('Appears on page sidebar', 'vw-automobile-lite'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Sidebar 3', 'vw-automobile-lite'),
		'description'   => __('Appears on Blog Page sidebar', 'vw-automobile-lite'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 1', 'vw-automobile-lite'),
		'description'   => __('Appears on footer ', 'vw-automobile-lite'),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 2', 'vw-automobile-lite'),
		'description'   => __('Appears on footer ', 'vw-automobile-lite'),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 3', 'vw-automobile-lite'),
		'description'   => __('Appears on footer ', 'vw-automobile-lite'),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 4', 'vw-automobile-lite'),
		'description'   => __('Appears on footer ', 'vw-automobile-lite'),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on shop page', 'vw-automobile-lite' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on single product page', 'vw-automobile-lite' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on right side footer', 'vw-automobile-lite' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );    
}
add_action('widgets_init', 'vw_automobile_lite_widgets_init');

function vw_automobile_lite_font_url() {
	$font_family   = array(
		'Abril Fatface',
		'Acme',
		'Anton',
		'Architects Daughter',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
	 	'Rosario:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	 	'Berkshire Swash',
	 	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	 	'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'
	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function vw_automobile_lite_scripts() {
	wp_enqueue_style('vw-automobile-lite-font', vw_automobile_lite_font_url(), array());
	wp_enqueue_style('vw-automobile-lite-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'vw-automobile-lite-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('vw-automobile-lite-basic-style', get_stylesheet_uri());
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'vw-automobile-lite-basic-style',$vw_automobile_lite_custom_css );
	wp_enqueue_style('vw-automobile-lite-effect', get_template_directory_uri().'/css/effect.css');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js', array('jquery'), '', true);
	wp_enqueue_script( 'jquery-superfish-js', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script('vw-automobile-lite-customs', get_template_directory_uri().'/js/custom.js', array('jquery'));

	if (get_theme_mod('vw_automobile_lite_animation', true) == true){
		wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery') );
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' );
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'vw_automobile_lite_scripts');

/**
 * Enqueue block editor style
 */
function vw_automobile_lite_block_editor_styles() {
	wp_enqueue_style( 'vw-automobile-lite-font', vw_automobile_lite_font_url(), array() );
    wp_enqueue_style( 'vw-automobile-lite-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'vw_automobile_lite_block_editor_styles' );

define('VW_AUTOMOBILE_LITE_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-vw-automobile-lite/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_SUPPORT',__('https://wordpress.org/support/theme/vw-automobile-lite/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_REVIEW',__('https://wordpress.org/support/theme/vw-automobile-lite/reviews/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_BUY_NOW',__('https://www.vwthemes.com/themes/automobile-wordpress-theme/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_LIVE_DEMO',__('https://www.vwthemes.net/vw-automobile-theme/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-automobile-pro/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_FAQ',__('https://www.vwthemes.com/faqs/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_CONTACT',__('https://www.vwthemes.com/contact/','vw-automobile-lite'));
define('VW_AUTOMOBILE_LITE_CREDIT',__('https://www.vwthemes.com/themes/wp-automobile-wordpress-theme/','vw-automobile-lite'));

if (!function_exists('vw_automobile_lite_credit')) {
	function vw_automobile_lite_credit() {
		echo "<a href=".esc_url(VW_AUTOMOBILE_LITE_CREDIT)." target='_blank'>".esc_html__('Automobile WordPress Theme', 'vw-automobile-lite')."</a>";
	}
}

/* Excerpt Limit Begin */
function vw_automobile_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit+1));
	if (count($words) > $word_limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}

function vw_automobile_lite_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
function vw_automobile_lite_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

function vw_automobile_lite_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function vw_automobile_lite_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_automobile_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_automobile_lite_loop_columns');
	if (!function_exists('vw_automobile_lite_loop_columns')) {
	function vw_automobile_lite_loop_columns() {
		return get_theme_mod( 'vw_automobile_lite_products_per_row', '3' ); 
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_automobile_lite_products_per_page' );
function vw_automobile_lite_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_automobile_lite_products_per_page',9);
}

function vw_automobile_lite_logo_title_hide_show(){
	if(get_theme_mod('vw_automobile_lite_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_automobile_lite_tagline_hide_show(){
	if(get_theme_mod('vw_automobile_lite_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

add_action( 'wp_ajax_vw_automobile_lite_reset_all_settings', 'vw_automobile_lite_reset_all_settings' );
function vw_automobile_lite_reset_all_settings() {
	remove_theme_mod( 'vw_automobile_lite_slider_hide_show' );
	remove_theme_mod( 'vw_automobile_lite_slider_page' );
	remove_theme_mod( 'vw_automobile_lite_slider_button_text' );
	remove_theme_mod( 'vw_automobile_lite_slider_title_hide_show' );
	remove_theme_mod( 'vw_automobile_lite_slider_content_hide_show' );
	remove_theme_mod( 'vw_automobile_lite_slider_content_option' );
	remove_theme_mod( 'vw_automobile_lite_slider_content_padding_top_bottom' );
	remove_theme_mod( 'vw_automobile_lite_slider_content_padding_left_right' );
	remove_theme_mod( 'vw_automobile_lite_slider_excerpt_number' );
	remove_theme_mod( 'vw_automobile_lite_slider_opacity_color' );
	remove_theme_mod( 'vw_automobile_lite_slider_height' );
	remove_theme_mod( 'vw_automobile_lite_slider_speed' );
	remove_theme_mod( 'vw_automobile_lite_footer_background_color' );
	remove_theme_mod( 'vw_automobile_lite_footer_copy' );
	remove_theme_mod( 'vw_automobile_lite_copyright_font_size' );
	remove_theme_mod( 'vw_automobile_lite_copyright_padding_top_bottom' );
	remove_theme_mod( 'vw_automobile_lite_copyright_alignment' );
	remove_theme_mod( 'vw_automobile_lite_hide_show_scroll' );
	remove_theme_mod( 'vw_automobile_lite_scroll_top_icon' );
	remove_theme_mod( 'vw_automobile_lite_scroll_to_top_font_size' );
	remove_theme_mod( 'vw_automobile_lite_scroll_to_top_padding' );
	remove_theme_mod( 'vw_automobile_lite_scroll_to_top_width' );
	remove_theme_mod( 'vw_automobile_lite_scroll_to_top_height' );
	remove_theme_mod( 'vw_automobile_lite_scroll_to_top_border_radius' );
	remove_theme_mod( 'vw_automobile_lite_scroll_top_alignment' );
	wp_send_json_success(
		array(
			'success' => true,
			'message' => "Reset Completed",
		)
	);
}

//Active Callback
function vw_automobile_lite_default_slider(){
	if(get_theme_mod('vw_automobile_lite_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function vw_automobile_lite_advance_slider(){
	if(get_theme_mod('vw_automobile_lite_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function vw_automobile_lite_blog_post_featured_image_dimension(){
	if(get_theme_mod('vw_automobile_lite_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false; 
}


/* Implement the Custom Header feature. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';

/* Implement the About theme page */
require get_template_directory().'/inc/getting-started/getting-started.php';

/* Social Custom Widgets */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

/* typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Plugin Activation */
require get_template_directory() . '/inc/getting-started/plugin-activation.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';