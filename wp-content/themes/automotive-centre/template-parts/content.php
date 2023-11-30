<?php
/**
 * The template part for displaying post
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>
<?php 
  $automotive_centre_archive_year  = get_the_time('Y'); 
  $automotive_centre_archive_month = get_the_time('m'); 
  $automotive_centre_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box wow zoomInUp delay-1000" data-wow-duration="2s">
    <?php $automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_blog_layout_option','Default');
    if($automotive_centre_theme_lay == 'Default'){ ?>
      <div class="row m-0">
        <?php if(has_post_thumbnail() && get_theme_mod( 'automotive_centre_featured_image_hide_show',true) == 1) {?>
          <div class="box-image col-lg-6 col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <div class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'automotive_centre_featured_image_hide_show',true) == 1) { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <?php if( get_theme_mod( 'automotive_centre_toggle_postdate',true) == 1 || get_theme_mod( 'automotive_centre_toggle_author',true) == 1 || get_theme_mod( 'automotive_centre_toggle_comments',true) == 1 || get_theme_mod( 'automotive_centre_toggle_time',true) == 1) { ?>
            <div class="post-info">
              <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $automotive_centre_archive_year, $automotive_centre_archive_month, $automotive_centre_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span>
              <?php } ?>

              <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
              <?php } ?>

              <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
              <?php } ?>

              <?php if(get_theme_mod('automotive_centre_toggle_time',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
              <?php } ?>
              <hr>
            </div>      
          <?php } ?>
          <div class="entry-content">
            <p>
              <?php $automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_excerpt_settings','Excerpt');
              if($automotive_centre_theme_lay == 'Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($automotive_centre_theme_lay == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $automotive_centre_excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $automotive_centre_excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('automotive_centre_excerpt_suffix',''));?>
                <?php }?>
              <?php }?>
            </p>
          </div>
          <?php if( get_theme_mod('automotive_centre_button_text','Read More') != ''){ ?>
            <div class="more-btn">
              <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?></span></a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }else if($automotive_centre_theme_lay == 'Center'){ ?>
      <div class="service-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'automotive_centre_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
         <?php } ?>
        <?php if( get_theme_mod( 'automotive_centre_toggle_postdate',true) == 1 || get_theme_mod( 'automotive_centre_toggle_author',true) == 1 || get_theme_mod( 'automotive_centre_toggle_comments',true) == 1 || get_theme_mod( 'automotive_centre_toggle_time',true) == 1) { ?>
          <div class="post-info">
            <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $automotive_centre_archive_year, $automotive_centre_archive_month, $automotive_centre_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_time',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>      
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_excerpt_settings','Excerpt');
            if($automotive_centre_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($automotive_centre_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $automotive_centre_excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $automotive_centre_excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('automotive_centre_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('automotive_centre_button_text','Read More') != ''){ ?>
          <div class="more-btn">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($automotive_centre_theme_lay == 'Left'){ ?>
      <div class="service-text">
        <?php if( get_theme_mod( 'automotive_centre_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
         <?php } ?>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'automotive_centre_toggle_postdate',true) == 1 || get_theme_mod( 'automotive_centre_toggle_author',true) == 1 || get_theme_mod( 'automotive_centre_toggle_comments',true) == 1 || get_theme_mod( 'automotive_centre_toggle_time',true) == 1) { ?>
          <div class="post-info">
            <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $automotive_centre_archive_year, $automotive_centre_archive_month, $automotive_centre_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span><span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> 
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_time',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('automotive_centre_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>      
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_excerpt_settings','Excerpt');
            if($automotive_centre_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($automotive_centre_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $automotive_centre_excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $automotive_centre_excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('automotive_centre_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('automotive_centre_button_text','Read More') != ''){ ?>
          <div class="more-btn">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('automotive_centre_button_text',__('Read More','automotive-centre')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</article>