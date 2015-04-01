<section class="page-content bg-handmouse">
<div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">

  <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>

<<<<<<< HEAD
<div class="search">
  <form role="search" method="get" class="search" action="http://cuse.dev/">
    <div class="row">
      <div class="small-12 columns">
        <div class="row collapse">
          <div class="small-8 columns">
            <input type="hidden" name="post_type" value="news" />
            <input type="text" value="" name="s" placeholder="Enter the keywords...">
          </div>
          <div class="small-4 columns">
            <button type="submit" class="button expand postfix">Search</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- <?php get_search_form() ?> -->
</div>
=======
<div class="search"><?php get_search_form() ?></div>
<?php 
         $args = array( 'orderby'    => 'count','order' => 'DESC','hide_empty=0','number' =>'10'  );
>>>>>>> efac983652e5aa89220a7b4a856a42e958989391

      $terms = get_terms( 'tags', $args );
      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
          $count = count( $terms );
          $i = 0;
          $term_list = '<p class="news-archive">';
          foreach ( $terms as $term ) {
              $i++;
            if($term->name!="First"&&$term->name!="Second"&&$term->name!="Third"){
                $term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all news filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
                if ( $count != $i ) {
                      $term_list .= ' ';
                  }
                  else {
                      $term_list .= '</p>';
                  }
              }
          }
          echo $term_list;
      }
  ?>
 
<div class="news-container">

<?php

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	"posts_per_page" =>12,
	"post_type" => "news",
	'paged'=>$paged);
	$wp_query = new WP_Query($args);?>
  <?php if ( $wp_query->have_posts() ) : ?>
  <div class="masonry js-masonry"  data-masonry-options='{ "isFitWidth": true }'>   
  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>
 
            
  <div class="post-card item">
    
    <div class='post-card-cover'></div>
    
    <div class="seperate">
      <a href=<?php the_permalink() ; ?>>
      <div class="no-pad img-container">
                <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();}            
            ?></div>
          </a>
      <div class="post-card-content small-offset-1 small-10">
        <a href=<?php the_permalink() ; ?>>
        <h4><?php the_title(); ?></h4>
        </a>
        <p><?php
            the_content(__('Read more','avia_framework'));?></p>
         <p>  <?php echo get_the_term_list( $post->ID, 'tags', '<b>tags:</b> ', ', ', '' ); ?></p>
      </div>
    </div>
  </div>
  
<?php endwhile; ?>

</div>
 <!-- end of the loop -->

    <!-- pagination here -->
    <?php
      
        custom_pagination($wp_query->max_num_pages,2,$paged);
    ?>

<!--<?php echo get_next_posts_link( 'Older Entries', $wp_query->max_num_pages ); ?>
<?php echo get_previous_posts_link( 'Newer Entries' ); ?>-->

  <?php 
	// clean up after our query
	wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
</div>
</section>