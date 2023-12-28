<?php
if (!defined('ABSPATH'))
{
    exit;
}

function tomas_setting_panel_member_directory_free($title = '', $content = '')
{
    ?>
<div class="wrap">
	<div id="dashboard-widgets-wrap">
		<div id="dashboard-widgets" class="metabox-holder">
			<div id="post-body">
				<div id="dashboard-widgets-main-content">
					<div class="postbox-container" style="width: 90%;">
						<div class="postbox">					
							<h3 class='hndle' style='padding: 10px 0px; border-bottom: 0px solid #eee !important;'>
							<span>
								<?php	echo $title; 	?>
							</span>
							</h3>
						
							<div class="inside postbox" style='padding-top:10px; padding-left: 10px; ' >
								<?php echo $content; ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="clear: both"></div>
<?php	
}

function setting_panel_member_directory_head_free($title)
{
	?>
		<div style='padding-top:20px; font-size:22px;'><?php echo $title; ?></div>
		<div style='clear:both'></div>
<?php 
}

function tooltipdirectorysettingfree()
{
    $title = 'Directory Global Settings';
    setting_panel_member_directory_head_free($title);
    
    if (isset($_POST['memberDirectoryUserRoleSubmit']))
    {
        messageBarFormember_directory('Change Saved');
    }
    
    if (isset($_POST['postDirectorySubmit']))
    {
        messageBarFormember_directory('Change Saved');
    }

    post_directory_panel_free();
    memberdirectoryrolesetting_free();
    woocommerce_product_directory_panel_free();  //9.1.7
}

function memberdirectoryrolesetting_free()
{
	global $wpdb,$table_prefix;

	if (isset($_POST['memberDirectoryUserRoleSelect']))
	{
	    $memberDirectoryUserRoleSelect = sanitize_text_field($_POST['memberDirectoryUserRoleSelect']);
		update_option('memberDirectoryUserRoleSelect',$memberDirectoryUserRoleSelect);
	}
	$memberDirectoryUserRoleSelect = get_option('memberDirectoryUserRoleSelect');

	//8.7.1
	if (isset($_POST['bulkremovetermfromglossarylist']))
	{
	    $bulkremovetermfromglossarylist = sanitize_text_field($_POST['bulkremovetermfromglossarylist']);
	    update_option("bulkremovetermfromglossarylist",$bulkremovetermfromglossarylist);
	}
	$bulkremovetermfromglossarylist = get_option("bulkremovetermfromglossarylist");
	//end 8.7.1

	$title = ' Enable / Disable Specific User Roles Show in User Member Directory ?';
	$content = '';
	
	$content .= '<form class="formmember_directory" name="formmember_directory" action="" method="POST">';
	
	$content .= '<select name="memberDirectoryUserRoleSelect" id="memberDirectoryUserRoleSelect">';
	$memberDirectoryUserRoleSelect = get_option('memberDirectoryUserRoleSelect');
	if ($memberDirectoryUserRoleSelect == 'enableMemberDirectoryUserRolesOption')
	{
		$content .= '<OPTION value="enableMemberDirectoryUserRolesOption" SELECTED>Enable These User Roles in Member Directory ?</OPTION>';
	}
	else
	{
		$content .= '<OPTION value="enableMemberDirectoryUserRolesOption" >Enable These User Roles in Member Directory ?</OPTION>';
	}
	
	if ($memberDirectoryUserRoleSelect == 'disableMemberDirectoryUserRolesOption')
	{
		$content .= '<OPTION value="disableMemberDirectoryUserRolesOption" SELECTED>Disable These User Roles in Member Directory ?</OPTION>';
	}
	else 
	{
		$content .= '<OPTION value="disableMemberDirectoryUserRolesOption">Disable These User Roles in Member Directory ?</OPTION>';
	}
	
	$content .= '</select> ';

	$content .= '<br /> ';
	
	$content .= show_member_user_roles();	

	//8.7.1
	$content .= "<br /> ";
	$content .= "<br /> ";
	
	$bulkremoveuseridfrommemberdirectory = get_option('bulkremovetermfromglossarylist');
	$content .=  __( "Bulk remove user from member directory by user id: ", 'wordpress-tooltips' );
	$bulkremoveuseridfrommemberdirectoryexampe = __("for example: 3,22,58,126,583", "wordpress-tooltips");
	$bulkremoveuseridfrommemberdirectoryexampe = "for example: 3,22,58,126,583";
	$content .=  '<input type="text" id="bulkremovetermfromglossarylist" name="bulkremovetermfromglossarylist" value="'.esc_attr($bulkremoveuseridfrommemberdirectory) .'" placeholder=" '.$bulkremoveuseridfrommemberdirectoryexampe.' ">';
	//end 8.7.1
	
	$content .= '<div style="margin:12px 0px;"> ';
	$content .= '<input type="submit" class="button-primary" id="memberDirectoryUserRoleSubmit" name="memberDirectoryUserRoleSubmit" value=" Submit ">';
	$content .= '</div> '; 
	$content .= '</form>';
	
	$content .= "<div style='margin:12px 12px;'>";
	$content .= "please use shortcode: [member_directory]";
	$content .= "</div>";
	$content .= "<div style='margin:12px 12px;'>";
	$content .= "how to use: <a href='https://tooltips.org/how-to-create-a-member-directory-via-wordpress-tooltip/' target='_blank'>How to Create a Member Directory Via WordPress Tooltip?</a>";
	$content .= "</div>";
	tomas_setting_panel_member_directory_free($title, $content);
}

