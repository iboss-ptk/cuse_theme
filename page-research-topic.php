<?php get_template_part('templates/page', 'header'); ?>

<?php

	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	//"posts_per_page" =>1,
	"post_type" => "research",
	//'paged'=>$paged
  );
	$wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>

  <header>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h1>
   </header>
      <?php the_content(); ?>
  
<?php endwhile; ?>
<?php 
      //echo get_next_posts_link( 'Older Entries', $wp_query->max_num_pages ); 
      //echo get_previous_posts_link( 'Newer Entries' ); 
      ?>

  <?php 
	// clean up after our query
	wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>