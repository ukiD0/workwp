<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Automobile Lite
 * @subpackage vw-automobile-lite
 * @since VW Automobile Lite 1.0
 */
?>
<?php 
  $vw_automobile_lite_archive_year  = get_the_time('Y'); 
  $vw_automobile_lite_archive_month = get_the_time('m'); 
  $vw_automobile_lite_archive_day   = get_the_time('d'); 
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="grid-post-main-box wow zoomInDown delay-1000" data-wow-duration="2s">
	    	<?php if( get_theme_mod( 'vw_automobile_lite_featured_image_hide_show',true) == 1) { ?>
			    <div class="box-image">
			        <?php 
			            if(has_post_thumbnail()) { 
			              the_post_thumbnail(); 
			            }
			        ?>
		        </div>
		    <?php } ?>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
	        <?php if( get_theme_mod( 'vw_automobile_lite_grid_postdate',true) == 1 || get_theme_mod( 'vw_automobile_lite_grid_author',true) == 1 || get_theme_mod( 'vw_automobile_lite_grid_comments',true) == 1) { ?>
	          <div class="metabox">
	            <?php if(get_theme_mod('vw_automobile_lite_grid_postdate',true)==1){ ?>
	              <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_grid_postdate_icon','fas fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_automobile_lite_archive_year, $vw_automobile_lite_archive_month, $vw_automobile_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_automobile_lite_grid_post_meta_field_separator'));?></span>
	            <?php } ?>

	            <?php if(get_theme_mod('vw_automobile_lite_grid_author',true)==1){ ?>
	              <span class="entry-author">
	              	<i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_grid_author_icon','far fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span><span><?php echo esc_html(get_theme_mod('vw_automobile_lite_grid_post_meta_field_separator'));?></span>
	            <?php } ?>

	            <?php if(get_theme_mod('vw_automobile_lite_grid_comments',true)==1){ ?>
	              <span class="entry-comments">
	              	<i class="<?php echo esc_attr(get_theme_mod('vw_automobile_lite_grid_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-automobile-lite'), __('0 Comments','vw-automobile-lite'), __('% Comments','vw-automobile-lite')); ?></span>
	            <?php } ?>
	          </div>
        	<?php } ?>

	        <div class="new-text">
	          <div class="entry-content">
	          	<p>
	            	<?php $vw_automobile_lite_excerpt = get_the_excerpt(); echo esc_html( vw_automobile_lite_string_limit_words( $vw_automobile_lite_excerpt, esc_attr(get_theme_mod('vw_automobile_lite_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_automobile_lite_grid_excerpt_suffix','') ); ?>
	             </p>
	          </div>
	        </div>
	        <?php if( get_theme_mod('vw_automobile_lite_grid_button_text','Read More') != ''){ ?>
		    		<div class="content-bttn">
		            <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_automobile_lite_grid_button_text',__('Read More','vw-automobile-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_automobile_lite_grid_button_text',__('Read More','vw-automobile-lite')));?></span></a>
		        </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>