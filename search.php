<section class="page-content bg-handmouse">
<div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">

  <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>

    <div class="search">
      <form role="search" method="get" class="search" action="http://www.cp.eng.chula.ac.th/se/">
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
 
<div class="news-container">

<?php

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	// $args = array(
	// "posts_per_page" =>12,
	// "post_type" => "news",
	// 'paged'=>$paged);
	// $wp_query = new WP_Query($args);

  global $query_string;

  $query_args = explode("&", $query_string);
  $search_query = array();

  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  } // foreach

  $search = new WP_Query($search_query);

  ?>
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
<p class="text-center" style="margin-top:-200px;"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
</div>
</section>