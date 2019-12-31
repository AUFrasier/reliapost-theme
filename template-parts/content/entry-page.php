<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>


<section id="content">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
        <?php the_content(); ?>
   </article><!-- #post-<?php the_ID(); ?> -->
</section>