function post_directory_panel_free()
{
    if (isset($_POST['postDirectorySelect']))
    {
        $postDirectorySelect = sanitize_text_field($_POST['postDirectorySelect']);
        update_option('postDirectorySelect',$postDirectorySelect);
    }
    $postDirectorySelect = get_option('postDirectorySelect');
    
    $title = '  Enable / Disable WordPress Post Directory ?';
    $content = '';
    
    $content .= '<form class="formmember_directory" name="formmember_directory" action="" method="POST">';
    
    $content .= '<select name="postDirectorySelect" id="postDirectorySelect">';
    $postDirectorySelect = get_option('postDirectorySelect');
    if ($postDirectorySelect == 'postDirectorySelectOption')
    {
        $content .= '<OPTION value="enablepostDirectorySelectOption" SELECTED>Enable Wordpress Post Directory ?</OPTION>';
    }
    else
    {
        $content .= '<OPTION value="enablepostDirectorySelectOption" >Enable WordPress Post Directory ?</OPTION>';
    }
    
    if ($postDirectorySelect == 'disablepostDirectorySelectOption')
    {
        $content .= '<OPTION value="disablepostDirectorySelectOption" SELECTED>Disable WordPress Post Directory ?</OPTION>';
    }
    else
    {
        $content .= '<OPTION value="disablepostDirectorySelectOption">Disable WordPress Post Directory ?</OPTION>';
    }
    
    $content .= '</select> ';
    
    $content .= '<br /> '; //19.1.8
    $content .= '<div style="margin:12px 0px;"> '; //19.1.8
    $content .= '<input type="submit" class="button-primary" id="postDirectorySubmit" name="postDirectorySubmit" value=" Submit ">';
    $content .= '</div> '; //19.1.8
    $content .= '</form>';
    
    $content .= "<div style='margin:12px 12px;'>";
    //$content .= "please use shortcode: [postdirectory]";
    $content .= "please use shortcode: [postdirectory] -- this will list all posts in one directory";
    $content .= "</div>";
    $content .= "<div style='margin:12px 12px;'>";
    $content .= "please use shortcode: [postdirectory limit=30] -- this will list 30 posts in post directory.";
    $content .= "</div>";
    $content .= "<div style='margin:12px 12px;'>";
    $content .= "please use shortcode: [postdirectory catid='38'] -- this will list all posts in the category that id = 38";
    $content .= "</div>";
    $content .= "<div style='margin:12px 12px;'>";
    $content .= "please use shortcode: [postdirectory catname='lesson'] -- this will list all posts in the category that name = lesson";
    $content .= "</div>";
    $content .= "<div style='margin:12px 12px;'>";
    $content .= "please use shortcode: [postdirectory catname='lesson' limit=10] -- this will list 10 posts in the category that name = lesson";
    $content .= "</div>";

    $content .= "<div style='margin:12px 12px;'>";
    $content .= "how to use: <a href='https://tooltips.org/how-to-create-a-wordpress-post-directory-quickly-supported-by-wordpress-tooltips-pro-plus-plugin-18-6-8/' target='_blank'>How to create a Wordpress post directory quickly?</a>";
    $content .= "</div>";
    tomas_setting_panel_member_directory_free($title, $content);
    
}


