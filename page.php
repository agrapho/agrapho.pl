<?php get_header(); ?>

<div id="content" class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	  <div class="entry-content">
            <?php the_content(); ?>
	  </div>
          <?php $temp_query = $wp_query; ?>
          <?php query_posts(array('post_parent' => get_the_ID(), 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'asc')); while (have_posts()) { the_post(); ?>
            <div id="<?php echo $post->post_name; ?>" class="sub-page-content">
              <h2><?php the_title(); ?></h2>
              <?php $page_template = get_page_template_slug(); ?>
              <?php if($page_template == "") { ?>
              <?php     the_content();
                    } else {
                        $page_template_part = explode('.php', $page_template)[0];
                        get_template_part( $page_template_part );
                    } ?>
            </div> <!--/.container -->
          <?php } ?>
          <?php $wp_query = $temp_query; ?>
        </article>
     <?php endwhile; ?>
</div> <!-- /.container -->

<?php get_footer(); ?>
