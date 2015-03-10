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

<section class="page-content bg-handmouse" ng-app='courseApp'>
<div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">
 <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>
<div ng-controller='courseCtrl'>

<?php
  
	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	"posts_per_page" =>30,
	"post_type" => "subject",
	//'paged'=>$paged
  );
	$wp_query = new WP_Query($args);?>
    
  <?php if ( $wp_query->have_posts() ) : ?>
<br>

<input class="custom" type="search" ng-model="q.title" placeholder="Enter search keyword..." />

  <div ng-repeat="subject in subjects | filter:q:strict" class="subject">
    <a href="#" data-reveal-id="{{subject.iden}}" data-animation="fade" data-animationSpeed="2500">
      <div style="min-height: 120%">
        <!-- <h4 class="entry-title" ng-bind="subject['title']"></h4> -->
        <h4 class="entry-title" ng-bind="subject['subject_code']+' '+subject['subject_name_thai']"></h4>
        <h5 class="entry-title" ng-bind="subject['subject_name_eng']+' [ '+subject['subject_short']+' ]'"></h5>
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

<script type="text/javascript">
  var courseApp = angular.module('courseApp', []);
  courseApp.controller('courseCtrl', [ '$scope', function ($scope) {
  subjs=[
  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); // Start the Loop.?>
    {
      'title':'<?php the_field("subject_code"); ?>'+' '+'<?php the_field("subject_name_thai"); ?>'+'</h4><br><h4>'+'<?php the_field("subject_name_eng"); ?>',
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
    ];

  subjs.sort(function(a, b){
    var a_code = parseInt(a.subject_code);
    var b_code = parseInt(b.subject_code);
    if (a_code > b_code) {
      return 1;
    } else return -1;
  });

  for (var i = subjs.length - 1; i >= 0; i--) {
    console.log(subjs[i].subject_code);
  };

  $scope.subjects = subjs;
  }]);
</script>
<?php endif; ?>
