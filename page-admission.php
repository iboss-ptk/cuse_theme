<section class="page-content bg-handmouse">
  <div class="small-12 large-10">
    <div class="small-12 paper-like-content-wrapper with-side asplalt">

      <div class="cover-title">
        <?php get_template_part('templates/page', 'header'); ?>
      </div>

      <!-- ปฏิทินการรับสมัคร-->
      <?php

  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        "post_type" => "admission",
        "name" => "ปฏิทินการรับสมัคร",
  //'paged'=>$paged
        );
        $wp_query = new WP_Query($args);?>
        <div class="tile" id="calendar">
          <?php if ( $wp_query->have_posts() ) : ?>
          <?php $wp_query->the_post(); // Start the Loop.?>
          <header>
            <h3><?php the_title(); ?></h3>
          </header>
          <?php the_content(); ?>
          <?php 
  // clean up after our query
          wp_reset_postdata(); 
          ?>
        </div>
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
      <div class="tile" id="properties">
        <?php if ( $wp_query->have_posts() ) : ?>
        <?php $wp_query->the_post(); // Start the Loop.?>
        <header>
          <h3><?php the_title(); ?></h3>
        </header>
        <?php the_content(); ?>
        <?php 
  // clean up after our query
        wp_reset_postdata(); 
        ?>
      </div>
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
    <div class="tile" id="method">
      <?php if ( $wp_query->have_posts() ) : ?>
      <?php $wp_query->the_post(); // Start the Loop.?>
      <header>
        <h3><?php the_title(); ?></h3>
      </header>
      <?php the_content(); ?>
      <?php 
  // clean up after our query
      wp_reset_postdata(); 
      ?>
    </div>
  <?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<!-- ค่าเล่าเรียน/ค่าธรรมเนียมการศึกษา-->
<?php

  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  "post_type" => "admission",
  "name" => "ค่าเล่าเรียน/ค่าธรรมเนียมการศึกษา",
  //'paged'=>$paged
  );
  $wp_query = new WP_Query($args);?>
  <div class="tile" id="payment">
    <?php if ( $wp_query->have_posts() ) : ?>
    <?php $wp_query->the_post(); // Start the Loop.?>
    <header>
      <h3><?php the_title(); ?></h3>
    </header>
    <?php the_content(); ?>
    <?php 
  // clean up after our query
    wp_reset_postdata(); 
    ?>
  </div>
<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>

<!-- <div class="onpage-nav medium-4 column no-pad">xxx</div> -->
<div class="large-offset-10 large-2 fixed sidenav show-for-large-up">
  <div class="calendar"><a href="#calendar"><p>ปฏิทินการรับสมัคร</p></a></div>
  <div class="properties"><a href="#properties"><p>คุณสมบัติผู้สมัคร</p></a></div>
  <div class="method"><a href="#method"><p>วิธีการรับสมัคร</p></a></div>
  <div class="payment"><a href="#payment"><p>ค่าเล่าเรียน/<br>ค่าธรรมเนียมการศึกษา</p></a></div>
</div>
</div>
</section>