<section class="page-content bg-handmouse">
<div class="small-12 large-10">
<div class="small-12 paper-like-content-wrapper with-side asplalt">

  <?php while (have_posts()) : the_post(); ?>
  <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>
  </div>
</div>

<div class="large-offset-10 large-2 fixed sidenav show-for-large-up">
  <div class="detail"><a href="#detail"><p>ข้อมูลทั่วไป</p></a></div>
  <div class="importance"><a href="#importance"><p>ความสำคัญของหลักสูตร</p></a></div>
  <div class="career"><a href="#career"><p>อาชีพที่สามารถประกอบได้<br>หลังสำเร็จการศึกษา</p></a></div>
  <div class="course"><a href="#course"><p>หลักสูตรการเรียนการสอน</p></a></div>

</div>
</div>
</section>