
<?php get_template_part('templates/page', 'header'); ?>
<div ng-app>
<?php
  
	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	"posts_per_page" =>30,
	"post_type" => "subject",
	//'paged'=>$paged
  );
	$wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
  <div ng-init="subjects=[
  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>
    {
      'title':'<?php the_title(); ?>',
      'subject_code':'<?php the_field("subject_code"); ?>',
      'credits':'<?php the_field("credits"); ?>',
      'subject_name_thai':'<?php the_field("subject_name_thai"); ?>',
      'subject_name_eng':'<?php the_field("subject_name_eng"); ?>',
      'subject_description_eng':'<?php the_field("subject_description_eng"); ?>',
      'subject_description_thai':'<?php the_field("subject_description_thai"); ?>',
    },
  <?php endwhile; ?>
  ]"></div>
<!--   <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>

  <header>
      <h4 class="entry-title"><?php the_title(); ?></h1>
   </header>

   {{subject[0]}}

      <?php the_field('subject_code'); ?>
      <?php the_field('credits'); ?>
      <?php the_field('subject_name_thai'); ?>
      <?php the_field('subject_name_eng'); ?>
      <?php the_field('subject_description_thai'); ?>
      <?php the_field('subject_description_eng'); ?>
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
<?php endif; ?> -->

<br><br><br><br>
<input type="search" ng-model="q" placeholder="filter..." />
  <div ng-repeat="subject in subjects | filter:q as results">
    <h4 class="entry-title" ng-bind="subject['title']"></h4>
    <p ng-bind="subject['subject_description_thai']"></p>
  </div>
</div>

