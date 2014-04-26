<?php get_header(); ?>

<div id="content" class="row-fluid">
  <?php $front_page_category = get_category_by_slug('front-page');
        $args = array( 'posts_per_page' => -1,
                       'category' => $front_page_category->term_id,
                       'order' => 'ASC' );
        $posts = get_posts( $args );
        foreach ( $posts as $post ) {
	       get_template_part( 'single-embedded-background', get_post_format($post->ID) );
               echo '<div class="row-fluid divider"></div>';
        }?>
</div><!-- /#content -->
 
<?php get_footer(); ?>
