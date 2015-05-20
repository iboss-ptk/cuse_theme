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
          
          <div style="padding-bottom:5em;">
            <?php the_content();?>
          </div>

          <div class="row" style="padding-bottom:2em;">
            <div class="small-12 large-6 columns">
          <?php 
          $terms = get_the_terms( $post->ID, 'tags' );
          $style = 'border: 2px solid #8f131a; padding: 5px 5px; padding-top: 8px;margin-right:0.25em;color:#8f131a;';
            
          if($terms!=''){
            
            foreach ( $terms as $term ) {

                // The $term is an object, so we don't need to specify the $taxonomy.
                $term_link = get_term_link( $term );
               
                // If there was an error, continue to the next term.
                if ( is_wp_error( $term_link ) ) {
                    continue;
                }

                // We successfully got a link. Print it out.
                echo '<a style="'.$style.'"href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
            }
          }

          
          ?>

          </div>
            <div class="small-12 large-5 columns  right" >
              <div class="right">
                <?php echo get_the_date( 'F j, Y g:i a' ); ?>
<!--           <?php echo getPostViews(get_the_ID());?> -->
                <?php setPostViews(get_the_ID());?>

              </div>
            </div>
            
        </div>
            

          
          
        </div>
        <footer>
          <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          
        </footer>
        <hr>
        <div class="row" style="padding-bottom:5em;">
            <div class="small-12 large-6 columns">
              <div class="left"><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
            </div>
            <div class="small-12 large-5 columns  right" >
              <div class="right"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
            </div>
            
        </div>
        

        <?php comments_template('/templates/comments.php'); ?>
      </article>
    </div>
  <?php endwhile; ?>
</section>