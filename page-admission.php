<?php get_template_part('templates/page', 'header'); ?>


<!-- ปฏิทินการรับสมัคร-->
<?php

  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
  "post_type" => "admission",
  "name" => "ปฏิทินการรับสมัคร",
  //'paged'=>$paged
  );
  $wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
  <?php $wp_query->the_post(); // Start the Loop.?>
  <header>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
   </header>
      <?php the_content(); ?>
  <?php 
  // clean up after our query
  wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<!-- คุณสมบัติผู้สมัคร-->
<?php

  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
  "post_type" => "admission",
  "name" => "คุณสมบัติผู้สมัคร",
  //'paged'=>$paged
  );
  $wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
  <?php $wp_query->the_post(); // Start the Loop.?>
  <header>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
   </header>
      <?php the_content(); ?>
  <?php 
  // clean up after our query
  wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<!-- วิธีการรับสมัคร-->
<?php

  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
  "post_type" => "admission",
  "name" => "วิธีการรับสมัคร",
  //'paged'=>$paged
  );
  $wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
  <?php $wp_query->the_post(); // Start the Loop.?>
  <header>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
   </header>
      <?php the_content(); ?>
  <?php 
  // clean up after our query
  wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>