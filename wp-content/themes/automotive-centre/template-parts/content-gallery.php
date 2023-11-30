<?php
/**
 * The template part for displaying gallery
 *
 * @package Automotive Centre 
 * @subpackage automotive_centre
 * @since Automotive Centre  1.0
 */
?>
<?php 
  $automotive_centre_archive_year  = get_the_time('Y'); 
  $automotive_centre_archive_month = get_the_time('m'); 
  $automotive_centre_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box wow zoomInUp delay-1000" data-wow-duration="2s">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'automotive_centre_toggle_postdate',true) == 1 || get_theme_mod( 'automotive_centre_toggle_author',true) == 1 || get_theme_mod( 'automotive_centre_toggle_comments',true) == 1 || get_theme_mod( 'automotive_centre_toggle_time',true) == 1 ) { ?>
        <div class="post-info">
          <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $automotive_centre_archive_year, $automotive_centre_archive_month, $automotive_centre_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_time',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('automotive_centre_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
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
</article>




