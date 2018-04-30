<?php get_header(); ?>

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

					get_template_part( 'parts/content', 'page');

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