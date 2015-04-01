<section class="page-content bg-handmouse">
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">

    <div class="cover-title">
      <?php get_template_part('templates/page', 'header'); ?>
    </div>

    <div class="search"><?php get_search_form() ?></div>

    <div class="news-container">
      
        <div class="masonry js-masonry"  data-masonry-options='{ "isFitWidth": true }'>   
            <?php
              $args = array(
                "posts_per_page" =>20,
                "post_type" => "research",
                );
                $wp_query = new WP_Query($args);?>
                
                <?php if ( $wp_query->have_posts() ) : ?>
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>

            <div class="post-card item">
              <a href=<?php the_permalink() ; ?>></a>
              <div class='post-card-cover'></div>

              <div class="seperate">
                    <div class="post-card-content small-offset-1 small-10">
                      <h4><?php the_title(); ?></h4>
                      <p>
                  <?php the_field('name'); ?>
                  <?php the_field('description'); ?>
                  <?php the_field('student_info'); ?>
                  <?php the_field('adviser_info'); ?>
                  <?php the_field('year'); ?>

                      </p>
                    </div>
                  </div>
              </div>
                
              <?php endwhile; ?>

  <?php endif; ?>


          </div>


        </div>
      </div>
      </section>