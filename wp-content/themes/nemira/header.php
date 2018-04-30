<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/editor-style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header">
		<div class="searchTop">
			<div class="container has-text-right">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="container has-text-centered headerBody">
			<div class="columns is-gapless">
				<div class="column is-2">
					<figure class="image logo">
						<?php the_custom_logo(); ?>
					</figure>
				</div>
				<div class="column is-8">
					<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="title is-3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<h1 class="title is-3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="title is-6"><?php echo $description; ?></p>
						<?php endif;
					?>
				</div>
				<div class="column is-2">
					<?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
					    <?php dynamic_sidebar( 'top-sidebar' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="borderBottom"></div>
	</header>
	<section class="nav container">
		<nav class="navbar is-transparent">
			<div class="navbar-brand">
			    <!--<a class="navbar-item" href="https://bulma.io">
			      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
			    </a> -->
			    <div class="navbar-burger burger" data-target="mainNavbar">
			      <span></span>
			      <span></span>
			      <span></span>
			    </div>
			</div>
			<div id="mainNavbar" class="navbar-menu">
			  	<?php
					wp_nav_menu([
						'theme_location' => 'top',
						'menu_id'        => 'top-menu',
						'menu_class'	=> 'navbar-start',
						'walker' => new WPDocs_Walker_Nav_Menu()
					]);
				?>
			</div>
		</nav>
	</section>
	<main class="container main">