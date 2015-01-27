<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_field('image'); ?>
      <?php the_field('name_thai'); ?>
      <?php the_field('name_eng'); ?>
      <?php the_field('education'); ?>
      <?php the_field('interests'); ?>
      <?php the_field('contact'); ?>
      <?php the_field('subject'); ?>
      <?php the_field('journal_articles'); ?>
      <?php the_field('conferences/workshops'); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
