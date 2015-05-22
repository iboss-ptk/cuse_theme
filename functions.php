<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/pagination.php',      // Custom pagination
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/comments.php',        // Custom comments modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);
add_theme_support( 'post-thumbnails' ); 
function remove_more_jump_link($link) { 
  $offset = strpos($link, '#more-');
  if ($offset) { $end = strpos($link, '"',$offset); }
  if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
  return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
// disable admin bar
add_filter('show_admin_bar', '__return_false');
remove_filter ('acf_the_content', 'wpautop');
foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Hides the iCal/Export Listed Events link from tribe archive views such as List and Month
remove_filter('tribe_events_after_footer', array('TribeiCal', 'maybe_add_link'), 10, 1);

function igadmin_create_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'igadmin';

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      igid varchar(255) NOT NULL,
      imgurl varchar(255) NOT NULL,
      link varchar(255) NOT NULL,
      UNIQUE KEY id (id)
    ) $charset_collate;";

    $wpdb->query($sql);
}

add_action("after_switch_theme", "igadmin_create_db");

add_action( 'wp_ajax_igadmin_add_new_allowed', 'igadmin_add_new_allowed_callback' );
function igadmin_add_new_allowed_callback() {
    global $wpdb;
    $ig_post_id = $_POST['ig_post_id'];
    $ig_image = $_POST['imgurl'];
    $ig_link = $_POST['link'];

    $table_name = $wpdb->prefix . 'igadmin';
    $sql = "INSERT INTO $table_name (igid, imgurl, link) VALUES ( '$ig_post_id', '$ig_image', '$ig_link' )";

    $wpdb->query($sql);

    echo "STORE ".$ig_post_id . ': ' . $ig_image;
    wp_die();
}

add_action( 'wp_ajax_igadmin_remove_allowed', 'igadmin_remove_allowed_callback' );
function igadmin_remove_allowed_callback() {
    global $wpdb;
    $ig_post_id = intval( $_POST['ig_post_id'] );

    $table_name = $wpdb->prefix . 'igadmin';
    $sql = "DELETE FROM $table_name WHERE igid=$ig_post_id";
    $wpdb->query($sql);

    echo "REMOVE ".$ig_post_id;
    wp_die();
}

add_action( 'wp_ajax_find_allowed', 'find_allowed_callback' );
function find_allowed_callback() {
    global $wpdb;
    $ig_post_id = intval( $_GET['ig_post_id'] );

    $table_name = $wpdb->prefix . 'igadmin';
    $sql = "SELECT 1 FROM $table_name WHERE igid=$ig_post_id";
    $res = $wpdb->query($sql);

    if($res == 1) echo True;
    // echo $ig_post_id . "is allowed";
    wp_die();
}

add_filter( 'script_loader_src', 'eliminate_double_slash' );
add_filter( 'style_loader_src', 'eliminate_double_slash' );
function eliminate_double_slash( $url ) {
  $url = str_replace("//", "/", $url);
  $url = str_replace("http:/", "http://", $url);
  $url = str_replace("https:/", "https://", $url);
  return $url;
}

function custom_pagination($numpages = '', $pagerange = '', $paged='', $page_format='&paged=%#%') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => $page_format,
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    //'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => '',
    'type'  => 'array'
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo '<div class="row">
    ';
    echo '<div class="pagination-centered"><ul class="pagination">';
      
      // echo paginate_links($pagination_args);
     
      foreach ($paginate_links as $page) {
        # code...
        //echo  str_replace('span','li',$page);
        //$page= str_replace('span','li',$page);
        if (strpos($page, 'current') !== FALSE)
            echo "<li class='current'><a>".$page."</a></li>";
        else
            echo "<li class=''>".$page."</li>";
        //if($page!='')echo "<li class=''><a>".$page."</a></li>";
      }
    echo "</ul></div>";
    echo '</div>';
  }

}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
  if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
?>
