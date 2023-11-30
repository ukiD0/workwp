<?php
//about theme info
add_action( 'admin_menu', 'vw_car_rental_gettingstarted' );
function vw_car_rental_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Car Rental', 'vw-car-rental'), esc_html__('About VW Car Rental', 'vw-car-rental'), 'edit_theme_options', 'vw_car_rental_guide', 'vw_car_rental_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_car_rental_admin_theme_style() {
   wp_enqueue_style('vw-car-rental-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-car-rental-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_car_rental_admin_theme_style');

//guidline for about theme
function vw_car_rental_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-car-rental' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Car Rental Theme', 'vw-car-rental' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-car-rental'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Car Rental at 20% Discount','vw-car-rental'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-car-rental'); ?> ( <span><?php esc_html_e('vwpro20','vw-car-rental'); ?></span> ) </h4> 

			<div class="info-link">				
				<a href="<?php echo esc_url( VW_CAR_RENTAL_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-car-rental' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-car-rental' ); ?></button>
			<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-car-rental' ); ?></button>	
			<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-car-rental' ); ?></button>
			<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-car-rental' ); ?></button>
		  	<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-car-rental' ); ?></button>
		  	<button class="tablinks" onclick="vw_car_rental_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-car-rental' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_car_rental_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_car_rental_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Car_Rental_Plugin_Activation_Settings::get_instance();
				$vw_car_rental_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-car-rental-recommended-plugins">
				    <div class="vw-car-rental-action-list">
				        <?php if ($vw_car_rental_actions): foreach ($vw_car_rental_actions as $key => $vw_car_rental_actionValue): ?>
				                <div class="vw-car-rental-action" id="<?php echo esc_attr($vw_car_rental_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_car_rental_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_car_rental_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_car_rental_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-car-rental'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_car_rental_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-car-rental' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Car Rental is a resourceful, modern, versatile, stylish and feature-full car rental WordPress theme for cab services, rental car business, car booking services, garage, automobile showroom, rented bike provider and all such automobile and vehicle websites. It is fully compatible with the latest WordPress 5.0 version. This powerful theme uses the online space in the smartest way to exhibit your services in a professional manner to make a lasting impression on visitors. It is a fully responsive theme which fits in all the screen sizes without breaking; cross-browser compatible and translation ready. It supports RTL writing and its retina readiness shows crisp and sharp images on HD devices.  It includes homepage sliders and call to action (CTA) button. Plenty of social media icons are included so website content can be shared on multiple platforms. It supports multiple post formats like image, gallery, video, audio, link etc. Space for separate video section is given on the homepage. Its SEO works wonderfully. VW Car Rental can be customized according to your needs.  ','vw-car-rental'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-car-rental' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-car-rental' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CAR_RENTAL_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-car-rental' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-car-rental'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-car-rental'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-car-rental'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-car-rental'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-car-rental'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CAR_RENTAL_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-car-rental'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-car-rental'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-car-rental'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CAR_RENTAL_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-car-rental'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-car-rental' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-car-rental'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-car-rental'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_category_section') ); ?>" target="_blank"><?php esc_html_e('Category Section','vw-car-rental'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_service_section') ); ?>" target="_blank"><?php esc_html_e('Services Section','vw-car-rental'); ?></a>
								</div>
								
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-car-rental'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-car-rental'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-car-rental'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-car-rental'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-car-rental'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-car-rental'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-car-rental'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-car-rental'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-car-rental'); ?></span><?php esc_html_e(' Go to ','vw-car-rental'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-car-rental'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-car-rental'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-car-rental'); ?></span><?php esc_html_e(' Go to ','vw-car-rental'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-car-rental'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-car-rental'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-car-rental'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-car-rental/" target="_blank"><?php esc_html_e('Documentation','vw-car-rental'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Car_Rental_Plugin_Activation_Settings::get_instance();
				$vw_car_rental_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-car-rental-recommended-plugins">
				    <div class="vw-car-rental-action-list">
				        <?php if ($vw_car_rental_actions): foreach ($vw_car_rental_actions as $key => $vw_car_rental_actionValue): ?>
				                <div class="vw-car-rental-action" id="<?php echo esc_attr($vw_car_rental_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_car_rental_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_car_rental_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_car_rental_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-car-rental'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_car_rental_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-car-rental' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-car-rental'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','vw-car-rental'); ?></span></b></p>
	              	<div class="vw-car-rental-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-car-rental'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','vw-car-rental'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-car-rental' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-car-rental'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-car-rental'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-car-rental'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-car-rental'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-car-rental'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-car-rental'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-car-rental'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-car-rental'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>			
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Car_Rental_Plugin_Activation_Settings::get_instance();
			$vw_car_rental_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-car-rental-recommended-plugins">
				    <div class="vw-car-rental-action-list">
				        <?php if ($vw_car_rental_actions): foreach ($vw_car_rental_actions as $key => $vw_car_rental_actionValue): ?>
				                <div class="vw-car-rental-action" id="<?php echo esc_attr($vw_car_rental_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_car_rental_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_car_rental_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_car_rental_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-car-rental' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-car-rental-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-car-rental'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-car-rental' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-car-rental'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-car-rental'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-car-rental'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-car-rental'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-car-rental'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-car-rental'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_car_rental_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-car-rental'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-car-rental'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Car_Rental_Plugin_Activation_Woo_Products::get_instance();
				$vw_car_rental_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-car-rental-recommended-plugins">
					    <div class="vw-car-rental-action-list">
					        <?php if ($vw_car_rental_actions): foreach ($vw_car_rental_actions as $key => $vw_car_rental_actionValue): ?>
					                <div class="vw-car-rental-action" id="<?php echo esc_attr($vw_car_rental_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_car_rental_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_car_rental_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_car_rental_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-car-rental' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-car-rental-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-car-rental'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-car-rental'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-car-rental'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-car-rental'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-car-rental'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-car-rental'); ?></span></b></p>
	              	<div class="vw-car-rental-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-car-rental'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-car-rental'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-car-rental' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('With the increasing competition in every field of automobile industry, having a unique and attractive website for your car rental business is no more an option rather the need of the present hour. To stand out among your competitors and exhibit your services in the most professional manner, this car rental WordPress theme is the best option. It is eye-catching, feature-rich, fresh and modern. It is judiciously designed to cater the latest demands of website owners. The theme is well coded making it bug-free and safe. This car rental WordPress theme comes with three different layout designs: boxed, full-width and full screen. Although there are various inner pages predesigned but if you want you can additionally design any number of custom pages. These pages can be designed using page builder which makes this task a childs play.','vw-car-rental'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_CAR_RENTAL_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-car-rental'); ?></a>
					<a href="<?php echo esc_url( VW_CAR_RENTAL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-car-rental'); ?></a>
					<a href="<?php echo esc_url( VW_CAR_RENTAL_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-car-rental'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-car-rental' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-car-rental'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-car-rental'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-car-rental'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-car-rental'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-car-rental'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-car-rental'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'vw-car-rental'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-car-rental'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-car-rental'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-car-rental'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-car-rental'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-car-rental'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-car-rental'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-car-rental'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_CAR_RENTAL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-car-rental'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-car-rental'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-car-rental'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CAR_RENTAL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-car-rental'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-car-rental'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-car-rental'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CAR_RENTAL_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-car-rental'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-car-rental'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-car-rental'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CAR_RENTAL_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-car-rental'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-car-rental'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-car-rental'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CAR_RENTAL_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-car-rental'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-car-rental'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-car-rental'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CAR_RENTAL_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-car-rental'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>