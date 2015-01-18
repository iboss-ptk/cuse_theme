<?php
/*
Template Name: News Template
*/?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				$args = array(
						"posts_per_page" =>3,
						"post_type" => "news"
						);
				$wp_query = new WP_Query($args);
				// Start the Loop.
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					// Include the page content template.
					the_content();
					$date = DateTime::createFromFormat('Ymd',get_field('post_date'));
					echo $date->format('d/m/Y');
					the_field('description');
					//echo get_field('post_date');
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->
	
