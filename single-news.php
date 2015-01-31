<?php while (have_posts()) : the_post(); ?>
  <div class="page-content">
  <div class="large-offset-2 large-8 small-offset-1 small-10">
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
       <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();}            
            ?>
    </header>
    <div class="entry-content">
          <?php the_content();?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
     <?php previous_post_link( '%link', '&larr; %title' ); ?>
    <?php next_post_link( '%link', '%title &rarr;' ); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
</div>
</div>
<?php endwhile; ?>
