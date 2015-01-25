<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_field('image'); ?>
      <?php the_field('name'); ?>
      <?php the_field('education'); ?>
      <?php the_field('research'); ?>
      <?php the_field('contact'); ?>
      <?php the_field('subject'); ?>
      <?php the_field('research_topic'); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
