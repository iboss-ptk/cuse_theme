

<section class="page-content">
  <div class="small-offset-1 small-10 medium-offset-1 medium-7">
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
      <h1 class="entry-title"><b><?php the_title(); ?></b></h1>
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
      <h1 class="entry-title"><b><?php the_title(); ?></b></h1>
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
      <h1 class="entry-title"><b><?php the_title(); ?></b></h1>
   </header>
      <?php the_content(); ?>
  <?php 
  // clean up after our query
  wp_reset_postdata(); 
  ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>

<!-- <div class="onpage-nav medium-4 column no-pad">xxx</div> -->
</section>