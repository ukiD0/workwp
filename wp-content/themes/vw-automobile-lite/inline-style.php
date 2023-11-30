<?php
	
	/*-------------------------First highlight color-------------------*/

	$vw_automobile_lite_first_color = get_theme_mod('vw_automobile_lite_first_color');

	$vw_automobile_lite_custom_css = '';

	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='#comments a.comment-reply-link:hover,.sidebar ul li::before,.yearwrap,.date-monthwrap,.logowrapper, .search-box i, .slider .more-btn a, .footer-2, .scrollup i, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .hvr-sweep-to-right:before, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .tagcloud a:hover, .footer .tagcloud a:hover, .entry-audio audio, .pagination span, .pagination a, a.button, .sidebar .custom-contact-us input[type="submit"], .footer a.custom_read_more:hover, #comments a.comment-reply-link, .widget .woocommerce-product-search button[type="submit"], .footer input[type="submit"], .toggle-nav button, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button, .bradcrumbs a:hover, .bradcrumbs span,.bradcrumbs a:hover, .bradcrumbs span, .post-categories li a:hover,nav.navigation.posts-navigation .nav-previous a,nav.navigation.posts-navigation .nav-next a{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.search-submit, #comments input[type="submit"].submit{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_first_color).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='a, span.email i, span.timings i, span.call i, .sidebar .widget h3, .post-main-box h2, .blogbutton-small, h2.single-post-title, .sidebar .custom-social-icons i:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .footer a.custom_read_more, .sidebar a.custom_read_more, h1.single-post-title, .footer li a:hover, .sidebar ul li a:hover, span.email a:hover, span.call a:hover, .slider .inner_carousel h1 a:hover, .choose_us h3 a:hover, .post-main-box:hover .metabox a, .single-post .metabox:hover a, .sidebar .wp-block-search .wp-block-search__label, .metabox a:hover{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.slider .more-btn a, .blogbutton-small, .footer a.custom_read_more, .sidebar a.custom_read_more, .footer input[type="submit"]{';
			$vw_automobile_lite_custom_css .='border-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.search-submit, .blogbutton-small{';
			$vw_automobile_lite_custom_css .='border-color: '.esc_attr($vw_automobile_lite_first_color).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation ul ul{';
			$vw_automobile_lite_custom_css .='border-top-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.footer h3, .main-navigation ul ul, .footer .wp-block-search .wp-block-search__label{';
			$vw_automobile_lite_custom_css .='border-bottom-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_width_option','Full Width');
    if($vw_automobile_lite_theme_lay == 'Boxed'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.logowrapper{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-70deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: 0em; transform: none;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='padding: 3% 0; text-align: center; transform: skew(-20deg);';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.menubox{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='right: 100px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.scrollup.left i{';
		  $vw_automobile_lite_custom_css .='left: 100px;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Wide Width'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.logowrapper{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-68deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: 0em; transform: none;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='padding: 3% 0; text-align: center; transform: skew(-10deg);';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.menubox{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='right: 30px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.scrollup.left i{';
		  $vw_automobile_lite_custom_css .='left: 30px;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Full Width'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='max-width: 100%;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_slider_opacity_color','0.7');
	if($vw_automobile_lite_theme_lay == '0'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.1'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.1';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.2'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.2';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.3'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.3';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.4'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.4';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.5'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.5';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.6'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.6';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.7'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.7';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.8'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.8';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.9'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.9';
		$vw_automobile_lite_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_automobile_lite_slider_image_overlay = get_theme_mod('vw_automobile_lite_slider_image_overlay', true);
	if($vw_automobile_lite_slider_image_overlay == false){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:1;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_slider_image_overlay_color = get_theme_mod('vw_automobile_lite_slider_image_overlay_color', true);
	if($vw_automobile_lite_slider_image_overlay_color != false){
		$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_slider_image_overlay_color).';';
		$vw_automobile_lite_custom_css .='}';
	} 

	/*------------------Slider Content Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_slider_content_option','Center');
    if($vw_automobile_lite_theme_lay == 'Left'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Center'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Right'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_automobile_lite_slider_content_padding_top_bottom = get_theme_mod('vw_automobile_lite_slider_content_padding_top_bottom');
	$vw_automobile_lite_slider_content_padding_left_right = get_theme_mod('vw_automobile_lite_slider_content_padding_left_right');
	if($vw_automobile_lite_slider_content_padding_top_bottom != false || $vw_automobile_lite_slider_content_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption{';
			$vw_automobile_lite_custom_css .='top: '.esc_attr($vw_automobile_lite_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_automobile_lite_slider_content_padding_top_bottom).';left: '.esc_attr($vw_automobile_lite_slider_content_padding_left_right).';right: '.esc_attr($vw_automobile_lite_slider_content_padding_left_right).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*-------------------Slider Height ------------*/

	$vw_automobile_lite_slider_height = get_theme_mod('vw_automobile_lite_slider_height');
	if($vw_automobile_lite_slider_height != false){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_slider_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*-------------------Blog Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_blog_layout_option','Default');
    if($vw_automobile_lite_theme_lay == 'Default'){
		$vw_automobile_lite_custom_css .='.post-main-box{';
			$vw_automobile_lite_custom_css .='';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.post-main-box h2{';
			$vw_automobile_lite_custom_css .='padding:0;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.new-text p{';
			$vw_automobile_lite_custom_css .='margin-top:10px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.blogbutton-small{';
			$vw_automobile_lite_custom_css .='margin: 0; display: inline-block;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Center'){
		$vw_automobile_lite_custom_css .='.post-main-box, .post-main-box h2, .new-text p, .metabox, .content-bttn{';
			$vw_automobile_lite_custom_css .='text-align:center;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.new-text p{';
			$vw_automobile_lite_custom_css .='margin-top:0;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.metabox{';
			$vw_automobile_lite_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.blogbutton-small{';
			$vw_automobile_lite_custom_css .='margin: 0; display: inline-block;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Left'){
		$vw_automobile_lite_custom_css .='.post-main-box, .post-main-box h2, .new-text p, .content-bttn{';
			$vw_automobile_lite_custom_css .='text-align:Left;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.metabox{';
			$vw_automobile_lite_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_automobile_lite_blog_page_posts_settings = get_theme_mod( 'vw_automobile_lite_blog_page_posts_settings','Into Blocks');
    if($vw_automobile_lite_blog_page_posts_settings == 'Without Blocks'){
		$vw_automobile_lite_custom_css .='.post-main-box{';
			$vw_automobile_lite_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_automobile_lite_custom_css .='}';
	} 

	// featured image dimention
	$vw_automobile_lite_blog_post_featured_image_dimension = get_theme_mod('vw_automobile_lite_blog_post_featured_image_dimension', 'default');
	$vw_automobile_lite_blog_post_featured_image_custom_width = get_theme_mod('vw_automobile_lite_blog_post_featured_image_custom_width',250);
	$vw_automobile_lite_blog_post_featured_image_custom_height = get_theme_mod('vw_automobile_lite_blog_post_featured_image_custom_height',250);
	if($vw_automobile_lite_blog_post_featured_image_dimension == 'custom'){
		$vw_automobile_lite_custom_css .='.post-main-box img{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_automobile_lite_blog_post_featured_image_custom_height).';';
		$vw_automobile_lite_custom_css .='}';
	}
	/*------------------Responsive Media -----------------------*/

	$vw_automobile_lite_resp_slider = get_theme_mod( 'vw_automobile_lite_resp_slider_hide_show',false);
	if($vw_automobile_lite_resp_slider == true && get_theme_mod( 'vw_automobile_lite_slider_hide_show', false) == false){
    	$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} ';
	}
    if($vw_automobile_lite_resp_slider == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_resp_slider == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_sidebar = get_theme_mod( 'vw_automobile_lite_sidebar_hide_show',true);
    if($vw_automobile_lite_sidebar == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.sidebar{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_sidebar == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.sidebar{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_resp_scroll_top = get_theme_mod( 'vw_automobile_lite_resp_scroll_top_hide_show',true);
	if($vw_automobile_lite_resp_scroll_top == true && get_theme_mod( 'vw_automobile_lite_hide_show_scroll',true) != true){
    	$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='visibility:hidden !important;';
		$vw_automobile_lite_custom_css .='} ';
	}
    if($vw_automobile_lite_resp_scroll_top == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='visibility:visible !important;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_resp_scroll_top == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px){';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='visibility:hidden !important;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_automobile_lite_resp_menu_toggle_btn_bg_color');
	if($vw_automobile_lite_resp_menu_toggle_btn_bg_color != false){
		$vw_automobile_lite_custom_css .='.toggle-nav button{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_resp_menu_toggle_btn_bg_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_automobile_lite_button_padding_top_bottom = get_theme_mod('vw_automobile_lite_button_padding_top_bottom');
	$vw_automobile_lite_button_padding_left_right = get_theme_mod('vw_automobile_lite_button_padding_left_right');
	if($vw_automobile_lite_button_padding_top_bottom != false || $vw_automobile_lite_button_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_button_padding_top_bottom).';padding-left: '.esc_attr($vw_automobile_lite_button_padding_left_right).';padding-right: '.esc_attr($vw_automobile_lite_button_padding_left_right).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_button_border_radius = get_theme_mod('vw_automobile_lite_button_border_radius');
	if($vw_automobile_lite_button_border_radius != false){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a, .hvr-sweep-to-right:before, .hvr-sweep-to-right:hover{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_button_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_button_font_size = get_theme_mod('vw_automobile_lite_button_font_size',14);
	$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
		$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_button_font_size).';';
	$vw_automobile_lite_custom_css .='}';

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_button_text_transform','Uppercase');
	if($vw_automobile_lite_theme_lay == 'Capitalize'){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
			$vw_automobile_lite_custom_css .='text-transform:Capitalize;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_theme_lay == 'Lowercase'){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
			$vw_automobile_lite_custom_css .='text-transform:Lowercase;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_theme_lay == 'Uppercase'){ 
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
			$vw_automobile_lite_custom_css .='text-transform:Uppercase;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_button_letter_spacing = get_theme_mod('vw_automobile_lite_button_letter_spacing',14);
	$vw_automobile_lite_custom_css .='.blogbutton-small {';
		$vw_automobile_lite_custom_css .='letter-spacing: '.esc_attr($vw_automobile_lite_button_letter_spacing).';';
	$vw_automobile_lite_custom_css .='}';

	/*------------- Single Blog Page------------------*/

	$vw_automobile_lite_featured_image_border_radius = get_theme_mod('vw_automobile_lite_featured_image_border_radius', 0);
	if($vw_automobile_lite_featured_image_border_radius != false){
		$vw_automobile_lite_custom_css .='.post-main-box img, .feature-box img{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_featured_image_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_featured_image_box_shadow = get_theme_mod('vw_automobile_lite_featured_image_box_shadow',0);
	if($vw_automobile_lite_featured_image_box_shadow != false){
		$vw_automobile_lite_custom_css .='.post-main-box img, .feature-box img, #content-vw img{';
			$vw_automobile_lite_custom_css .='box-shadow: '.esc_attr($vw_automobile_lite_featured_image_box_shadow).'px '.esc_attr($vw_automobile_lite_featured_image_box_shadow).'px '.esc_attr($vw_automobile_lite_featured_image_box_shadow).'px #cccccc;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_single_blog_post_navigation_show_hide = get_theme_mod('vw_automobile_lite_single_blog_post_navigation_show_hide',true);
	if($vw_automobile_lite_single_blog_post_navigation_show_hide != true){
		$vw_automobile_lite_custom_css .='.post-navigation{';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_single_blog_comment_title = get_theme_mod('vw_automobile_lite_single_blog_comment_title', 'Leave a Reply');
	if($vw_automobile_lite_single_blog_comment_title == ''){
		$vw_automobile_lite_custom_css .='#comments h2#reply-title {';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_single_blog_comment_button_text = get_theme_mod('vw_automobile_lite_single_blog_comment_button_text', 'Post Comment');
	if($vw_automobile_lite_single_blog_comment_button_text == ''){
		$vw_automobile_lite_custom_css .='#comments p.form-submit {';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_comment_width = get_theme_mod('vw_automobile_lite_single_blog_comment_width');
	if($vw_automobile_lite_comment_width != false){
		$vw_automobile_lite_custom_css .='#comments textarea{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_comment_width).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_automobile_lite_copyright_background_color = get_theme_mod('vw_automobile_lite_copyright_background_color');
	if($vw_automobile_lite_copyright_background_color != false){
		$vw_automobile_lite_custom_css .='.footer-2{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_copyright_background_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_background_color = get_theme_mod('vw_automobile_lite_footer_background_color');
	if($vw_automobile_lite_footer_background_color != false){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_footer_background_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_widgets_heading = get_theme_mod( 'vw_automobile_lite_footer_widgets_heading','Left');
    if($vw_automobile_lite_footer_widgets_heading == 'Left'){
		$vw_automobile_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
		$vw_automobile_lite_custom_css .='text-align: left;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_footer_widgets_heading == 'Center'){
		$vw_automobile_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_automobile_lite_custom_css .='text-align: center;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_footer_widgets_heading == 'Right'){
		$vw_automobile_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_automobile_lite_custom_css .='text-align: right;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_widgets_content = get_theme_mod( 'vw_automobile_lite_footer_widgets_content','Left');
    if($vw_automobile_lite_footer_widgets_content == 'Left'){
		$vw_automobile_lite_custom_css .='.footer .widget{';
		$vw_automobile_lite_custom_css .='text-align: left;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_footer_widgets_content == 'Center'){
		$vw_automobile_lite_custom_css .='.footer .widget{';
			$vw_automobile_lite_custom_css .='text-align: center;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_footer_widgets_content == 'Right'){
		$vw_automobile_lite_custom_css .='.footer .widget{';
			$vw_automobile_lite_custom_css .='text-align: right;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_copyright_font_size = get_theme_mod('vw_automobile_lite_copyright_font_size');
	if($vw_automobile_lite_copyright_font_size != false){
		$vw_automobile_lite_custom_css .='.footer-2 p, .footer-2 a{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_copyright_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_copyright_padding_top_bottom = get_theme_mod('vw_automobile_lite_copyright_padding_top_bottom');
	if($vw_automobile_lite_copyright_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.footer-2{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_copyright_padding_top_bottom).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_copyright_alignment = get_theme_mod('vw_automobile_lite_copyright_alignment');
	if($vw_automobile_lite_copyright_alignment != false){
		$vw_automobile_lite_custom_css .='.footer-2 p{';
			$vw_automobile_lite_custom_css .='text-align: '.esc_attr($vw_automobile_lite_copyright_alignment).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_padding = get_theme_mod('vw_automobile_lite_footer_padding');
	if($vw_automobile_lite_footer_padding != false){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='padding: '.esc_attr($vw_automobile_lite_footer_padding).' 0;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_icon = get_theme_mod('vw_automobile_lite_footer_icon');
	if($vw_automobile_lite_footer_icon == false){
		$vw_automobile_lite_custom_css .='.copyright p{';
			$vw_automobile_lite_custom_css .='width:100%; text-align:center; float:none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_background_image = get_theme_mod('vw_automobile_lite_footer_background_image');
	if($vw_automobile_lite_footer_background_image != false){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='background: url('.esc_attr($vw_automobile_lite_footer_background_image).');';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_img_footer','scroll');
	if($vw_automobile_lite_theme_lay == 'fixed'){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='background-attachment: fixed !important;';
		$vw_automobile_lite_custom_css .='}';
	}elseif ($vw_automobile_lite_theme_lay == 'scroll'){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='background-attachment: scroll !important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_footer_img_position = get_theme_mod('vw_automobile_lite_footer_img_position','center center');
	if($vw_automobile_lite_footer_img_position != false){
		$vw_automobile_lite_custom_css .='.footer{';
			$vw_automobile_lite_custom_css .='background-position: '.esc_attr($vw_automobile_lite_footer_img_position).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}
	
	/*------------- Top Bar Settings ------------------*/
	$vw_automobile_lite_menus_item = get_theme_mod( 'vw_automobile_lite_menus_item_style','None');
    if($vw_automobile_lite_menus_item == 'None'){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_menus_item == 'Zoom In'){
		$vw_automobile_lite_custom_css .='.main-navigation a:hover{';
			$vw_automobile_lite_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #dd3333;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_header_menus_color = get_theme_mod('vw_automobile_lite_header_menus_color');
	if($vw_automobile_lite_header_menus_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_header_menus_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_header_menus_hover_color = get_theme_mod('vw_automobile_lite_header_menus_hover_color');
	if($vw_automobile_lite_header_menus_hover_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation a:hover{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_header_menus_hover_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_header_submenus_color = get_theme_mod('vw_automobile_lite_header_submenus_color');
	if($vw_automobile_lite_header_submenus_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation ul ul a{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_header_submenus_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_header_submenus_hover_color = get_theme_mod('vw_automobile_lite_header_submenus_hover_color');
	if($vw_automobile_lite_header_submenus_hover_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_header_submenus_hover_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_navigation_menu_font_size = get_theme_mod('vw_automobile_lite_navigation_menu_font_size');
	if($vw_automobile_lite_navigation_menu_font_size != false){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_navigation_menu_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_navigation_menu_font_weight = get_theme_mod('vw_automobile_lite_navigation_menu_font_weight','600');
	if($vw_automobile_lite_navigation_menu_font_weight != false){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='font-weight: '.esc_attr($vw_automobile_lite_navigation_menu_font_weight).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_menu_text_transform','Uppercase');
	if($vw_automobile_lite_theme_lay == 'Capitalize'){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='text-transform:Capitalize;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_theme_lay == 'Lowercase'){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='text-transform:Lowercase;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_theme_lay == 'Uppercase'){
		$vw_automobile_lite_custom_css .='.main-navigation a{';
			$vw_automobile_lite_custom_css .='text-transform:Uppercase;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_topbar_padding_top_bottom = get_theme_mod('vw_automobile_lite_topbar_padding_top_bottom');
	if($vw_automobile_lite_topbar_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.con_details{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_topbar_padding_top_bottom).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_automobile_lite_search_padding_top_bottom = get_theme_mod('vw_automobile_lite_search_padding_top_bottom');
	$vw_automobile_lite_search_padding_left_right = get_theme_mod('vw_automobile_lite_search_padding_left_right');
	$vw_automobile_lite_search_font_size = get_theme_mod('vw_automobile_lite_search_font_size');
	$vw_automobile_lite_search_border_radius = get_theme_mod('vw_automobile_lite_search_border_radius');
	if($vw_automobile_lite_search_padding_top_bottom != false || $vw_automobile_lite_search_padding_left_right != false || $vw_automobile_lite_search_font_size != false || $vw_automobile_lite_search_border_radius != false){
		$vw_automobile_lite_custom_css .='.search-box i{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_search_padding_top_bottom).';padding-left: '.esc_attr($vw_automobile_lite_search_padding_left_right).';padding-right: '.esc_attr($vw_automobile_lite_search_padding_left_right).';font-size: '.esc_attr($vw_automobile_lite_search_font_size).';border-radius: '.esc_attr($vw_automobile_lite_search_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_automobile_lite_scroll_to_top_font_size = get_theme_mod('vw_automobile_lite_scroll_to_top_font_size');
	if($vw_automobile_lite_scroll_to_top_font_size != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_scroll_to_top_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_padding = get_theme_mod('vw_automobile_lite_scroll_to_top_padding');
	$vw_automobile_lite_scroll_to_top_padding = get_theme_mod('vw_automobile_lite_scroll_to_top_padding');
	if($vw_automobile_lite_scroll_to_top_padding != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_automobile_lite_scroll_to_top_padding).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_width = get_theme_mod('vw_automobile_lite_scroll_to_top_width');
	if($vw_automobile_lite_scroll_to_top_width != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_scroll_to_top_width).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_height = get_theme_mod('vw_automobile_lite_scroll_to_top_height');
	if($vw_automobile_lite_scroll_to_top_height != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_scroll_to_top_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_border_radius = get_theme_mod('vw_automobile_lite_scroll_to_top_border_radius');
	if($vw_automobile_lite_scroll_to_top_border_radius != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_scroll_to_top_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_automobile_lite_social_icon_font_size = get_theme_mod('vw_automobile_lite_social_icon_font_size');
	if($vw_automobile_lite_social_icon_font_size != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_social_icon_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_padding = get_theme_mod('vw_automobile_lite_social_icon_padding');
	if($vw_automobile_lite_social_icon_padding != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='padding: '.esc_attr($vw_automobile_lite_social_icon_padding).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_width = get_theme_mod('vw_automobile_lite_social_icon_width');
	if($vw_automobile_lite_social_icon_width != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_social_icon_width).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_height = get_theme_mod('vw_automobile_lite_social_icon_height');
	if($vw_automobile_lite_social_icon_height != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_social_icon_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_border_radius = get_theme_mod('vw_automobile_lite_social_icon_border_radius');
	if($vw_automobile_lite_social_icon_border_radius != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_social_icon_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_automobile_lite_related_product_show_hide = get_theme_mod('vw_automobile_lite_related_product_show_hide',true);
	if($vw_automobile_lite_related_product_show_hide != true){
		$vw_automobile_lite_custom_css .='.related.products{';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_padding_top_bottom = get_theme_mod('vw_automobile_lite_products_padding_top_bottom');
	if($vw_automobile_lite_products_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_automobile_lite_products_padding_top_bottom).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_padding_left_right = get_theme_mod('vw_automobile_lite_products_padding_left_right');
	if($vw_automobile_lite_products_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='padding-left: '.esc_attr($vw_automobile_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_automobile_lite_products_padding_left_right).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_box_shadow = get_theme_mod('vw_automobile_lite_products_box_shadow');
	if($vw_automobile_lite_products_box_shadow != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_automobile_lite_custom_css .='box-shadow: '.esc_attr($vw_automobile_lite_products_box_shadow).'px '.esc_attr($vw_automobile_lite_products_box_shadow).'px '.esc_attr($vw_automobile_lite_products_box_shadow).'px #ddd;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_border_radius = get_theme_mod('vw_automobile_lite_products_border_radius', 0);
	if($vw_automobile_lite_products_border_radius != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_products_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_btn_padding_top_bottom = get_theme_mod('vw_automobile_lite_products_btn_padding_top_bottom');
	if($vw_automobile_lite_products_btn_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.woocommerce a.button{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_automobile_lite_products_btn_padding_top_bottom).' !important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_btn_padding_left_right = get_theme_mod('vw_automobile_lite_products_btn_padding_left_right');
	if($vw_automobile_lite_products_btn_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.woocommerce a.button{';
			$vw_automobile_lite_custom_css .='padding-left: '.esc_attr($vw_automobile_lite_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_automobile_lite_products_btn_padding_left_right).' !important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_button_border_radius = get_theme_mod('vw_automobile_lite_products_button_border_radius', 0);
	if($vw_automobile_lite_products_button_border_radius != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_products_button_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_woocommerce_sale_position = get_theme_mod( 'vw_automobile_lite_woocommerce_sale_position','right');
    if($vw_automobile_lite_woocommerce_sale_position == 'left'){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_automobile_lite_custom_css .='left: -10px; right: auto;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_woocommerce_sale_position == 'right'){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_automobile_lite_custom_css .='left: auto; right: 0;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_woocommerce_sale_font_size = get_theme_mod('vw_automobile_lite_woocommerce_sale_font_size');
	if($vw_automobile_lite_woocommerce_sale_font_size != false){
		$vw_automobile_lite_custom_css .='.woocommerce span.onsale{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_woocommerce_sale_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_automobile_lite_woocommerce_sale_padding_top_bottom');
	if($vw_automobile_lite_woocommerce_sale_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.woocommerce span.onsale{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_woocommerce_sale_padding_top_bottom).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_woocommerce_sale_padding_left_right = get_theme_mod('vw_automobile_lite_woocommerce_sale_padding_left_right');
	if($vw_automobile_lite_woocommerce_sale_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.woocommerce span.onsale{';
			$vw_automobile_lite_custom_css .='padding-left: '.esc_attr($vw_automobile_lite_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_automobile_lite_woocommerce_sale_padding_left_right).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_woocommerce_sale_border_radius = get_theme_mod('vw_automobile_lite_woocommerce_sale_border_radius', 100);
	if($vw_automobile_lite_woocommerce_sale_border_radius != false){
		$vw_automobile_lite_custom_css .='.woocommerce span.onsale{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_woocommerce_sale_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_automobile_lite_logo_padding = get_theme_mod('vw_automobile_lite_logo_padding');
	if($vw_automobile_lite_logo_padding != false){
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='padding: '.esc_attr($vw_automobile_lite_logo_padding).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_logo_margin = get_theme_mod('vw_automobile_lite_logo_margin');
	if($vw_automobile_lite_logo_margin != false){
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='margin: '.esc_attr($vw_automobile_lite_logo_margin).';';
		$vw_automobile_lite_custom_css .='}';
	}

	// Site title Font Size
	$vw_automobile_lite_site_title_font_size = get_theme_mod('vw_automobile_lite_site_title_font_size');
	if($vw_automobile_lite_site_title_font_size != false){
		$vw_automobile_lite_custom_css .='#header .logo h1, #header .logo p.site-title{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_site_title_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_automobile_lite_site_tagline_font_size = get_theme_mod('vw_automobile_lite_site_tagline_font_size');
	if($vw_automobile_lite_site_tagline_font_size != false){
		$vw_automobile_lite_custom_css .='#header .logo p.site-description{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_site_tagline_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_automobile_lite_preloader_bg_color = get_theme_mod('vw_automobile_lite_preloader_bg_color');
	if($vw_automobile_lite_preloader_bg_color != false){
		$vw_automobile_lite_custom_css .='#preloader{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_preloader_bg_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_preloader_border_color = get_theme_mod('vw_automobile_lite_preloader_border_color');
	if($vw_automobile_lite_preloader_border_color != false){
		$vw_automobile_lite_custom_css .='.loader-line{';
			$vw_automobile_lite_custom_css .='border-color: '.esc_attr($vw_automobile_lite_preloader_border_color).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_preloader_bg_img = get_theme_mod('vw_automobile_lite_preloader_bg_img');
	if($vw_automobile_lite_preloader_bg_img != false){
		$vw_automobile_lite_custom_css .='#preloader{';
			$vw_automobile_lite_custom_css .='background: url('.esc_attr($vw_automobile_lite_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_automobile_lite_custom_css .='}';
	}

	// Header Background Color
	$vw_automobile_lite_header_background_color = get_theme_mod('vw_automobile_lite_header_background_color');
	if($vw_automobile_lite_header_background_color != false){
		$vw_automobile_lite_custom_css .=' #header{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_header_background_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_header_img_position = get_theme_mod('vw_automobile_lite_header_img_position','center top');
	if($vw_automobile_lite_header_img_position != false){
		$vw_automobile_lite_custom_css .='#header{';
			$vw_automobile_lite_custom_css .='background-position: '.esc_attr($vw_automobile_lite_header_img_position).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_automobile_lite_display_grid_posts_settings = get_theme_mod( 'vw_automobile_lite_display_grid_posts_settings','Into Blocks');
    if($vw_automobile_lite_display_grid_posts_settings == 'Without Blocks'){
		$vw_automobile_lite_custom_css .='.grid-post-main-box{';
			$vw_automobile_lite_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_automobile_lite_custom_css .='}';
	}
