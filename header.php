<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php if (is_front_page()) { ?>
  <div id="strona-glowna"></div>
  <?php } ?>

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="row-fluid">
    <?php if (!is_front_page()) { ?>
      <div class="container">
        <a href="<?php echo home_url('/'); ?>#strona-glowna">
          <img id="logo-small" class="gray aligncenter" src="<?php echo get_stylesheet_directory_uri()."/images/logo_small.png"; ?>" />
        </a>
      </div>
    <?php } ?>
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar-collapse collapse pull-right">
        <?php get_template_part('menu'); ?>
      </div><!--/.nav-collapse -->
    </div>
    </div><!--/.row-fluid -->
  </div><!--/.navbar -->

  <?php
    if (is_front_page()) {
      include 'front-page-header.php';
    }
  ?>