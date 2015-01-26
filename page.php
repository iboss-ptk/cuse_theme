<div class="page-content">
	<div class="large-offset-2 large-8 small-offset-1 small-10">
	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/page', 'header'); ?>
	  <?php get_template_part('templates/content', 'page'); ?>
	<?php endwhile; ?>
	</div>
</div>