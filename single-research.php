<section class="page-content bg-handmouse">
  <?php while (have_posts()) : the_post(); ?>
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">
    <article <?php post_class(); ?>>
      <header class='news-header'>
        <h1 class="entry-title">
          <!-- <b>Research:</b> --> <?php the_field('name'); ?>
        </h1>
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail();}
          ?>
      </header>
        <div class="entry-content">
          <h4 >Description: </h4><hr>
          <div class="item-content"><?php the_field('description'); ?></div>

          <h4>Student information: </h4><hr>
           <div class="item-content"><?php the_field('student_name'); ?></div>
          <h4>Advisor: </h4><hr>
           <div class="item-content"><?php the_field('adviser_name'); ?></div>
          <h4>Year:</h4><hr>
           <div class="item-content"><?php the_field('year'); ?></div>

        </div>
        <footer>
          <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
          <div style="height: 50px"></div>
          <div style="float: left;"><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
          <div style="float: right;"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
        </footer>

        <?php comments_template('/templates/comments.php'); ?>
      </article>
    </div>
  <?php endwhile; ?>
</section>

<!-- HEY research from boss pattern-->
