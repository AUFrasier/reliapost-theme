<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
	if ( ! wp_rig()->is_amp() ) {
		?>
		<script>document.documentElement.classList.remove( 'no-js' );</script>
		<?php
	}
	?>

	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/8ad5d35c6d.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-rig' ); ?></a>
	
<header id="side-header">
	<div class="site-branding">
			<a class="site-logo" href="/"><img alt="Site Logo" src="/wp-content/uploads/2019/12/ReliaPost_LOGO_HORIZONTAL_COLOR_HORIZONTAL_COLOR.png"/></a>
	</div><!-- .site-branding -->

	<?php //get_template_part( 'template-parts/header/branding' ); ?>

	<?php get_template_part( 'template-parts/header/navigation' ); ?>
</header><!-- #side-header -->
<main id="main" role="main" class="site-main">