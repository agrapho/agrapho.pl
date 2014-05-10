<?php get_header(); ?>

<div id="content">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <?php
            $page_attachments = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
            $background_image_url = $page_attachments[0];
            if ($background_image_url) {
          ?>
              <section id="<?php echo $post->post_name; ?>" class="bg-section" style="background: url(<?php echo $background_image_url ?>) no-repeat center center fixed;">
                <div class="row-fluid">
                  <div class="entry-content container">
                    <p><?php echo the_content(); ?></p>
                  </div>
                </div>
              </section>
          <?php } else { ?>
 	      <div class="entry-content container">
                <?php the_content(); ?>
	      </div>
          <?php } ?>

          <?php $temp_query = $wp_query; ?>
          <?php query_posts(array('post_parent' => get_the_ID(), 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'asc')); while (have_posts()) { the_post(); ?>
            <div id="<?php echo $post->post_name; ?>" class="sub-page-content">
              <div class="container">
                <h1><?php the_title(); ?></h1>
              </div>
              <?php $page_template = get_page_template_slug(); ?>
              <?php if($page_template == "") {
                        $page_attachments = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                        $background_image_url = $page_attachments[0];
                        if ($background_image_url) { ?>
                            <section id="<?php echo $post->post_name; ?>" class="bg-section" style="background: url(<?php echo $background_image_url ?>) no-repeat center center fixed;">
                                <div class="row-fluid">
                                    <div class="container">
                                        <p><?php echo the_content(); ?></p>
                                    </div>
                                </div>
                            </section>
                  <?php } else { ?>
                            <div class="container">
                                <?php the_content(); ?>
                            </div>
                  <?php }
                    } else {
                        $page_template_parts = explode('.php', $page_template);
                        $page_template_part = $page_template_parts[0];
                        get_template_part( $page_template_part );
                    } ?>
            </div> <!--/.container -->
          <?php } ?>
          <?php $wp_query = $temp_query; ?>
        </article>
     <?php endwhile; ?>
</div> <!-- /.container -->

<?php get_footer(); ?>