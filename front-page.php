<header id="header" data-type="background" data-speed="5">
	<div id="header-overlay" class="overlay"></div>
	<div id="header-label">
		<h1 style="color: white">Software Engineering</h1>
		<p>C H U L A L O N G K O R N&nbsp&nbspU N I V E R S I T Y</p>
		<p class="nowop">February 2 - March 10. 2015</p>
		<a href="http://www.google.com" class="mif">NOW OPEN</a>
	</div>
</header>

<!-- <section id="news">

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
 -->
	
	<!-- wp news loop -->
	
<!-- 	<div class="post-card small-12 large-4 columns no-pad" data-equalizer-watch>
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
	<?php endif; ?> -->
	<!-- end loop -->
<!-- </section>


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
	<div class="no-event text-center">
		No event available.
	</div>
	</div>
</section>
</div> -->

<!-- <section id="content">
<h1>&nbsp</h1>
	<h1 id="one">One</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus non urna a malesuada. In ac lorem vel nisi imperdiet cursus. Curabitur facilisis rutrum tortor, id rutrum lacus facilisis et. Phasellus non ipsum lobortis, tempor elit a, hendrerit nulla. Aenean semper facilisis augue id porttitor. Sed accumsan nibh a diam molestie, eu egestas mauris venenatis. Duis scelerisque luctus enim et gravida. Nam quis turpis non purus interdum luctus. Etiam gravida adipiscing venenatis.</p>
	<p>Duis non est massa. Integer placerat dictum magna et dapibus. Proin laoreet, neque eu tempus aliquam, eros orci consequat ante, in consectetur ligula magna vel justo. Nulla eu quam egestas, vehicula mi a, auctor dui. Maecenas nec sem sit amet velit interdum ullamcorper at non diam. Vestibulum lectus orci, tempor eu scelerisque vitae, vulputate id tortor. Cras lacus dui, aliquet at tempus pharetra, ultrices ac eros. Integer a placerat quam, sed ornare tellus. In eu placerat massa. Phasellus accumsan faucibus leo, sed egestas eros accumsan ac. Praesent adipiscing, nulla et ullamcorper suscipit, lectus magna rhoncus augue, at sodales eros lectus eu risus. Nam vulputate sem ac faucibus venenatis. Aenean semper felis sed convallis cursus. Proin commodo magna gravida dolor egestas, vitae congue dolor vestibulum. Nulla eros purus, consectetur eu sollicitudin eget, porttitor eu tortor.</p>

	<h1 id="two">Two</h1>
	<p>Proin convallis tortor ac fringilla volutpat. Quisque imperdiet a urna sit amet venenatis. Vestibulum tempus aliquam porta. Cras molestie condimentum leo, vitae consequat risus adipiscing porta. Mauris laoreet lacus vel pharetra tristique. Sed mollis ut urna vel vulputate. Integer sodales sollicitudin vestibulum. In mauris ante, tristique sit amet euismod sit amet, fermentum eu ligula. Curabitur sagittis lorem in lobortis elementum. Nunc ac velit sed quam scelerisque aliquam sit amet vitae diam. Aliquam adipiscing tortor urna, a cursus est fringilla at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<p>Nulla luctus scelerisque est, in cursus tellus consectetur quis. Donec a nibh nec tortor iaculis adipiscing ut id velit. Maecenas sodales elementum lectus, vitae consectetur massa fermentum at. Phasellus eu vulputate turpis, vel suscipit mauris. Integer rhoncus ullamcorper nisi. Mauris pretium purus lacus, vel molestie felis semper in. Mauris bibendum sem non ipsum condimentum, eget consequat odio venenatis. Vestibulum quis imperdiet neque, eu viverra diam. Nullam nulla massa, mattis in dui vitae, fermentum fringilla ipsum. Aenean accumsan hendrerit lorem, sed fermentum ipsum tristique a. Praesent mollis elit sed dignissim sodales. Nam ornare sed enim aliquet laoreet. Suspendisse potenti. Nulla metus mi, imperdiet eu nibh eget, tempor sollicitudin felis.</p>

	<h1 id="three">Three</h1>
	<p>In dapibus porta volutpat. Donec lobortis arcu et commodo sollicitudin. Sed non condimentum magna. Cras sit amet adipiscing magna. Sed volutpat nisl sed lectus dignissim vehicula. Proin molestie et quam eu porttitor. Etiam interdum, nisl sed venenatis consequat, turpis augue dignissim purus, eget rutrum est nisi sit amet velit. Praesent interdum congue neque, ac molestie mauris auctor rutrum. Nunc nibh ante, ultricies ut ornare quis, faucibus eget nunc.</p>
</section> -->