//9.1.7
function woocommerce_product_directory_panel_free()
{
    
    if (isset($_POST['woocommerceProductDirectorySelect']))
    {
        $woocommerceProductDirectorySelect = sanitize_text_field($_POST['woocommerceProductDirectorySelect']);
        update_option('woocommerceProductDirectorySelect',$woocommerceProductDirectorySelect);
    }
    $woocommerceProductDirectorySelect = get_option('woocommerceProductDirectorySelect');
    
    /*
     if (isset($_POST['woocommerceProductDirectorySubmit']))
     {
     messageBarFormember_directory_pro('Change Saved');
     }
     */
    
    $title = '  Enable / Disable Woocommerce Product Directory ?';
    $content = '';
    
    $content .= '<form class="formmember_directory" name="formmember_directory" action="" method="POST">';
    
    $content .= '<select name="woocommerceProductDirectorySelect" id="woocommerceProductDirectorySelect">';
    $woocommerceProductDirectorySelect = get_option('woocommerceProductDirectorySelect');
    if ($woocommerceProductDirectorySelect == 'enablewoocommerceProductDirectorySelectOption')
    {
        $content .= '<OPTION value="enablewoocommerceProductDirectorySelectOption" SELECTED>Enable Woocommerce Product Directory ?</OPTION>';
    }
    else
    {
        $content .= '<OPTION value="enablewoocommerceProductDirectorySelectOption" >Enable Woocommerce Product Directory ?</OPTION>';
    }
    
    if ($woocommerceProductDirectorySelect == 'disablewoocommerceProductDirectorySelectOption')
    {
        $content .= '<OPTION value="disablewoocommerceProductDirectorySelectOption" SELECTED>Disable Woocommerce Product Directory ?</OPTION>';
    }
    else
    {
        $content .= '<OPTION value="disablewoocommerceProductDirectorySelectOption">Disable Woocommerce Product Directory ?</OPTION>';
    }
    
    $content .= '</select> ';
    
    $content .= '<br /> '; //19.1.8
    $content .= '<div style="margin:12px 0px;"> '; //19.1.8
    $content .= '<input type="submit" class="button-primary" id="woocommerceProductDirectorySubmit" name="woocommerceProductDirectorySubmit" value=" Submit ">';
    $content .= '</div> '; //19.1.8
    $content .= '</form>';

    $content .= "<div style='margin:12px 12px;'>";
    //$content .= "please use shortcode: [productdirectory]";
    $content .= "please use shortcode: <b>[productdirectory]</b>  -- this will list all products in one directory";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro version: "."<i>please use shortcode: [productdirectory limit=30] -- this will list 30 products in one woocommerce directory.</i>";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro plus version: "."<i>please use shortcode: [productdirectory catid='38'] -- this will list all products in the woocommerce product category that id = 38</i>";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro plus version: "."<i>please use shortcode: [productdirectory catname='lesson'] -- this will list all products in the woocommerce product category that name = lesson</i>";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro plus version: "."<i>please use shortcode: [productdirectory catname='lesson' limit=10] -- this will list 10 products in the woocommerce product category that name = lesson</i>";
    $content .= "</div>";
    
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "please use shortcode: [productdirectory exclude_id='141,136'] -- this will exclude products from directory which product id = 136 or product id = 141";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro plus version: "."<i>please use shortcode: [productdirectory titlebackgroundcolor='yellow' contentbackgroundcolor = '#E6f412'] -- this will customize the background of directory title and content</i>";
    $content .= "</div>";
    
    $content .= "<div style='margin:12px 12px; color:gray'>";
    $content .= "pro plus version: "."<i>product price, exclude product...and more</i>";
    $content .= "</div>";
    
    
    
    $content .= "<div style='margin:12px 12px;'>";
    $content .= "how to use: <a href='https://tooltips.org/how-to-create-woocommerce-product-directory-in-2-minutes-supported-by-wordpress-tooltips-pro-plus-plugin-18-5-8/' target='_blank'>How to Create WooCommerce Product Directory in 2 Minutes?</a>";
    $content .= "</div>";
    tomas_setting_panel_member_directory_free($title, $content);
}


function messageBarFormember_directory($p_message)
{
    
    echo "<div id='message' class='updated fade'>";
    
    echo $p_message;
    
    echo "</div>";
    
}

