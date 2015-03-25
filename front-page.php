<header id="header" data-type="background" data-speed="5">
	<div id="header-overlay" class="overlay"></div>
	<div id="header-label">
		<div class="title-name">
			<h1 style="color: white">Software Engineering</h1>
			<p class="lv0">Department of Computer Engineering, Faculty of Engineering</p>
		</div>
		
		<p class="title-name">Chulalongkorn University</p>
		<div class="nowop animated fadeInUp" id="nowop">
			<div class="announce-item">
				<div id="arrow-left" class="arrow"></div>
				<div class="announce">
					<p><u>NOW OPEN</u> from <i>Feb 2</i> to <i>March 10, 2015</i><br> for Software Engineering Program, Academic Year 1/2015</p>
					<a href="<?php echo get_page_link(373) ?>" class="mif">MORE INFO</a>
				</div>

				<div class="announce hide">
					<p><u>NOW OPEN 2</u> from <i>Feb 2</i> to <i>March 10, 2015</i><br> for Software Engineering Program, Academic Year 1/2015</p>
					<a href="<?php echo get_page_link(373) ?>" class="mif">MORE INFO</a>
				</div>

				<div class="announce hide">
					<p><u>NOW OPEN 3</u> from <i>Feb 2</i> to <i>March 10, 2015</i><br> for Software Engineering Program, Academic Year 1/2015</p>
					<a href="<?php echo get_page_link(373) ?>" class="mif">MORE INFO</a>
				</div>
				<div id="arrow-right" class="arrow"></div>
			</div>
		</div>
	</div>
</header>


<section id="news">

	<div class="small-12 no-pad section-title section-title-news rows">
		<a href=""><span class="section-title-pad small-1 columns">News</span></a>
	</div>	

	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 1,
		'orderby' => 'the_date',
		'order' => 'ASC',
		'tax_query' => array(
	    array(
	      'taxonomy' => 'tags',
	      'field'    => 'slug',
	      'terms'    => 'first',
	    	),
	  	),
		);	
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
	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 1,
		'orderby' => 'the_date',
		'order' => 'ASC',
		'tax_query' => array(
	    array(
	      'taxonomy' => 'tags',
	      'field'    => 'slug',
	      'terms'    => 'second',
	    	),
	  	),
		);	
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
	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 1,
		'orderby' => 'the_date',
		'order' => 'ASC',
		'tax_query' => array(
	    array(
	      'taxonomy' => 'tags',
	      'field'    => 'slug',
	      'terms'    => 'second',
	    	),
	  	),
		);	
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

<section>
<div class="rows" data-equalizer>
	<section id="instragram" class="small-12 large-4 columns no-pad" data-equalizer-watch>
		<div class="no-pad section-title section-title-instragram">
			<span class="section-title-pad">#CUSE on Instragram</span>
		</div>
		<div class="instagram"></div>
	</section>
</div>
</section>

<div class="rows" data-equalizer>
<<<<<<< HEAD
=======
	<div class="no-pad section-title section-title-event">
		<span class="section-title-pad">Upcoming Event</span>
	</div>
	<section id="instragram" class="small-12 large-4 columns no-pad" data-equalizer-watch>
	</section>
>>>>>>> f210c569e0275d46a5bc0fa97a7aa2f4f33f515e

	<section id="event" class="small-12 large-8 columns no-pad" data-equalizer-watch>
		<div class="no-pad section-title section-title-event">
			<span class="section-title-pad">Upcoming Event</span>
		</div>
		<div class="relative-wrapper">
			
			<?php $event_archive_query = new WP_Query('showposts=10&post_type=tribe_events');
			while ($event_archive_query->have_posts()) : $event_archive_query->the_post(); ?>

			<div class="event-item">
				<time datetime="2014-09-20" class="icon">
					<em><?php echo tribe_get_start_date( null, false, 'l'); ?></em>
					<strong><?php echo tribe_get_start_date( null, false, 'F'); ?></strong>
					<span>
						<?php echo tribe_get_start_date( null, false, 'd'); ?>
					</span>
				</time>
				<div>
					<div class="center">
						<h4>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</h4>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

			
			<!-- end event -->


			<?php if(!$event_archive_query->have_posts()): ?>
			<div class="event-item text-center">
				<h4>There is no upcoming event.</h4>
			</div> 
			<?php endif; ?>
			<div class="event-item">
				<div class="center">
					<a href="#"><h4><u>View all</u></h4></a>
				</div>
			</div>

		</div>
	</section>
</div> 



<script type="text/javascript">
	var arl = document.getElementById("arrow-left");
	var arr = document.getElementById("arrow-right");
	var nowop = document.getElementById("nowop");

	var announce = document.getElementsByClassName("announce");
	var max = announce.length;
	var i = 0;

	function nav (i, max, dir) {
		if (dir == 1) { i++ }
		else if (dir == 0) { i-- };

		if (i >= max) { return 0 };
		if (i < 0) { return max-1 };
		return i
	}

	function trans(direction){
		var prev_dirname = (direction === 0) ? "Right":"Left"
		var next_dirname = (direction === 1) ? "Right":"Left"
		announce[i].className = "announce fadeOut" + prev_dirname +" animated"
		setTimeout(function(){
			announce[i].className = "announce hide"
			i = nav(i, max, direction);
			announce[i].className = "announce fadeIn" + next_dirname +" animated"
		},200);
	}

	var transTimer = setInterval(function(){ trans(1) }, 5000);

	arl.addEventListener("click", function(){
		trans(0);
		clearInterval(transTimer);
	});

	arr.addEventListener("click", function(){
		trans(1);
		clearInterval(transTimer);
	});

	nowop.addEventListener("mouseover", function(){ 
		clearInterval(transTimer); 
	});

	nowop.addEventListener("mouseout", function(){
		transTimer = setInterval(function(){ trans(1) }, 5000);
	});
	


</script>