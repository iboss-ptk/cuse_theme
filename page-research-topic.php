<section class="page-content bg-handmouse">
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">

  <?php while (have_posts()) : the_post(); ?>

     <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>
    <div style="display:inline-block;">
    <?php get_template_part('templates/content', 'page'); ?>
    </div>
  <?php endwhile; ?>
  </div>
</div>
