<?php
/**
 * The template part for displaying image post
 *
 * @package VW Car Rental
 * @subpackage vw-car-rental
 * @since VW Car Rental 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="entry-content">
        <h1 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>   
        <div class="entry-attachment">
            <div class="attachment">
                <?php vw_car_rental_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content"><p><?php $vw_car_rental_excerpt = get_the_excerpt(); echo esc_html( vw_car_rental_string_limit_words( $vw_car_rental_excerpt, esc_attr(get_theme_mod('vw_car_rental_excerpt_number','30')))); ?></p></div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'vw-car-rental' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'vw-car-rental' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <div class="clearfix"></div>
</article>