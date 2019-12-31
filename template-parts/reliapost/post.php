<?php
/**
 * Template part for displaying a post for ReliaPost
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
    <div class="entry-content">
        <?php
        get_template_part( 'template-parts/content/entry_header', get_post_type() );
        ?>
        <div class="post-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php 
                the_post();
                the_content(); 
            ?>
        <?php endwhile; endif; ?>

        </div>
        <!--Social Buttons-->
        <div id="social_button_container">
            <a id="social-icon-links" href="<?= get_permalink(); ?>"></a>
        </div>
        <?php
        //get_template_part( 'template-parts/content/entry_footer', get_post_type() );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->