<div id="front-page-header" class="row-fluid">

  <div id="header-carousel" class="carousel slide">
    <div class="carousel-inner">
      <div class="item active">
        <div id="header-logo" class="row-fluid">
          <img id="logo-part-1" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo1.png"; ?>" />
          <img id="logo-part-2" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo2.png"; ?>" />
          <img id="logo-part-3" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo3.png"; ?>" />
          <img id="logo-part-4" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo4.png"; ?>" />
          <img id="logo-part-5" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo5.png"; ?>" />
          <img id="logo-part-6" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo6.png"; ?>" />
        </div> <!-- /#header-logo -->
      </div>

      <div class="item">
        <div id="header-bubbles">
          <?php $bubbles_category = get_category_by_slug('header-bubbles');
                $args = array( 'posts_per_page' => -1,
                               'category' => $bubbles_category->term_id );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                     echo "<div class=bubble><p>$post->post_title</p></div>";
                }
          ?>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#header-carousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#header-carousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
</div> <!-- /#front-page-header -->