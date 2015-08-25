<section class="page-content bg-handmouse">
  <?php while (have_posts()) : the_post(); ?>
  <div class="small-12 large-10 large-offset-1 paper-like-content-wrapper asplalt">
    <article <?php post_class(); ?>>
      <header class='news-header'>
        <h1 class="entry-title">
          <!-- <b>Research:</b> --> <?php the_field('name'); ?>
        </h1>
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail();}
          ?>
      </header>
        <div class="entry-content">
          <h4 >Description: </h4><hr>
          <div class="item-content"><?php the_field('description'); ?></div>

          <h4>Student: </h4><hr>
           <div class="item-content"><?php the_field('student_name'); ?></div>
          <h4>Advisor: </h4><hr>
           <div class="item-content"><?php the_field('adviser_name'); ?></div>
          <h4>Year:</h4><hr>
           <div class="item-content"><?php the_field('year'); ?></div>

        </div>
        <footer>
          

          <div style="height: 50px"></div>

          <div class="related-research-box">
            <h3><strong>RELATED RESEARCH</strong></h3>
            <hr>
            <div class="row" style="margin-left:0px;margin-right:0px;">
            <?php $id_post = get_the_ID(); ?> 
            <?php
            $args = array( 'post_type' => 'research', 'posts_per_page' => 5 );
            $loop = new WP_Query( $args );
            $size = 0;
            while ( $loop->have_posts() ) : $loop->the_post();
              if(get_the_ID() !=$id_post){
                  
                    if($size%2==0){     ?>
                      <div class="small-6 large-6 columns" style="padding-right:4em;">
                        <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();}
                            ?>
                        <div style="text-align:center;">
                          <h5>
                            <b><?php the_field('name_thai') ?></b>
                            (<?php the_field('name_eng') ?>)
                          </h5>
                        </div>
                        </a>
                      </div>

                    <?php }else{ ?>
                      <div class="small-6 large-6 columns" style="padding-left:4em;">
                        <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();}
                            ?>
                        <div style="text-align:center;">
                          <h5>
                            <b><?php the_field('name_thai') ?></b>
                            (<?php the_field('name_eng') ?>)
                          </h5>
                        </div>
                        </a>
                      </div>
              <?php  }
               $size++;  
              }
              if($size==4)break;
            ?>   

            <?php endwhile; ?>        
             </div>
          </div>
          

<!-- 
          <div style="float: left;"><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
          <div style="float: right;"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>

           -->
        </footer>

        <?php comments_template('/templates/comments.php'); ?>
      </article>
    </div>
  <?php endwhile; ?>
</section>

<!-- HEY research from boss pattern-->
