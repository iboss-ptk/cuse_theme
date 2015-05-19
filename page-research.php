<section class="page-content bg-handmouse">
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt" style="height:95em;">

    <div class="cover-title">
      <?php get_template_part('templates/page', 'header'); ?>
    </div>

    <div class="search"><?php get_search_form() ?></div>


            <?php
              $args = array(
                "posts_per_page" =>20,
                "post_type" => "research",
                );
                $wp_query = new WP_Query($args);?>
                
                

                

    <div class="research-container">
        <?php if ( $wp_query->have_posts() ) : ?>
        <div class="cardresearch"   >   
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>
            

              <div class="post-card item">

                  <div class="large-4 small-12 column" style="padding-top:4em;">
                   <div class="no-pad img-container">
                    <a href=<?php the_permalink() ; ?>>
                        <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail();}            
                    ?></a>
                    </div>
                  </div>
                  <div class="large-8 small-12 column">
                    <div class="post-card-content">
                      <a href=<?php the_permalink() ; ?>>
                          <h4><?php the_field('name_thai'); ?><br>(
                          <?php the_field('name_eng'); ?>)</h4>
                      </a>
                          <p>
                      <?php 
                      $content = get_field('description'); 
                      //echo apply_filters('the_content',$content);
                      echo substr($content,0,1000)."...";
                      ?>

                      <a href=<?php the_permalink() ; ?>>see more</a>
                      <br><br>
                      Student: <?php the_field('student_name'); ?> <br>

                      Advisor: <?php the_field('adviser_name'); ?><br>
                      Year: <?php the_field('year'); ?><br>

                          </p>

                      
                    </div>
                  </div>
                
              </div>
              <?php endwhile; ?>
          </div>


        </div>

              
              <?php endif; ?>
      </div>
      </section>
