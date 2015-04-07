<div class="contain-to-grid fixed shadowing" style="z-index:9999999">
  <?php if ( is_admin_bar_showing() ) echo '<div class="wpam-debug"></div>'; ?>
  <header>
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <!-- <li class="name"> <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1> </li> -->
        <li class="name"> <h1><a href="<?php echo esc_url(home_url()).'/'; ?>">
            <img src="http://www.cp.eng.chula.ac.th/se/app/themes/cuse_theme/assets/img/ce.png" width="220" style="margin-top:0px;">
<!--             <div class="header-title">
              <div class="se">Software Engineering</div>
              <div class="cu">Chulalongkorn University</div>
            </div>   -->
        </a></h1> </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'right'));
        endif; ?>
      </section>
    </nav>
  </header>
</div> <!-- contain-to-grid -->

<!-- <div class="top-offset"></div> -->