<?php $temp_query = $wp_query; ?>
<?php 
function append_main_menu_link($post, $slug, $name) {    
    if (is_front_page())
        $link_prefix = '#';
    else
	$link_prefix = '/';
    if ($post->post_name == $slug)
        $active_class = 'active';
    else
	$active_class = '';
    echo '<li class="anchor-link ' . $active_class . '"><a href="' . $link_prefix . $slug . '">' . $name . '</a></li>';
}
?>
<ul class="nav navbar-nav main-menu-nav">
    <?php if (!is_front_page()) echo '<li class="anchor-link"><a href="/">Strona główna</a></li>'; ?>
    <li class="anchor-link"><a href="<?php if (!is_front_page()) echo '/#'; else echo '#'; ?>o-nas">O nas</a></li>
    <?php append_main_menu_link($post, 'wnetrza', 'Wnętrza');
          append_main_menu_link($post, 'grafika', 'Grafika');
          append_main_menu_link($post, 'web-design', 'Web design'); ?>
    <?php if (is_front_page()) { ?>
    <li class="anchor-link"><a href="#kontakt">Kontakt</a></li>
    <?php } ?>
</ul>
<?php if (!is_front_page()) { ?>
    <ul class="nav navbar-nav submenu-nav">
        <?php query_posts(array('post_parent' => get_the_ID(), 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'asc')); while (have_posts()) { the_post(); ?>
        <li class="anchor-link"><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li>
        <?php } ?>
        <li class="anchor-link"><a href="#kontakt">Kontakt</a></li>
    </ul>
<?php } ?>

<?php $wp_query = $temp_query; ?>
