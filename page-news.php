<div class="page-content cover">
<div class="header">
  <div class="title"><?php get_template_part('templates/page', 'header'); ?></div>
  <div class="search"><?php get_search_form() ?></div>
</div>
</div>
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
    <a href=<?php the_permalink() ; ?>></a>
    <div class='post-card-cover'></div>
    <div class="seperate">
      <div class="no-pad img-container">
                <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();}            
            ?></div>
      <div class="post-card-content small-offset-1 small-10">
        <h4><?php the_title(); ?></h4>
        <p><?php
            the_content(__('Read more','avia_framework'));?></p>
      </div>
    </div>
  </div>
  
<?php endwhile; ?>
</div>
<?php echo get_next_posts_link( 'Older Entries', $wp_query->max_num_pages ); ?>
<?php echo get_previous_posts_link( 'Newer Entries' ); ?>

  <?php 
	// clean up after our query
	wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

