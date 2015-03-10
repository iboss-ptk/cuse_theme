<section class="page-content bg-handmouse">
<?php while (have_posts()) : the_post(); ?>
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">
  <article <?php post_class(); ?>>
    <header class='news-header'>
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
      <div style="height: 50px"></div>
     <div style="float: left;"><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
    <div style="float: right;"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
    </footer>

    <?php comments_template('/templates/comments.php'); ?>
  </article>
</div>
<?php endwhile; ?>
</section>