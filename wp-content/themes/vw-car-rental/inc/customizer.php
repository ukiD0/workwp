<?php
/**
 * VW Car Rental Theme Customizer
 *
 * @package VW Car Rental
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_car_rental_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_car_rental_custom_controls' );

function vw_car_rental_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_car_rental_customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_car_rental_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$VWCarRentalParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'vw_car_rental_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-car-rental' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWCarRentalParentPanel );

	$HomePageParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'vw_car_rental_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar
	$wp_customize->add_section( 'vw_car_rental_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-car-rental' ),
		'priority'   => null,
		'panel' => 'vw_car_rental_homepage_panel'
	) );

   	// Header Background color
	$wp_customize->add_setting('vw_car_rental_header_background_color', array(
		'default'           => '#2d3b3e',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-car-rental'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_car_rental_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-car-rental'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-car-rental' ),
			'center top'   => esc_html__( 'Top', 'vw-car-rental' ),
			'right top'   => esc_html__( 'Top Right', 'vw-car-rental' ),
			'left center'   => esc_html__( 'Left', 'vw-car-rental' ),
			'center center'   => esc_html__( 'Center', 'vw-car-rental' ),
			'right center'   => esc_html__( 'Right', 'vw-car-rental' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-car-rental' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-car-rental' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-car-rental' ),
		),
	));

	//Sticky Header
	$wp_customize->add_setting( 'vw_car_rental_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-car-rental' ),
        'section' => 'vw_car_rental_topbar'
    )));

    $wp_customize->add_setting('vw_car_rental_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_car_rental_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-car-rental' ),
		'section' => 'vw_car_rental_topbar'
    )));

    $wp_customize->add_setting('vw_car_rental_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_search_icon',array(
		'label'	=> __('Add Search Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_topbar',
		'setting'	=> 'vw_car_rental_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_topbar',
		'setting'	=> 'vw_car_rental_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_car_rental_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_search_font_size',array(
		'label'	=> __('Search Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_phone', array(
		'selector' => '.main-header .phone-no span',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_phone',
	));

    $wp_customize->add_setting('vw_car_rental_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_topbar',
		'setting'	=> 'vw_car_rental_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_car_rental_phone',array(
		'label'	=> __('Add Phone no.','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section( 'vw_car_rental_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_homepage_panel'
	) );

	$wp_customize->add_setting('vw_car_rental_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-car-rental'),
        'section' => 'vw_car_rental_menu_section',
        'choices' => array(
        	'100' => __('100','vw-car-rental'),
            '200' => __('200','vw-car-rental'),
            '300' => __('300','vw-car-rental'),
            '400' => __('400','vw-car-rental'),
            '500' => __('500','vw-car-rental'),
            '600' => __('600','vw-car-rental'),
            '700' => __('700','vw-car-rental'),
            '800' => __('800','vw-car-rental'),
            '900' => __('900','vw-car-rental'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_car_rental_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','vw-car-rental'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-car-rental'),
            'Capitalize' => __('Capitalize','vw-car-rental'),
            'Lowercase' => __('Lowercase','vw-car-rental'),
        ),
		'section'=> 'vw_car_rental_menu_section',
	));

	$wp_customize->add_setting('vw_car_rental_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_car_rental_menu_section',
		'label' => __('Menu Item Hover Style','vw-car-rental'),
		'choices' => array(
            'None' => __('None','vw-car-rental'),
            'Zoom In' => __('Zoom In','vw-car-rental'),
        ),
	) );

	$wp_customize->add_setting('vw_car_rental_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_menu_section',
	)));

	$wp_customize->add_setting('vw_car_rental_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_menu_section',
	)));

	$wp_customize->add_setting('vw_car_rental_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_menu_section',
	)));

	$wp_customize->add_setting('vw_car_rental_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'vw_car_rental_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-car-rental' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/car-rental-wordpress-theme/">GO PRO</a>','vw-car-rental'),
		'priority'   => null,
		'panel' => 'vw_car_rental_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_car_rental_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_slider_hide_show', array(
		'label' => esc_html__( 'Show / Hide Slider','vw-car-rental' ),
		'section' => 'vw_car_rental_slidersettings'
    )));

    $wp_customize->add_setting('vw_car_rental_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	) );
	$wp_customize->add_control('vw_car_rental_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-car-rental'),
        'section' => 'vw_car_rental_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-car-rental'),
            'Advance slider' => __('Advance slider','vw-car-rental'),
        ),
	));

	$wp_customize->add_setting('vw_car_rental_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-car-rental'),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_car_rental_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_car_rental_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_car_rental_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_car_rental_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_car_rental_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-car-rental' ),
			'description' => __('Slider image size (1500 x 590)','vw-car-rental'),
			'section'  => 'vw_car_rental_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_car_rental_default_slider'
		) );
	}

	$wp_customize->add_setting('vw_car_rental_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'LEARN MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_car_rental_default_slider'
	));

	$wp_customize->add_setting('vw_car_rental_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_slidersettings',
		'setting'	=> 'vw_car_rental_slider_button_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_car_rental_default_slider'
	)));

	//content layout
	$wp_customize->add_setting('vw_car_rental_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-car-rental'),
        'section' => 'vw_car_rental_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'vw_car_rental_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_car_rental_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in %. Example:20%','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_car_rental_default_slider'
	));

	$wp_customize->add_setting('vw_car_rental_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in %. Example:20%','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_car_rental_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_car_rental_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_car_rental_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_car_rental_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_height',array(
		'label'	=> __('Slider Height','vw-car-rental'),
		'description'	=> __('Specify the slider height (px).','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_car_rental_default_slider'
	));

	$wp_customize->add_setting( 'vw_car_rental_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_car_rental_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-car-rental'),
		'section' => 'vw_car_rental_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_car_rental_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_car_rental_slider_opacity_color',array(
		'default'              => 0.5,
		'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_car_rental_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-car-rental' ),
		'section'     => 'vw_car_rental_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_car_rental_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-car-rental'),
	      '0.1' =>  esc_attr('0.1','vw-car-rental'),
	      '0.2' =>  esc_attr('0.2','vw-car-rental'),
	      '0.3' =>  esc_attr('0.3','vw-car-rental'),
	      '0.4' =>  esc_attr('0.4','vw-car-rental'),
	      '0.5' =>  esc_attr('0.5','vw-car-rental'),
	      '0.6' =>  esc_attr('0.6','vw-car-rental'),
	      '0.7' =>  esc_attr('0.7','vw-car-rental'),
	      '0.8' =>  esc_attr('0.8','vw-car-rental'),
	      '0.9' =>  esc_attr('0.9','vw-car-rental')
	),'active_callback' => 'vw_car_rental_default_slider'
	));

	$wp_customize->add_setting( 'vw_car_rental_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-car-rental' ),
      	'section' => 'vw_car_rental_slidersettings',
      	'active_callback' => 'vw_car_rental_default_slider'
    )));

    $wp_customize->add_setting('vw_car_rental_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_slidersettings',
		'active_callback' => 'vw_car_rental_default_slider'
	)));

	//Category
	$wp_customize->add_section( 'vw_car_rental_category_section' , array(
    	'title'      => __( 'Category Section', 'vw-car-rental' ),
    	'description' => __('For more options of category section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/car-rental-wordpress-theme/">GO PRO</a>','vw-car-rental'),
		'priority'   => null,
		'panel' => 'vw_car_rental_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_category', array(
		'selector' => '.catgory-box h2',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_category',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_car_rental_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_car_rental_sanitize_choices',
	));
	$wp_customize->add_control('vw_car_rental_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display post','vw-car-rental'),
		'description' => __('Image Size (50 x 45)','vw-car-rental'),
		'section' => 'vw_car_rental_category_section',
	));

	//Category excerpt
	$wp_customize->add_setting( 'vw_car_rental_category_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_category_excerpt_number', array(
		'label'       => esc_html__( 'Category Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_category_section',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_category_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_category_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_category_button_text',array(
		'label'	=> __('Add Category Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_category_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_category_btn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_category_btn_icon',array(
		'label'	=> __('Add Category Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_category_section',
		'setting'	=> 'vw_car_rental_category_btn_icon',
		'type'		=> 'icon'
	)));

	//Best Car Section
	$wp_customize->add_section('vw_car_rental_best_car', array(
		'title'       => __('Best car Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_best_car_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_best_car_text',array(
		'description' => __('<p>1. More options for best car section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for best car section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_best_car',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_best_car_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_best_car_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_best_car',
		'type'=> 'hidden'
	));

	//Find By Brand Section
	$wp_customize->add_section('vw_car_rental_find_by_brand', array(
		'title'       => __('Find By Brand Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_find_by_brand_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_find_by_brand_text',array(
		'description' => __('<p>1. More options for find by brand section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for find by brand section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_find_by_brand',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_find_by_brand_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_find_by_brand_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_find_by_brand',
		'type'=> 'hidden'
	));

	//categories Section
	$wp_customize->add_section('vw_car_rental_categories', array(
		'title'       => __('Categories Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_categories_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_categories_text',array(
		'description' => __('<p>1. More options for categories section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for categories section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_categories',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_categories_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_categories_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_categories',
		'type'=> 'hidden'
	));

	//Popular Cars Section
	$wp_customize->add_section('vw_car_rental_popular_cars', array(
		'title'       => __('Popular Cars Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_popular_cars_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_popular_cars_text',array(
		'description' => __('<p>1. More options for popular cars section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for popular cars section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_popular_cars',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_popular_cars_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_popular_cars_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_popular_cars',
		'type'=> 'hidden'
	));

	//First Class Section
	$wp_customize->add_section('vw_car_rental_first_class', array(
		'title'       => __('First Class Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_first_class_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_first_class_text',array(
		'description' => __('<p>1. More options for first class section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for first class section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_first_class',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_first_class_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_first_class_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_first_class',
		'type'=> 'hidden'
	));

	//How It Works Section
	$wp_customize->add_section('vw_car_rental_how_it_works', array(
		'title'       => __('How It Works Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_how_it_works_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_how_it_works_text',array(
		'description' => __('<p>1. More options for how it works section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for how it works section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_how_it_works',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_how_it_works_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_how_it_works_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_how_it_works',
		'type'=> 'hidden'
	));

	//Records Section
	$wp_customize->add_section('vw_car_rental_records', array(
		'title'       => __('Records Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_records',
		'type'=> 'hidden'
	));

	//Services
	$wp_customize->add_section( 'vw_car_rental_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-car-rental' ),
    	'description' => __('For more options of services section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/car-rental-wordpress-theme/">GO PRO</a>','vw-car-rental'),
		'priority'   => null,
		'panel' => 'vw_car_rental_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_section_title', array(
		'selector' => '#service-sec h3',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_section_title',
	));

	$wp_customize->add_setting('vw_car_rental_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_section_title',array(
		'label'	=> __('Section Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Services', 'vw-car-rental' ),
        ),
		'section' => 'vw_car_rental_service_section',
		'setting' => 'vw_car_rental_section_title',
		'type' => 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_car_rental_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_car_rental_sanitize_choices',
	));
	$wp_customize->add_control('vw_car_rental_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-car-rental'),
		'description' => __('Image Size (50 x 45)','vw-car-rental'),
		'section' => 'vw_car_rental_service_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_car_rental_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_services_excerpt_number', array(
		'label'       => esc_html__( 'Service Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_service_section',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_services_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_services_button_text',array(
		'label'	=> __('Add Services Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'LEARN MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_service_section',
		'type'=> 'text'
	));

	//have question Section
	$wp_customize->add_section('vw_car_rental_have_question', array(
		'title'       => __('Have Question Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_have_question_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_have_question_text',array(
		'description' => __('<p>1. More options for have question section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for have question section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_have_question',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_have_question_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_have_question_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_have_question',
		'type'=> 'hidden'
	));

	//testimonial Section
	$wp_customize->add_section('vw_car_rental_testimonial', array(
		'title'       => __('Testimonial Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_testimonial',
		'type'=> 'hidden'
	));

	//newsletter Section
	$wp_customize->add_section('vw_car_rental_newsletter', array(
		'title'       => __('Newsletter Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_newsletter',
		'type'=> 'hidden'
	));

	//latest article Section
	$wp_customize->add_section('vw_car_rental_latest_article', array(
		'title'       => __('Latest Article Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_latest_article_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_latest_article_text',array(
		'description' => __('<p>1. More options for latest article section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest article section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_latest_article',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_latest_article_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_latest_article_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_latest_article',
		'type'=> 'hidden'
	));

	//contact us Section
	$wp_customize->add_section('vw_car_rental_contact_us', array(
		'title'       => __('Contact Us Section', 'vw-car-rental'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-car-rental'),
		'priority'    => null,
		'panel'       => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting('vw_car_rental_contact_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_contact_us_text',array(
		'description' => __('<p>1. More options for contact us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contact us section.</p>','vw-car-rental'),
		'section'=> 'vw_car_rental_contact_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_car_rental_contact_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_contact_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_car_rental_guide') ." '>More Info</a>",
		'section'=> 'vw_car_rental_contact_us',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_car_rental_footer',array(
		'title'	=> __('Footer','vw-car-rental'),
		'description' => __('For more options of footer section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/car-rental-wordpress-theme/">GO PRO</a>','vw-car-rental'),
		'panel' => 'vw_car_rental_homepage_panel',
	));

	$wp_customize->add_setting( 'vw_car_rental_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_car_rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','vw-car-rental' ),
      'section' => 'vw_car_rental_footer'
    )));

	$wp_customize->add_setting('vw_car_rental_footer_background_color', array(
		'default'           => '#2d3b3e',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_footer',
	)));

	$wp_customize->add_setting('vw_car_rental_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_car_rental_footer_background_image',array(
        'label' => __('Footer Background Image','vw-car-rental'),
        'section' => 'vw_car_rental_footer'
	)));

	$wp_customize->add_setting('vw_car_rental_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-car-rental'),
		'section' => 'vw_car_rental_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-car-rental' ),
			'center top'   => esc_html__( 'Top', 'vw-car-rental' ),
			'right top'   => esc_html__( 'Top Right', 'vw-car-rental' ),
			'left center'   => esc_html__( 'Left', 'vw-car-rental' ),
			'center center'   => esc_html__( 'Center', 'vw-car-rental' ),
			'right center'   => esc_html__( 'Right', 'vw-car-rental' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-car-rental' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-car-rental' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-car-rental' ),
		),
	));

	// Footer
	$wp_customize->add_setting('vw_car_rental_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-car-rental'),
		'choices' => array(
            'fixed' => __('fixed','vw-car-rental'),
            'scroll' => __('scroll','vw-car-rental'),
        ),
		'section'=> 'vw_car_rental_footer',
	));

	$wp_customize->add_setting('vw_car_rental_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'choices' => array(
        	'Left' => __('Left','vw-car-rental'),
            'Center' => __('Center','vw-car-rental'),
            'Right' => __('Right','vw-car-rental')
        ),
	) );

	$wp_customize->add_setting('vw_car_rental_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'choices' => array(
        	'Left' => __('Left','vw-car-rental'),
            'Center' => __('Center','vw-car-rental'),
            'Right' => __('Right','vw-car-rental')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_car_rental_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-car-rental' ),
    ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

     // footer social icon
  	$wp_customize->add_setting( 'vw_car_rental_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-car-rental' ),
		'section' => 'vw_car_rental_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_footer_text',
	));

	$wp_customize->add_setting( 'vw_car_rental_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_car_rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-car-rental' ),
      'section' => 'vw_car_rental_footer'
    )));

	$wp_customize->add_setting( 'vw_car_rental_copyright_first_color', array(
	    'default' => '#15d0ac',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_car_rental_copyright_first_color', array(
  		'label' => __('Copyright First Color Option', 'vw-car-rental'),
	    'section' => 'vw_car_rental_footer',
	    'settings' => 'vw_car_rental_copyright_first_color',
  	)));

  	$wp_customize->add_setting( 'vw_car_rental_copyright_second_color', array(
	    'default' => '#bfe428',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_car_rental_copyright_second_color', array(
  		'label' => __('Copyright Second Color Option', 'vw-car-rental'),
	    'section' => 'vw_car_rental_footer',
	    'settings' => 'vw_car_rental_copyright_second_color',
  	)));

	$wp_customize->add_setting('vw_car_rental_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_footer_text',array(
		'label'	=> __('Copyright Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'setting'=> 'vw_car_rental_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'settings' => 'vw_car_rental_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_car_rental_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-car-rental' ),
      	'section' => 'vw_car_rental_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_car_rental_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_footer',
		'setting'	=> 'vw_car_rental_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-car-rental'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'settings' => 'vw_car_rental_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Blog Post
	$wp_customize->add_panel( $VWCarRentalParentPanel );

	$BlogPostParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_car_rental_post_settings', array(
		'title' => __( 'Post Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_car_rental_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_car_rental_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	) );
	$wp_customize->add_control('vw_car_rental_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-car-rental'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
            'One Column' => __('One Column','vw-car-rental'),
            'Three Columns' => __('Three Columns','vw-car-rental'),
            'Four Columns' => __('Four Columns','vw-car-rental'),
            'Grid Layout' => __('Grid Layout','vw-car-rental')
        ),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_toggle_postdate',
	));

	$wp_customize->add_setting( 'vw_car_rental_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-car-rental' ),
        'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_post_settings',
		'setting'	=> 'vw_car_rental_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_post_settings',
		'setting'	=> 'vw_car_rental_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_post_settings',
		'setting'	=> 'vw_car_rental_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_post_settings',
		'setting'	=> 'vw_car_rental_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting( 'vw_car_rental_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_car_rental_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-car-rental' ),
		'section'     => 'vw_car_rental_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_car_rental_blog_post_featured_image_dimension',array(
	       'default' => 'default',
	       'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
  	$wp_customize->add_control('vw_car_rental_blog_post_featured_image_dimension',array(
	     'type' => 'select',
	     'label'	=> __('Blog Post Featured Image Dimension','vw-car-rental'),
	     'section'	=> 'vw_car_rental_post_settings',
	     'choices' => array(
          'default' => __('Default','vw-car-rental'),
          'custom' => __('Custom Image Size','vw-car-rental'),
      ),
  	));

	$wp_customize->add_setting('vw_car_rental_blog_post_featured_image_custom_width',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_car_rental_blog_post_featured_image_custom_width',array(
			'label'	=> __('Featured Image Custom Width','vw-car-rental'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
			'input_attrs' => array(
	    	'placeholder' => __( '10px', 'vw-car-rental' ),),
			'section'=> 'vw_car_rental_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_car_rental_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_car_rental_blog_post_featured_image_custom_height',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_blog_post_featured_image_custom_height',array(
			'label'	=> __('Featured Image Custom Height','vw-car-rental'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
			'input_attrs' => array(
	    	'placeholder' => __( '10px', 'vw-car-rental' ),),
			'section'=> 'vw_car_rental_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_car_rental_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_car_rental_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-car-rental'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-car-rental'),
		'section'=> 'vw_car_rental_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_car_rental_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-car-rental'),
            'Without Blocks' => __('Without Blocks','vw-car-rental')
        ),
	) );

    $wp_customize->add_setting('vw_car_rental_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-car-rental'),
            'Excerpt' => __('Excerpt','vw-car-rental'),
            'No Content' => __('No Content','vw-car-rental')
        ),
	) );

	$wp_customize->add_setting('vw_car_rental_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-car-rental' ),
      'section' => 'vw_car_rental_post_settings'
    )));

	$wp_customize->add_setting( 'vw_car_rental_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_car_rental_blog_pagination_type', array(
        'section' => 'vw_car_rental_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-car-rental' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-car-rental' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-car-rental' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_car_rental_button_settings', array(
		'title' => __( 'Button Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_button_text', array(
		'selector' => '.post-main-box .content-bttn a',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_button_text',
	));

    $wp_customize->add_setting('vw_car_rental_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_text',array(
		'label'	=> __('Add Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_blog_button_icon',array(
		'label'	=> __('Add Blog Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_button_settings',
		'setting'	=> 'vw_car_rental_blog_button_icon',
		'type'		=> 'icon'
	)));

	// font size button
	$wp_customize->add_setting('vw_car_rental_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_font_size',array(
		'label'	=> __('Button Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-car-rental' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_car_rental_button_settings',
	));

	$wp_customize->add_setting( 'vw_car_rental_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-car-rental' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_car_rental_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_car_rental_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-car-rental'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-car-rental'),
            'Capitalize' => __('Capitalize','vw-car-rental'),
            'Lowercase' => __('Lowercase','vw-car-rental'),
        ),
		'section'=> 'vw_car_rental_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_car_rental_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_related_post_title',
	));

    $wp_customize->add_setting( 'vw_car_rental_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-car-rental' ),
		'section' => 'vw_car_rental_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_car_rental_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	));
	$wp_customize->add_control('vw_car_rental_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_car_rental_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_car_rental_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_car_rental_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_single_blog_settings',
		'setting'	=> 'vw_car_rental_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-car-rental' ),
	   'section' => 'vw_car_rental_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_car_rental_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_single_blog_settings',
		'setting'	=> 'vw_car_rental_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-car-rental' ),
	    'section' => 'vw_car_rental_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_car_rental_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_single_blog_settings',
		'setting'	=> 'vw_car_rental_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_car_rental_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-car-rental' ),
	    'section' => 'vw_car_rental_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_car_rental_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_single_blog_settings',
		'setting'	=> 'vw_car_rental_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_car_rental_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	) );

	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-car-rental' ),
	    'section' => 'vw_car_rental_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_car_rental_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-car-rental' ),
		'section' => 'vw_car_rental_single_blog_settings'
    )));

   	$wp_customize->add_setting( 'vw_car_rental_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-car-rental' ),
		'section' => 'vw_car_rental_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_car_rental_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-car-rental' ),
		'section' => 'vw_car_rental_single_blog_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-car-rental'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-car-rental'),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','vw-car-rental' ),
		'section' => 'vw_car_rental_single_blog_settings'
    )));

    // Grid layout setting
	$wp_customize->add_section( 'vw_car_rental_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_car_rental_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_grid_layout_settings',
		'setting'	=> 'vw_car_rental_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_car_rental_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-car-rental' ),
        'section' => 'vw_car_rental_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_car_rental_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_grid_layout_settings',
		'setting'	=> 'vw_car_rental_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-car-rental' ),
		'section' => 'vw_car_rental_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_car_rental_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_grid_layout_settings',
		'setting'	=> 'vw_car_rental_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_car_rental_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-car-rental' ),
		'section' => 'vw_car_rental_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_car_rental_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-car-rental'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-car-rental'),
		'section'=> 'vw_car_rental_grid_layout_settings',
		'type'=> 'text'
	));  

  	$wp_customize->add_setting('vw_car_rental_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','vw-car-rental'),
	    'section' => 'vw_car_rental_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','vw-car-rental'),
	      	'Without Blocks' => __('Without Blocks','vw-car-rental')
	      ),
	) );

	$wp_customize->add_setting('vw_car_rental_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-car-rental'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-car-rental'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'vw-car-rental' ),
      ),
		'section'=> 'vw_car_rental_grid_layout_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_car_rental_grid_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_grid_button_icon',array(
		'label'	=> __('Add Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_grid_layout_settings',
		'setting'	=> 'vw_car_rental_grid_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_grid_layout_settings',
		'type'=> 'text'
	));

   	// other settings
	$OtherParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'vw_car_rental_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_panel_id',
	));
	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_car_rental_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_other_panel_id'
	) );

	$wp_customize->add_setting('vw_car_rental_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-car-rental'),
        'description' => __('Here you can change the width layout of Website.','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_car_rental_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-car-rental'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
            'One Column' => __('One Column','vw-car-rental')
        ),
	) );

	$wp_customize->add_setting( 'vw_car_rental_single_page_breadcrumb',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-car-rental' ),
		'section' => 'vw_car_rental_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vw_car_rental_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_animation',array(
        'label' => esc_html__( 'Show / Hide Animation ','vw-car-rental' ),
        'description' => __('Here you can disable overall site animation effect','vw-car-rental'),
        'section' => 'vw_car_rental_left_right'
    )));

    $wp_customize->add_setting('vw_car_rental_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Car_Rental_Reset_Custom_Control($wp_customize, 'vw_car_rental_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-car-rental'),
      'description' => 'vw_car_rental_reset_all_settings',
      'section' => 'vw_car_rental_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_car_rental_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-car-rental' ),
        'section' => 'vw_car_rental_left_right'
    )));

	$wp_customize->add_setting('vw_car_rental_preloader_bg_color', array(
		'default'           => '#bfe428',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_left_right',
	)));

	$wp_customize->add_setting('vw_car_rental_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_left_right',
	)));

	$wp_customize->add_setting('vw_car_rental_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_car_rental_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-car-rental'),
        'section' => 'vw_car_rental_left_right'
	)));

	//navigation text
	$wp_customize->add_setting('vw_car_rental_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-car-rental'),
		'description'	=> __('Enter a value in %. Example:50%','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_car_rental_404_page',array(
		'title'	=> __('404 Page Settings','vw-car-rental'),
		'panel' => 'vw_car_rental_other_panel_id',
	));

	$wp_customize->add_setting('vw_car_rental_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_404_page_title',array(
		'label'	=> __('Add Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_404_page_content',array(
		'label'	=> __('Add Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_404_page',
		'setting'	=> 'vw_car_rental_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_car_rental_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-car-rental'),
		'panel' => 'vw_car_rental_other_panel_id',
	));

	$wp_customize->add_setting('vw_car_rental_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_no_results_page_title',array(
		'label'	=> __('Add Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_no_results_page_content',array(
		'label'	=> __('Add Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_no_results_page',
		'type'=> 'text'
	));
 
	//Social Icon Setting
	$wp_customize->add_section('vw_car_rental_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-car-rental'),
		'panel' => 'vw_car_rental_other_panel_id',
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_width',array(
		'label'	=> __('Icon Width','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_height',array(
		'label'	=> __('Icon Height','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_car_rental_responsive_media',array(
		'title'	=> __('Responsive Media','vw-car-rental'),
		'panel' => 'vw_car_rental_other_panel_id',
	));

    $wp_customize->add_setting( 'vw_car_rental_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_car_rental_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_car_rental_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_car_rental_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting('vw_car_rental_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_responsive_media',
		'setting'	=> 'vw_car_rental_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_responsive_media',
		'setting'	=> 'vw_car_rental_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_car_rental_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-car-rental'),
		'section'  => 'vw_car_rental_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('vw_car_rental_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-car-rental'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'vw_car_rental_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_car_rental_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_car_rental_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-car-rental' ),
		'section' => 'vw_car_rental_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_car_rental_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-car-rental'),
        'section' => 'vw_car_rental_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_car_rental_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-car-rental' ),
		'section' => 'vw_car_rental_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_car_rental_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-car-rental'),
        'section' => 'vw_car_rental_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_car_rental_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	));
	$wp_customize->add_control('vw_car_rental_products_per_page',array(
		'label'	=> __('Products Per Page','vw-car-rental'),
		'description' => __('Display on shop page','vw-car-rental'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_car_rental_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_products_per_row',array(
		'label'	=> __('Products Per Row','vw-car-rental'),
		'description' => __('Display on shop page','vw-car-rental'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_car_rental_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_car_rental_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_car_rental_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_products_button_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_car_rental_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-car-rental'),
        'section' => 'vw_car_rental_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-car-rental'),
            'right' => __('Right','vw-car-rental'),
        ),
	) );

	$wp_customize->add_setting('vw_car_rental_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Related Product
    $wp_customize->add_setting( 'vw_car_rental_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-car-rental' ),
        'section' => 'vw_car_rental_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Car_Rental_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Car_Rental_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_car_rental_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Car_Rental_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_car_rental_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Car_Rental_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_car_rental_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_car_rental_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_car_rental_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Car_Rental_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Car_Rental_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Car_Rental_Customize_Section_Pro($manager,'vw_car_rental_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW CAR RENTAL', 'vw-car-rental' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-car-rental' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/car-rental-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Car_Rental_Customize_Section_Pro($manager,'vw_car_rental_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-car-rental' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-car-rental' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-car-rental/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-car-rental-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-car-rental-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'vw-car-rental-customize-controls',
		'vw_car_rental_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Car_Rental_Customize::get_instance();
