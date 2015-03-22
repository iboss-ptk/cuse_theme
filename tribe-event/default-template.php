<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

 ?>
<section class="page-content bg-handmouse">
	<div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">
	  	<div class="cover-title">
	    	<h1>Event</h1>
	    </div>
	    
	    <div id="tribe-events-pg-template" style="padding-top:2em;padding-bottom:2em;">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
		</div> <!-- #tribe-events-pg-template -->
	 
  	
  	</div>
</div>
	
