<?php
/**
 * The template part for header
 *
 * @package VW Car Rental 
 * @subpackage vw_car_rental
 * @since VW Car Rental 1.0
 */
?>
<?php
  $vw_car_rental_search_hide_show = get_theme_mod( 'vw_car_rental_search_hide_show' );
  if ( 'Disable' == $vw_car_rental_search_hide_show ) {
   $colmd = 'col-lg-7 col-md-6';
  } else { 
   $colmd = 'col-lg-6 col-md-4 col-6';
  } 
?>

<div class="main-header <?php if( get_theme_mod( 'vw_car_rental_sticky_header', false) == 1 || get_theme_mod( 'vw_car_rental_stickyheader_hide_show', false) == 1) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container header-border">
    <div class="row m-0">
      <div class="col-lg-3 col-md-4 align-self-lg-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_car_rental_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_car_rental_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_car_rental_tagline_hide_show',false) == 1){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="<?php echo esc_html( $colmd ); ?> p-0 align-self-lg-center">
        <?php get_template_part( 'template-parts/header/navigation' ); ?>
      </div>
      <?php if ( 'Disable' != $vw_car_rental_search_hide_show ) {?>
        <div class="col-lg-1 col-md-1 col-6 align-self-lg-center">
          <div class="search-box">
             <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_car_rental_search_icon','fas fa-search')); ?>"></i></a></span>
          </div>
        </div>
      <?php } ?>
      <div class="serach_outer">
        <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_car_rental_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 align-self-lg-center">
        <div class="phone-no">
          <?php if(get_theme_mod('vw_car_rental_phone') != ''){ ?>
            <span><i class="<?php echo esc_attr(get_theme_mod('vw_car_rental_phone_icon','fas fa-phone')); ?>"></i><a href="tel:<?php echo esc_attr( get_theme_mod('vw_car_rental_phone','') ); ?>"><?php echo esc_html(get_theme_mod('vw_car_rental_phone',''));?></a></span>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>