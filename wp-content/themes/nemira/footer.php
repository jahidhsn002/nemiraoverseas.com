
	<footer class="footer">
		<?php
			wp_nav_menu([
				'theme_location' => 'footer',
				'menu_id'        => 'footer-menu'
			]);
		?>
	</footer>
	</main>
	<footer class="copyright container has-text-centered">
		<h5 class="title is-6">Copyright <?php echo bloginfo('name'); ?>, 2017 | All Rights Reserved | Developed By: Hub IT Solutions</h5>
		<h5 class="title is-6">Visitor Counter:	150468 good hits</h5>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>