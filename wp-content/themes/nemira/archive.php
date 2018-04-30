<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="page-header has-text-centered">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
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
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

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