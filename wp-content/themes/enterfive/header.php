<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enterfive
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/x-icon" href="http://blog.enterfive.com/wp-content/uploads/2017/03/e5_front_favicon.png">
	<link rel="apple-touch-icon" href="http://blog.enterfive.com/wp-content/uploads/2017/03/e5_front_favicon.png"/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'enterfive' ); ?></a>

	<header id="masthead" class="site-header">


		<nav class="navbar navbar-default" role="navigation">
			<div class="container head-pad">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
		        		<span class="icon-bar"></span>
		        		<span class="icon-bar"></span>
		        		<span class="icon-bar"></span>
					</button>
		    		<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="E5_Logo" />
		        	</a>
				</div>
		        <?php
		        wp_nav_menu( array(
		            'theme_location'    => 'menu-1',
		            'depth'             => 2,
		            'container'         => 'div',
		            'container_class'   => 'collapse navbar-collapse unb-reg',
		            'container_id'      => 'bs-example-navbar-collapse-1',
		            'menu_class'        => 'nav navbar-nav navbar-center unb-reg',
		            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		            'walker'            => new WP_Bootstrap_Navwalker())
		        );
		        ?>

						<ul class="nav navbar-nav navbar-right social-nav" style="padding-top: 0px !important;">
	            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/fb-head.png" /></a></li>
	            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/twi-head.png" /></a></li>
	            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/ig-head.png" /></a></li>

	          </ul>
		    </div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
