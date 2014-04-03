<?php $temp_query = $wp_query; ?>

<ul class="nav navbar-nav">
  <?php if (is_front_page()) { ?>
    <li class="anchor-link"><a href="#o-nas">O nas</a></li>
    <li class="anchor-link"><a href="#wnetrza">Wnętrza</a></li>
    <li class="anchor-link"><a href="#grafika">Grafika</a></li>
    <li class="anchor-link"><a href="#web-design">Web design</a></li>
  <?php } else { ?>
    <li class="anchor-link"><a href="<?php echo home_url('/'); ?>#strona-glowna">Strona główna</a></li>
    <?php query_posts(array('post_parent' => get_the_ID(), 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'asc')); while (have_posts()) { the_post(); ?>
    <li class="anchor-link"><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li>
  <?php } } ?>

    <li class="anchor-link"><a href="#kontakt">Kontakt</a></li>
</ul>

<?php $wp_query = $temp_query; ?>