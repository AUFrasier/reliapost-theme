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
<div id="social_button_container"></div>
<?php
$user = wp_get_current_user()->data;
$userID = $user->ID;
$user_info = get_userdata( $userID );
$type = $user_info->roles[0];
$stripeController = new \reliapost_registration\StripeController();
$stripeToken = $stripeController->getStripeToken();
$sub = $stripeController->getSubscriptionDetails($stripeToken);
$status = $sub->status;
$cancelledSubs = [];
if (is_page('homes') || is_page('my-account')) {
    if ($type == "subscriber") {
        $json_data = json_encode($stripeController->getCancelledSubs($stripeToken));
        $decoded = json_decode($json_data);
        $cancelledSubsTotal = count($decoded->data);
        $cancelledSubs = $stripeController->getCancelledSubs($stripeToken);
    }
}
?>

<?php if ($cancelledSubsTotal >= 1 && $status == null): ?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".post").hide();
		jQuery( ".fusion-text" ).append( "<p style='color:red; font-size: 25px;'>Your account has been canceled.  Please visit the My Account page to renew your account.  Thank you!.</p>" );
	});
	</script>
<?php endif; ?>
<?php if (!is_front_page()) { ?>
	<style>
		@media only screen and (max-width: 1000px) {
			#main {
				padding: 0 !important;
			}
		}
	</style>
<?php } ?>
<?php
get_footer();
?>
</div><!-- .entry-content -->
