<?php get_header(); ?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header has-text-centered">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header has-text-centered">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div class="columns is-gapless">
		<div class="column is-2 sidebar">
			<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
			    <?php dynamic_sidebar( 'left-sidebar' ); ?>
			<?php endif; ?>
		</div>
		<main class="column is-8">
			<div class="contentArea">

			<?php
			if ( $wp_query->have_posts() ) :

				while ( $wp_query->have_posts() ) : the_post();

					get_template_part( 'parts/content', 'excerpt');

				endwhile;

				the_posts_pagination();

			else :

				get_template_part( 'parts/content', 'none' );

			endif;
			?>

			</div>
		</main>
		<div class="column is-2 sidebar">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			    <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>