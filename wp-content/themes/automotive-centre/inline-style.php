<?php

	$automotive_centre_first_color = get_theme_mod('automotive_centre_first_color');

	/*------------------- Global First Color -----------*/

	$automotive_centre_custom_css = " ";

	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,#sidebar h3,#comments input[type="submit"],#footer-2,input[type="submit"],#sidebar .custom-social-icons i, #footer .custom-social-icons i,.search-box i,.top-btn a:hover,.slider-btn a:before,.more-btn a,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#footer .tagcloud a:hover,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .scrollup i , .toggle-nav i, #comments a.comment-reply-link, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label, #sidebar .wp-block-search .wp-block-search__button, .bradcrumbs a:hover, .bradcrumbs span,.post-categories li a,m.bradcrumbs a:hover, .bradcrumbs span,.post-categories li a{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#sidebar ul li a:hover,.info-box i,a,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-main-box:hover h2,#footer h3,.serv-box a,#footer li a:hover,a.scrollup, #footer .custom-social-icons i:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer a.custom_read_more:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .info-box p a:hover, .logo .site-title a:hover, #slider .inner_carousel h1 a:hover, .entry-summary a, #footer .wp-block-search .wp-block-search__label{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='.top-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$automotive_centre_custom_css .='border-color: '.esc_attr($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#about-section hr, .main-navigation ul ul{';
			$automotive_centre_custom_css .='border-top-color: '.esc_attr($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#header .main-navigation ul li a:hover,#footer h3:after, .header-fixed, .main-navigation ul ul, #footer .wp-block-search .wp-block-search__label:after{';
			$automotive_centre_custom_css .='border-bottom-color: '.esc_attr($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}

	/*---------------- Width Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_width_option','Full Width');
    if($automotive_centre_theme_lay == 'Boxed'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.page-template-custom-home-page .home-page-header{';
			$automotive_centre_custom_css .='width: 97%;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='right: 100px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.scrollup.left i{';
			$automotive_centre_custom_css .='left: 100px;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Wide Width'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='right: 30px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.scrollup.left i{';
			$automotive_centre_custom_css .='left: 30px;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Full Width'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='max-width: 100%;';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_slider_opacity_color','0.4');
	if($automotive_centre_theme_lay == '0'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.1'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.1';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.2'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.2';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.3'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.3';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.4'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.4';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.5'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.5';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.6'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.6';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.7'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.7';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.8'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.8';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.9'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.9';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------- Slider Image Overlay ------------------------*/

	$automotive_centre_slider_image_overlay = get_theme_mod('automotive_centre_slider_image_overlay', true);
	if($automotive_centre_slider_image_overlay == false){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:1;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_slider_image_overlay_color = get_theme_mod('automotive_centre_slider_image_overlay_color', true);
	if($automotive_centre_slider_image_overlay_color != false){
		$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_slider_image_overlay_color).';';
		$automotive_centre_custom_css .='}';
	}

	/*-----------------Slider Content Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_slider_content_option','Left');
    if($automotive_centre_theme_lay == 'Left'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:left; left:7%; right:50%;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Center'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:center; left:20%; right:20%;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Right'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:right; left:50%; right:7%;';
		$automotive_centre_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$automotive_centre_slider_content_padding_top_bottom = get_theme_mod('automotive_centre_slider_content_padding_top_bottom');
	$automotive_centre_slider_content_padding_left_right = get_theme_mod('automotive_centre_slider_content_padding_left_right');
	if($automotive_centre_slider_content_padding_top_bottom != false || $automotive_centre_slider_content_padding_left_right != false){
		$automotive_centre_custom_css .='#slider .carousel-caption{';
			$automotive_centre_custom_css .='top: '.esc_attr($automotive_centre_slider_content_padding_top_bottom).'; bottom: '.esc_attr($automotive_centre_slider_content_padding_top_bottom).';left: '.esc_attr($automotive_centre_slider_content_padding_left_right).';right: '.esc_attr($automotive_centre_slider_content_padding_left_right).';';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$automotive_centre_slider_height = get_theme_mod('automotive_centre_slider_height');
	if($automotive_centre_slider_height != false){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='height: '.esc_attr($automotive_centre_slider_height).';';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$automotive_centre_slider = get_theme_mod('automotive_centre_slider_hide_show');
	if($automotive_centre_slider == false){
		$automotive_centre_custom_css .='.page-template-custom-home-page .home-page-header{';
			$automotive_centre_custom_css .='position: static; background: #010203;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.page-template-custom-home-page #about-section{';
			$automotive_centre_custom_css .='padding: 1% 0;';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_blog_layout_option','Default');
    if($automotive_centre_theme_lay == 'Default'){
		$automotive_centre_custom_css .='.post-main-box{';
			$automotive_centre_custom_css .='';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Center'){
		$automotive_centre_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn{';
			$automotive_centre_custom_css .='text-align:center;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info{';
			$automotive_centre_custom_css .='margin-top:10px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info hr{';
			$automotive_centre_custom_css .='margin:10px auto;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Left'){
		$automotive_centre_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn, #our-services p{';
			$automotive_centre_custom_css .='text-align:Left;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info hr{';
			$automotive_centre_custom_css .='margin-bottom:10px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-main-box h2{';
			$automotive_centre_custom_css .='margin-top:10px;';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$automotive_centre_blog_page_posts_settings = get_theme_mod( 'automotive_centre_blog_page_posts_settings','Into Blocks');
		if($automotive_centre_blog_page_posts_settings == 'Without Blocks'){
		$automotive_centre_custom_css .='.post-main-box{';
			$automotive_centre_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$automotive_centre_custom_css .='}';
	}

	// featured image dimention
	$automotive_centre_blog_post_featured_image_dimension = get_theme_mod('automotive_centre_blog_post_featured_image_dimension', 'default');
	$automotive_centre_blog_post_featured_image_custom_width = get_theme_mod('automotive_centre_blog_post_featured_image_custom_width',250);
	$automotive_centre_blog_post_featured_image_custom_height = get_theme_mod('automotive_centre_blog_post_featured_image_custom_height',250);
	if($automotive_centre_blog_post_featured_image_dimension == 'custom'){
		$automotive_centre_custom_css .='.box-image img{';
			$automotive_centre_custom_css .='width: '.esc_attr($automotive_centre_blog_post_featured_image_custom_width).'; height: '.esc_attr($automotive_centre_blog_post_featured_image_custom_height).';';
		$automotive_centre_custom_css .='}';
	}
		$automotive_centre_featured_img_border_radius = get_theme_mod('automotive_centre_featured_image_border_radius');
	if($automotive_centre_featured_img_border_radius != false){
		$automotive_centre_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_featured_img_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*-----------------Responsive Media -----------------------*/

	$automotive_centre_resp_stickyheader = get_theme_mod( 'automotive_centre_stickyheader_hide_show',false);
	if($automotive_centre_resp_stickyheader == true && get_theme_mod( 'automotive_centre_sticky_header',false) != true){
    	$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='position:static;';
		$automotive_centre_custom_css .='} ';
	}
    if($automotive_centre_resp_stickyheader == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='position:fixed;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_stickyheader == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px){';
		$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='position:static;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_slider = get_theme_mod( 'automotive_centre_resp_slider_hide_show',false);
	if($automotive_centre_resp_slider == true && get_theme_mod( 'automotive_centre_slider_hide_show', false) == false){
    	$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} ';
	}
    if($automotive_centre_resp_slider == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_slider == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_sidebar = get_theme_mod( 'automotive_centre_sidebar_hide_show',true);
    if($automotive_centre_resp_sidebar == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#sidebar{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_sidebar == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#sidebar{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_scroll_top = get_theme_mod( 'automotive_centre_resp_scroll_top_hide_show',true);
	if($automotive_centre_resp_scroll_top == true && get_theme_mod( 'automotive_centre_hide_show_scroll',true) != true){
    	$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='visibility:hidden !important;';
		$automotive_centre_custom_css .='} ';
	}
    if($automotive_centre_resp_scroll_top == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='visibility:visible !important;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_scroll_top == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px){';
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='visibility:hidden !important;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_menu_toggle_btn_bg_color = get_theme_mod('automotive_centre_resp_menu_toggle_btn_bg_color');
	if($automotive_centre_resp_menu_toggle_btn_bg_color != false){
		$automotive_centre_custom_css .='.toggle-nav i{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_resp_menu_toggle_btn_bg_color).';';
		$automotive_centre_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$automotive_centre_sticky_header_padding = get_theme_mod('automotive_centre_sticky_header_padding');
	if($automotive_centre_sticky_header_padding != false){
		$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='padding: '.esc_attr($automotive_centre_sticky_header_padding).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_navigation_menu_font_size = get_theme_mod('automotive_centre_navigation_menu_font_size');
	if($automotive_centre_navigation_menu_font_size != false){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_navigation_menu_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_navigation_menu_font_weight = get_theme_mod('automotive_centre_navigation_menu_font_weight','900');
	if($automotive_centre_navigation_menu_font_weight != false){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='font-weight: '.esc_attr($automotive_centre_navigation_menu_font_weight).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_menu_text_transform','Uppercase');
	if($automotive_centre_theme_lay == 'Capitalize'){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='text-transform:Capitalize;';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_theme_lay == 'Lowercase'){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='text-transform:Lowercase;';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_theme_lay == 'Uppercase'){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='text-transform:Uppercase;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_header_menus_color = get_theme_mod('automotive_centre_header_menus_color');
	if($automotive_centre_header_menus_color != false){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_header_menus_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_header_menus_hover_color = get_theme_mod('automotive_centre_header_menus_hover_color');
	if($automotive_centre_header_menus_hover_color != false){
		$automotive_centre_custom_css .='.main-navigation a:hover{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_header_menus_hover_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_header_submenus_color = get_theme_mod('automotive_centre_header_submenus_color');
	if($automotive_centre_header_submenus_color != false){
		$automotive_centre_custom_css .='.main-navigation ul ul a{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_header_submenus_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_header_submenus_hover_color = get_theme_mod('automotive_centre_header_submenus_hover_color');
	if($automotive_centre_header_submenus_hover_color != false){
		$automotive_centre_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_header_submenus_hover_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_menus_item = get_theme_mod( 'automotive_centre_menus_item_style','None');
    if($automotive_centre_menus_item == 'None'){
		$automotive_centre_custom_css .='.main-navigation a{';
			$automotive_centre_custom_css .='';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_menus_item == 'Zoom In'){
		$automotive_centre_custom_css .='.main-navigation a:hover{';
			$automotive_centre_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #88d055;';
		$automotive_centre_custom_css .='}';
	}
	/*------------------ Search Settings -----------------*/
	
	$automotive_centre_search_padding_top_bottom = get_theme_mod('automotive_centre_search_padding_top_bottom');
	$automotive_centre_search_padding_left_right = get_theme_mod('automotive_centre_search_padding_left_right');
	$automotive_centre_search_font_size = get_theme_mod('automotive_centre_search_font_size');
	$automotive_centre_search_border_radius = get_theme_mod('automotive_centre_search_border_radius');
	if($automotive_centre_search_padding_top_bottom != false || $automotive_centre_search_padding_left_right != false || $automotive_centre_search_font_size != false || $automotive_centre_search_border_radius != false){
		$automotive_centre_custom_css .='.search-box i{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_search_padding_top_bottom).'; padding-bottom: '.esc_attr($automotive_centre_search_padding_top_bottom).';padding-left: '.esc_attr($automotive_centre_search_padding_left_right).';padding-right: '.esc_attr($automotive_centre_search_padding_left_right).';font-size: '.esc_attr($automotive_centre_search_font_size).';border-radius: '.esc_attr($automotive_centre_search_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$automotive_centre_button_padding_top_bottom = get_theme_mod('automotive_centre_button_padding_top_bottom');
	$automotive_centre_button_padding_left_right = get_theme_mod('automotive_centre_button_padding_left_right');
	if($automotive_centre_button_padding_top_bottom != false || $automotive_centre_button_padding_left_right != false){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_button_padding_top_bottom).'; padding-bottom: '.esc_attr($automotive_centre_button_padding_top_bottom).';padding-left: '.esc_attr($automotive_centre_button_padding_left_right).';padding-right: '.esc_attr($automotive_centre_button_padding_left_right).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_button_border_radius = get_theme_mod('automotive_centre_button_border_radius');
	if($automotive_centre_button_border_radius != false){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_button_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_button_font_size = get_theme_mod('automotive_centre_button_font_size',14);
	$automotive_centre_custom_css .='.post-main-box .more-btn a{';
		$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_button_font_size).';';
	$automotive_centre_custom_css .='}';

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_button_text_transform','Uppercase');
	if($automotive_centre_theme_lay == 'Capitalize'){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='text-transform:Capitalize;';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_theme_lay == 'Lowercase'){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='text-transform:Lowercase;';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_theme_lay == 'Uppercase'){ 
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='text-transform:Uppercase;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_button_letter_spacing = get_theme_mod('automotive_centre_button_letter_spacing',14);
	$automotive_centre_custom_css .='.post-main-box .more-btn a{';
		$automotive_centre_custom_css .='letter-spacing: '.esc_attr($automotive_centre_button_letter_spacing).';';
	$automotive_centre_custom_css .='}';
	
	/*------------- Single Blog Page------------------*/

	$automotive_centre_featured_image_border_radius_setting = get_theme_mod('automotive_centre_featured_image_border_radius_setting', 0);
	if($automotive_centre_featured_image_border_radius_setting != false){
		$automotive_centre_custom_css .='.box-image img, .feature-box img{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_featured_image_border_radius_setting).'px;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_featured_image_box_shadow = get_theme_mod('automotive_centre_featured_image_box_shadow',0);
	if($automotive_centre_featured_image_box_shadow != false){
		$automotive_centre_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$automotive_centre_custom_css .='box-shadow: '.esc_attr($automotive_centre_featured_image_box_shadow).'px '.esc_attr($automotive_centre_featured_image_box_shadow).'px '.esc_attr($automotive_centre_featured_image_box_shadow).'px #cccccc;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_single_blog_post_navigation_show_hide = get_theme_mod('automotive_centre_single_blog_post_navigation_show_hide',true);
	if($automotive_centre_single_blog_post_navigation_show_hide != true){
		$automotive_centre_custom_css .='.post-navigation{';
			$automotive_centre_custom_css .='display: none;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_single_blog_comment_title = get_theme_mod('automotive_centre_single_blog_comment_title', 'Leave a Reply');
	if($automotive_centre_single_blog_comment_title == ''){
		$automotive_centre_custom_css .='#comments h2#reply-title {';
			$automotive_centre_custom_css .='display: none;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_single_blog_comment_button_text = get_theme_mod('automotive_centre_single_blog_comment_button_text', 'Post Comment');
	if($automotive_centre_single_blog_comment_button_text == ''){
		$automotive_centre_custom_css .='#comments p.form-submit {';
			$automotive_centre_custom_css .='display: none;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_comment_width = get_theme_mod('automotive_centre_single_blog_comment_width');
	if($automotive_centre_comment_width != false){
		$automotive_centre_custom_css .='#comments textarea{';
			$automotive_centre_custom_css .='width: '.esc_attr($automotive_centre_comment_width).';';
		$automotive_centre_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$automotive_centre_copyright_background_color = get_theme_mod('automotive_centre_copyright_background_color');
	if($automotive_centre_copyright_background_color != false){
		$automotive_centre_custom_css .='#footer-2{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_copyright_background_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_background_color = get_theme_mod('automotive_centre_footer_background_color');
	if($automotive_centre_footer_background_color != false){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_footer_background_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_widgets_heading = get_theme_mod( 'automotive_centre_footer_widgets_heading','Left');
    if($automotive_centre_footer_widgets_heading == 'Left'){
		$automotive_centre_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$automotive_centre_custom_css .='text-align: left;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_footer_widgets_heading == 'Center'){
		$automotive_centre_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$automotive_centre_custom_css .='text-align: center; position:relative;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$automotive_centre_custom_css .='margin: 0 auto;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_footer_widgets_heading == 'Right'){
		$automotive_centre_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$automotive_centre_custom_css .='text-align: right;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$automotive_centre_custom_css .='margin-left: auto; ';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_widgets_content = get_theme_mod( 'automotive_centre_footer_widgets_content','Left');
    if($automotive_centre_footer_widgets_content == 'Left'){
		$automotive_centre_custom_css .='#footer .widget{';
		$automotive_centre_custom_css .='text-align: left;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_footer_widgets_content == 'Center'){
		$automotive_centre_custom_css .='#footer .widget{';
			$automotive_centre_custom_css .='text-align: center;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_footer_widgets_content == 'Right'){
		$automotive_centre_custom_css .='#footer .widget{';
			$automotive_centre_custom_css .='text-align: right;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_copyright_font_size = get_theme_mod('automotive_centre_copyright_font_size');
	if($automotive_centre_copyright_font_size != false){
		$automotive_centre_custom_css .='.copyright p{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_copyright_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_copyright_padding_top_bottom = get_theme_mod('automotive_centre_copyright_padding_top_bottom');
	if($automotive_centre_copyright_padding_top_bottom != false){
		$automotive_centre_custom_css .='#footer-2{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($automotive_centre_copyright_padding_top_bottom).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_copyright_alignment = get_theme_mod('automotive_centre_copyright_alignment');
	if($automotive_centre_copyright_alignment != false){
		$automotive_centre_custom_css .='.copyright p{';
			$automotive_centre_custom_css .='text-align: '.esc_attr($automotive_centre_copyright_alignment).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_padding = get_theme_mod('automotive_centre_footer_padding');
	if($automotive_centre_footer_padding != false){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='padding: '.esc_attr($automotive_centre_footer_padding).' 0;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_icon = get_theme_mod('automotive_centre_footer_icon');
	if($automotive_centre_footer_icon == false){
		$automotive_centre_custom_css .='.copyright p{';
			$automotive_centre_custom_css .='width:100%; text-align:center; float:none;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_background_image = get_theme_mod('automotive_centre_footer_background_image');
	if($automotive_centre_footer_background_image != false){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='background: url('.esc_attr($automotive_centre_footer_background_image).');';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_img_footer','scroll');
	if($automotive_centre_theme_lay == 'fixed'){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='background-attachment: fixed !important;';
		$automotive_centre_custom_css .='}';
	}elseif ($automotive_centre_theme_lay == 'scroll'){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='background-attachment: scroll !important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_footer_img_position = get_theme_mod('automotive_centre_footer_img_position','center center');
	if($automotive_centre_footer_img_position != false){
		$automotive_centre_custom_css .='#footer{';
			$automotive_centre_custom_css .='background-position: '.esc_attr($automotive_centre_footer_img_position).'!important;';
		$automotive_centre_custom_css .='}';
	} 

	/*----------------Sroll to top Settings ------------------*/

	$automotive_centre_scroll_to_top_font_size = get_theme_mod('automotive_centre_scroll_to_top_font_size');
	if($automotive_centre_scroll_to_top_font_size != false){
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_scroll_to_top_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_scroll_to_top_padding = get_theme_mod('automotive_centre_scroll_to_top_padding');
	$automotive_centre_scroll_to_top_padding = get_theme_mod('automotive_centre_scroll_to_top_padding');
	if($automotive_centre_scroll_to_top_padding != false){
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_scroll_to_top_padding).';padding-bottom: '.esc_attr($automotive_centre_scroll_to_top_padding).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_scroll_to_top_width = get_theme_mod('automotive_centre_scroll_to_top_width');
	if($automotive_centre_scroll_to_top_width != false){
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='width: '.esc_attr($automotive_centre_scroll_to_top_width).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_scroll_to_top_height = get_theme_mod('automotive_centre_scroll_to_top_height');
	if($automotive_centre_scroll_to_top_height != false){
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='height: '.esc_attr($automotive_centre_scroll_to_top_height).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_scroll_to_top_border_radius = get_theme_mod('automotive_centre_scroll_to_top_border_radius');
	if($automotive_centre_scroll_to_top_border_radius != false){
		$automotive_centre_custom_css .='.scrollup i{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_scroll_to_top_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$automotive_centre_social_icon_font_size = get_theme_mod('automotive_centre_social_icon_font_size');
	if($automotive_centre_social_icon_font_size != false){
		$automotive_centre_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_social_icon_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_social_icon_padding = get_theme_mod('automotive_centre_social_icon_padding');
	if($automotive_centre_social_icon_padding != false){
		$automotive_centre_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$automotive_centre_custom_css .='padding: '.esc_attr($automotive_centre_social_icon_padding).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_social_icon_width = get_theme_mod('automotive_centre_social_icon_width');
	if($automotive_centre_social_icon_width != false){
		$automotive_centre_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$automotive_centre_custom_css .='width: '.esc_attr($automotive_centre_social_icon_width).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_social_icon_height = get_theme_mod('automotive_centre_social_icon_height');
	if($automotive_centre_social_icon_height != false){
		$automotive_centre_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$automotive_centre_custom_css .='height: '.esc_attr($automotive_centre_social_icon_height).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_social_icon_border_radius = get_theme_mod('automotive_centre_social_icon_border_radius');
	if($automotive_centre_social_icon_border_radius != false){
		$automotive_centre_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_social_icon_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$automotive_centre_related_product_show_hide = get_theme_mod('automotive_centre_related_product_show_hide',true);
	if($automotive_centre_related_product_show_hide != true){
		$automotive_centre_custom_css .='.related.products{';
			$automotive_centre_custom_css .='display: none;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_padding_top_bottom = get_theme_mod('automotive_centre_products_padding_top_bottom');
	if($automotive_centre_products_padding_top_bottom != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($automotive_centre_products_padding_top_bottom).'!important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_padding_left_right = get_theme_mod('automotive_centre_products_padding_left_right');
	if($automotive_centre_products_padding_left_right != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$automotive_centre_custom_css .='padding-left: '.esc_attr($automotive_centre_products_padding_left_right).'!important; padding-right: '.esc_attr($automotive_centre_products_padding_left_right).'!important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_box_shadow = get_theme_mod('automotive_centre_products_box_shadow');
	if($automotive_centre_products_box_shadow != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$automotive_centre_custom_css .='box-shadow: '.esc_attr($automotive_centre_products_box_shadow).'px '.esc_attr($automotive_centre_products_box_shadow).'px '.esc_attr($automotive_centre_products_box_shadow).'px #ddd;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_border_radius = get_theme_mod('automotive_centre_products_border_radius', 0);
	if($automotive_centre_products_border_radius != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_products_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_btn_padding_top_bottom = get_theme_mod('automotive_centre_products_btn_padding_top_bottom');
	if($automotive_centre_products_btn_padding_top_bottom != false){
		$automotive_centre_custom_css .='.woocommerce a.button{';
			$automotive_centre_custom_css .='padding-top: '.esc_attr($automotive_centre_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($automotive_centre_products_btn_padding_top_bottom).' !important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_btn_padding_left_right = get_theme_mod('automotive_centre_products_btn_padding_left_right');
	if($automotive_centre_products_btn_padding_left_right != false){
		$automotive_centre_custom_css .='.woocommerce a.button{';
			$automotive_centre_custom_css .='padding-left: '.esc_attr($automotive_centre_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($automotive_centre_products_btn_padding_left_right).' !important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_products_button_border_radius = get_theme_mod('automotive_centre_products_button_border_radius', 0);
	if($automotive_centre_products_button_border_radius != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_products_button_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_woocommerce_sale_position = get_theme_mod( 'automotive_centre_woocommerce_sale_position','right');
    if($automotive_centre_woocommerce_sale_position == 'left'){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product .onsale{';
			$automotive_centre_custom_css .='left: -10px; right: auto;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_woocommerce_sale_position == 'right'){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product .onsale{';
			$automotive_centre_custom_css .='left: auto; right: 0;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_woocommerce_sale_font_size = get_theme_mod('automotive_centre_woocommerce_sale_font_size');
	if($automotive_centre_woocommerce_sale_font_size != false){
		$automotive_centre_custom_css .='.woocommerce span.onsale{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_woocommerce_sale_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_woocommerce_sale_border_radius = get_theme_mod('automotive_centre_woocommerce_sale_border_radius', 0);
	if($automotive_centre_woocommerce_sale_border_radius != false){
		$automotive_centre_custom_css .='.woocommerce span.onsale{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_woocommerce_sale_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$automotive_centre_logo_padding = get_theme_mod('automotive_centre_logo_padding');
	if($automotive_centre_logo_padding != false){
		$automotive_centre_custom_css .='.logo{';
			$automotive_centre_custom_css .='padding: '.esc_attr($automotive_centre_logo_padding).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_logo_margin = get_theme_mod('automotive_centre_logo_margin');
	if($automotive_centre_logo_margin != false){
		$automotive_centre_custom_css .='.logo{';
			$automotive_centre_custom_css .='margin: '.esc_attr($automotive_centre_logo_margin).';';
		$automotive_centre_custom_css .='}';
	}

	// Site title Font Size
	$automotive_centre_site_title_font_size = get_theme_mod('automotive_centre_site_title_font_size');
	if($automotive_centre_site_title_font_size != false){
		$automotive_centre_custom_css .='.logo h1, .logo p.site-title{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_site_title_font_size).';';
		$automotive_centre_custom_css .='}';
	}

	// Site tagline Font Size
	$automotive_centre_site_tagline_font_size = get_theme_mod('automotive_centre_site_tagline_font_size');
	if($automotive_centre_site_tagline_font_size != false){
		$automotive_centre_custom_css .='.logo p.site-description{';
			$automotive_centre_custom_css .='font-size: '.esc_attr($automotive_centre_site_tagline_font_size).';';
		$automotive_centre_custom_css .='}';
	}


	$automotive_centre_site_title_color = get_theme_mod('automotive_centre_site_title_color');
	if($automotive_centre_site_title_color != false){
		$automotive_centre_custom_css .='p.site-title a{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_site_title_color).'!important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_site_tagline_color = get_theme_mod('automotive_centre_site_tagline_color');
	if($automotive_centre_site_tagline_color != false){
		$automotive_centre_custom_css .='.logo p.site-description{';
			$automotive_centre_custom_css .='color: '.esc_attr($automotive_centre_site_tagline_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_logo_width = get_theme_mod('automotive_centre_logo_width');
	if($automotive_centre_logo_width != false){
		$automotive_centre_custom_css .='.logo img{';
			$automotive_centre_custom_css .='width: '.esc_attr($automotive_centre_logo_width).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_logo_height = get_theme_mod('automotive_centre_logo_height');
	if($automotive_centre_logo_height != false){
		$automotive_centre_custom_css .='.logo img{';
			$automotive_centre_custom_css .='height: '.esc_attr($automotive_centre_logo_height).';';
		$automotive_centre_custom_css .='}';
	}

	// Woocommerce img

	$automotive_centre_shop_featured_image_border_radius = get_theme_mod('automotive_centre_shop_featured_image_border_radius', 0);
	if($automotive_centre_shop_featured_image_border_radius != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product a img{';
			$automotive_centre_custom_css .='border-radius: '.esc_attr($automotive_centre_shop_featured_image_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_shop_featured_image_box_shadow = get_theme_mod('automotive_centre_shop_featured_image_box_shadow',0);
	if($automotive_centre_shop_featured_image_box_shadow != false){
		$automotive_centre_custom_css .='.woocommerce ul.products li.product a img{';
			$automotive_centre_custom_css .='box-shadow: '.esc_attr($automotive_centre_shop_featured_image_box_shadow).'px '.esc_attr($automotive_centre_shop_featured_image_box_shadow).'px '.esc_attr($automotive_centre_shop_featured_image_box_shadow).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$automotive_centre_preloader_bg_color = get_theme_mod('automotive_centre_preloader_bg_color');
	if($automotive_centre_preloader_bg_color != false){
		$automotive_centre_custom_css .='#preloader{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_preloader_bg_color).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_preloader_border_color = get_theme_mod('automotive_centre_preloader_border_color');
	if($automotive_centre_preloader_border_color != false){
		$automotive_centre_custom_css .='.loader-line{';
			$automotive_centre_custom_css .='border-color: '.esc_attr($automotive_centre_preloader_border_color).'!important;';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_preloader_bg_img = get_theme_mod('automotive_centre_preloader_bg_img');
	if($automotive_centre_preloader_bg_img != false){
		$automotive_centre_custom_css .='#preloader{';
			$automotive_centre_custom_css .='background: url('.esc_attr($automotive_centre_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$automotive_centre_custom_css .='}';
	}

	// Header Background Color
	$automotive_centre_header_background_color = get_theme_mod('automotive_centre_header_background_color');
	if($automotive_centre_header_background_color != false){
		$automotive_centre_custom_css .='.home-page-header{';
			$automotive_centre_custom_css .='background-color: '.esc_attr($automotive_centre_header_background_color).';';
		$automotive_centre_custom_css .='}';
	} 

	$automotive_centre_header_img_position = get_theme_mod('automotive_centre_header_img_position','center top');
	if($automotive_centre_header_img_position != false){
		$automotive_centre_custom_css .='.home-page-header{';
			$automotive_centre_custom_css .='background-position: '.esc_attr($automotive_centre_header_img_position).'!important;';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$automotive_centre_display_grid_posts_settings = get_theme_mod( 'automotive_centre_display_grid_posts_settings','Into Blocks');
    if($automotive_centre_display_grid_posts_settings == 'Without Blocks'){
		$automotive_centre_custom_css .='.grid-post-main-box{';
			$automotive_centre_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$automotive_centre_custom_css .='}';
	}

