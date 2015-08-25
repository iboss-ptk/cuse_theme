<section class="page-content bg-handmouse">
<div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">
	
  <?php while (have_posts()) : the_post(); ?>

  	 <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    
    </div>

    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>
  </div>
</div>