<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_field('subject_code'); ?>
      <?php the_field('credits'); ?>
      <?php the_field('subject_name_thai'); ?>
      <?php the_field('subject_name_eng'); ?>
      <?php the_field('subject_description_thai'); ?>
      <?php the_field('subject_description_eng'); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
