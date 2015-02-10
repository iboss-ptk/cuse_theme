<style type="text/css">
  .subject{
    padding: 20px 20px;
    border-bottom: 1px solid #EEEEEE;
    transition: all 0.3s ease-in-out;
  }
  .subject:hover {
    background-color: #FFCC66;
    background-color: rgba(#FFCC66,.1);
  }

</style>

<section class="page-content bg-handmouse">
<div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">
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
      'subject_short':'<?php the_field("subject_short"); ?>',
      'subject_name_thai':'<?php the_field("subject_name_thai"); ?>',
      'subject_name_eng':'<?php the_field("subject_name_eng"); ?>',
      'credits':'<?php the_field("credits"); ?>',
      'subject_description_eng':'<?php the_field("subject_description_eng"); ?>',
      'subject_description_thai':'<?php the_field("subject_description_thai"); ?>',
      'iden' : '<?php echo str_replace(" ","_",get_field("subject_name_eng"));?>'
    },
  <?php endwhile; ?>
  ]"></div>
<!--   <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>

  <header>
      <h4 class="entry-title"><?php the_title(); ?></h1>
   </header>

   {{subject[0]}}

      <?php the_field('subject_code'); ?>
      <?php the_field('subject_short'); ?>
      <?php the_field('subject_name_thai'); ?>
      <?php the_field('subject_name_eng'); ?>
      <?php the_field('credits'); ?>
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
<br>
<input class="custom" type="search" ng-model="q" placeholder="Enter search keyword..." />

  <div ng-repeat="subject in subjects | filter:q as results" class="subject">
    <a href="#" data-reveal-id="{{subject.iden}}" data-animation="fade" data-animationSpeed="2500">
      <div style="min-height: 120%">
        <h4 class="entry-title" ng-bind="subject['title']"></h4>
      </div>
    </a>
    
    <div id="{{subject.iden}}" class="reveal-modal" data-reveal >
      <div class="modal-head">
        <h2 ng-bind="subject['subject_name_thai']"></h2>
        <p class="lead" ng-bind="subject['subject_name_eng']"></p>
      </div>
      <div class="modal-content">
        <div><div class="content-label">Subject code</div><div ng-bind="subject['subject_code']"></div></div>
        <hr>
        <div><div class="content-label">Abbreviation</div><div ng-bind="subject['subject_short']"></div></div>
        <hr>
        <div><div class="content-label">Credits</div><div ng-bind="subject['credits']"></div></div>
        <hr>
        <div><div class="content-label">Subject description [TH]</div><div ng-bind="subject['subject_description_thai']"></div></div>
        <hr>
        <div><div class="content-label">Subject description [EN]</div><div ng-bind="subject['subject_description_eng']"></div></div>
        <a class="close-reveal-modal">&#215;</a>
      </div>
    </div>

  </div>
</div>
</div>
</section>
