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
			if ( $wp_query->have_posts() ) :

				while ( $wp_query->have_posts() ) : the_post();

					get_template_part( 'parts/content');

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					
					the_post_navigation();

				endwhile;

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