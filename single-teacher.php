<?php
  function the_fieldx($field) {
    if (get_field($field)) {
      the_field($field);
    } else {
      echo "<p><i>N/A</i></p>";
    }
  }
?>

<section class="page-content bg-handmouse">
 <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">
  <?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="row">
      <div class="small-12 medium-3 columns">
        <img src="<?php echo get_field('image')["sizes"]["large"]; ?>" >
      </div>
      <div class="small-12 medium-9 columns">
        <header>
          <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div style="margin-top:-45px;margin-bottom:45px;"><h5><?php echo get_field('name_eng'); ?></h5></div>
        </header>
      </div>
    </div>
    <hr>
    <div style="margin-top:50px">
      <h4>education</h4>
      <?php the_fieldx('education'); ?>

      <h4>interests</h4>
      <?php the_fieldx('interests'); ?>

      <h4>contact</h4>
      <?php the_fieldx('contact'); ?>

      <h4>teaching</h4>
      <?php the_fieldx('subject'); ?>

      <h4>journal articles</h4>
      <?php the_fieldx('journal_articles'); ?>

      <h4>conferences/workshops</h4>
      <?php the_fieldx('conferences/workshops'); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>

</div>
</section>