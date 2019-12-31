<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$loginCheck = is_user_logged_in();
?>

<div class="entry-content">
	<?php $postType = get_post_type(); ?>
		<?php if ($postType === "post") { ?>
			<div class="post-title">
				<h1>
					<?php echo get_the_title(); ?>
				</h1>
			</div>
		<?php } ?>
		<?php $url = get_post_meta($postId, "_artunlimited_inner_srcUrl", true); ?>
		<div class="post-content">
			<?php 
			the_content();
			?>
		</div>
	<?php
	
	wp_link_pages(
		[
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-rig' ),
			'after'  => '</div>',
		]
	);
	?>
<!--Social Buttons-->
<div id="social_button_container">
	<a id="social-icon-links" href="<?= get_permalink(); ?>"></a>
</div>
</div><!-- .entry-content -->
