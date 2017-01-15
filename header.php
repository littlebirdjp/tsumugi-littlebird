<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tsumugi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<meta property="og:type" content="blog">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<?php if ( is_home() ) { ?>
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>">
<?php } elseif ( is_page() || is_single() ) { ?>
<meta property="og:title" content="<?php the_title( '', ' &#8211; ' ) . bloginfo( 'name' ); ?>">
<meta name="twitter:title" content="<?php the_title( '', ' &#8211; ' ) . bloginfo( 'name' ); ?>">
<?php } else { ?>
<?php $archive_title = get_the_archive_title(); ?>
<meta property="og:title" content="<?php echo wp_kses($archive_title, array()); ?> &#8211; <?php bloginfo( 'name' ); ?>">
<meta name="twitter:title" content="<?php echo wp_kses($archive_title, array()); ?> &#8211; <?php bloginfo( 'name' ); ?>">
<?php } ?>
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<meta property="twitter:description" content="<?php bloginfo( 'description' ); ?>">
<meta property="og:url" content="<?php echo esc_url( home_url() ) . $_SERVER["REQUEST_URI"]; ?>">
<meta name="twitter:url" content="<?php echo esc_url( home_url() ) . $_SERVER["REQUEST_URI"]; ?>">
<?php if ( is_single() ) { ?>
<?php if(has_post_thumbnail()) { ?>
<meta property="og:image" content="<?php get_featured_image_url(); ?>">
<meta property="twitter:image" content="<?php get_featured_image_url(); ?>">
<?php } else { ?>
<meta property="og:image" content="<?php echo esc_url( home_url( '/' ) ); ?>img/ogimage.png">
<meta property="twitter:image" content="<?php echo esc_url( home_url( '/' ) ); ?>img/ogimage.png">
<?php } ?>
<?php } else { ?>
<meta property="og:image" content="<?php echo esc_url( home_url( '/' ) ); ?>img/ogimage.png">
<meta property="twitter:image" content="<?php echo esc_url( home_url( '/' ) ); ?>img/ogimage.png">
<?php } ?>
<meta property="fb:admins" content="youthkee">
<meta property="fb:app_id" content="1511260485840721">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@youthkee">
<meta name="twitter:domain" content="littlebird.mobi">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#40a9cb">
<meta name="theme-color" content="#ffffff">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50835-7', 'auto');
  ga('send', 'pageview');
</script>

</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tsumugi' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav id="site-navigation" class="main-navigation navbar navbar-light" role="navigation">
			<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#primary-menu">
				&#9776;
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu collapse navbar-toggleable-sm' ) ); ?>
		</nav><!-- #site-navigation -->

	<div class="container">

		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><br class="hidden-md-up"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<p class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><br class="hidden-md-up"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<?php if ( get_header_image() ) : ?>
				<div class="custom-header">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</div>
			<?php endif; // End header image check. ?>

		</div><!-- .site-branding -->

	</div><!-- .container -->

	</header><!-- #masthead -->

	<div class="container">

	<div id="content" class="site-content">
