<header id="header" data-type="background" data-speed="5">
	<div id="header-overlay" class="overlay"></div>
	<div id="header-label">
		<div class="title-name">
			<h1 style="color: white">Software Engineering</h1>
			<p class="lv0">Department of Computer Engineering, Faculty of Engineering</p>
		</div>
		
		<p class="title-name">Chulalongkorn University</p>
		<div class="nowop animated fadeInUp">
			<p><u>NOW OPEN</u> from <i>Feb 2</i> to <i>March 10, 2015</i><br> for Software Engineering Program, Academic Year 1/2015</p>
			<a href="<?php echo get_page_link(373) ?>" class="mif">MORE INFO</a>
		</div>
	</div>
</header>


<section id="news">

	<div class="small-12 no-pad section-title section-title-news rows">
		<span class="section-title-pad small-1 columns">News</span>
	</div>	

	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 3,
		'orderby' => 'the_date',
		'order' => 'ASC');	
	$wp_query = new WP_Query( $args );

	?>
	<div class="rows card-group" data-equalizer>
		<?php if ( $wp_query->have_posts() ) : ?>
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>



		<div class="post-card small-12 large-4 columns no-pad" data-equalizer-watch>
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
			<?php 
	// clean up after our query
			wp_reset_postdata(); 
			?>
		<?php else:  ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?> 

</section>

<div class="rows" data-equalizer>
	<section id="instragram" class="small-12 large-4 columns no-pad" data-equalizer-watch>
		<div class="no-pad section-title section-title-instragram">
			<span class="section-title-pad">#CUSE on Instragram</span>
		</div>
		<div class="instagram"></div>
	</section>

	<section id="event" class="small-12 large-8 columns no-pad" data-equalizer-watch>
		<div class="no-pad section-title section-title-event">
			<span class="section-title-pad">Event</span>
		</div>
		<div class="relative-wrapper">

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<h4>This is the first event ever.</h4>
					</div>
				</div>
			</div>
			<!-- end event -->

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<h4>This is the first event ever.</h4>
					</div>
				</div>
			</div>
			<!-- end event -->

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<h4>อยากจะดีกว่านี้ ให้เธอได้มั่นใจ</h4>
					</div>
				</div>
			</div>
			<!-- end event -->

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<a href="#"><h4>This is the first event ever.</h4></a>
					</div>
				</div>
			</div>
			<!-- end event -->

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<h4>This is the first event ever.</h4>
					</div>
				</div>
			</div>
			<!-- end event -->

			<!-- start event -->
			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em>Saturday</em>
					<strong>September</strong>
					<span>20</span>
				</time>
				<div>
					<div class="center">
						<h4>This is the first event ever.</h4>
					</div>
				</div>
			</div>
			<!-- end event -->
			
			<!-- <div class="no-event text-center">
				No event available.
			</div> -->
		</div>
	</section>
</div> 

