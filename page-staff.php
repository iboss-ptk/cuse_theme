<section class="page-content bg-handmouse">
  <div class="small-12 paper-like-content-wrapper with-side asplalt">
    <div class="cover-title">
      <?php get_template_part('templates/page', 'header'); ?>
    </div>
    <?php

	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
     "posts_per_page" =>20,
     "post_type" => "teacher",
	//'paged'=>$paged
     );
     $wp_query = new WP_Query($args);?>
     
     <?php if ( $wp_query->have_posts() ) : ?>
     <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>

     <div class="row" style="border-bottom:1px solid rgba(44, 62, 80, 0.9); padding-bottom:40px;">
      <div class="small-12 medium-3 columns">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo get_field('image')["sizes"]["medium"]; ?>" style="margin-top:98px;">
        </a>
      </div>
      <div class="small-12 medium-8 medium-offset-1 columns">
        <header>
          <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div style="margin-top:-45px;margin-bottom:45px;"><h5><?php echo get_field('name_eng'); ?></h5></div>
        </header>

        <h4>Contact</h4>
        <?php the_field('contact'); ?>

        <h4>Education</h4>
        <?php the_field('education'); ?>

        <h4>Interests</h4>
        <?php the_field('interests'); ?>
        
        
<!--       <?php the_field('subject'); ?>
      <?php the_field('journal_articles'); ?>
      <?php the_field('conferences/workshops'); ?> -->
    </div>
  </div>
  
<?php endwhile; ?>


<div style="border: 1px solid #0e0b08; padding: 20px 20px; margin-top: 50px;">
<p style="padding-left: 30px; text-align: center;">ผู้ที่ไม่มีผลสอบภาษาอังกฤษ (CU-TEP) ดูรายละเอียดได้จากประกาศ เรื่อง<br>
การทดสอบความรู้ความสามารถทางภาษาอังกฤษ และสมัครได้ที่ <a title="http://www.atc.chula.ac.th" href="http://www.atc.chula.ac.th" target="_blank">www.atc.chula.ac.th</a><br>
***ส่งผลการสอบภาษาอังกฤษ ที่ภาควิชาวิศวกรรมคอมพิวเตอร์ อย่างช้าที่สุดภายในวันสอบสัมภาษณ์***<br>
<em>หมายเหตุ ภาควิชาฯจะไม่รับผลสอบภาษาอังกฤษ ที่ส่งหลังกำหนด และส่งที่อื่นนอกเหนือจากที่ประกาศไว้</em></p>
</div>
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

</div>
</section>