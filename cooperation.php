<?php
/*
Template Name: Cooperation
*/
?>


<div class="container">
<?php echo the_content();
      $post_data = get_post($post->post_parent);
      $cooperation_category = get_category_by_slug('cooperation');
      $temp_query = $wp_query;
      $cooperation_subcategories = get_category_tags($cooperation_category);
      $wp_query = $temp_query;
      $cooperation_phase_style = 1;
      foreach ( $cooperation_subcategories as $cooperation_subcategory ) { ?>
          <div class="row cooperation-phase cooperation-phase-style-<?php echo $cooperation_phase_style; ?>">
                <div class="col-md-3 cooperation-phase-images">
                  <?php $args = array( 'post_type' => 'post',
                                       'posts_per_page' => -1,
                                       'category' => $cooperation_category->term_id,
                                       'tag' => $cooperation_subcategory,
	                               'order' => 'ASC' );
                        $posts = get_posts( $args );
                        foreach ( $posts as $post ) {
                            $attachments = get_posts( array('post_type' => 'attachment', 'post_parent' => $post->ID) );
                            foreach ( $attachments as $attachment ) {
                                echo wp_get_attachment_image( $attachment->ID, 'thumbnail' );
                            }
                        } ?>
                </div>
                <div class="col-md-3 cooperation-phase-name">
                    <h2><?php echo $cooperation_subcategory; ?></h2>
                </div>
                <div class="col-md-6 cooperation-phase-content">
                    <div class="cooperation-phase-brackets"></div>
                  <?php $args = array( 'post_type' => 'post',
                                       'posts_per_page' => -1,
                                       'category' => $cooperation_category->term_id,
                                       'tag' => $cooperation_subcategory,
	                               'order' => 'ASC' );
                        $posts = get_posts( $args );
                        foreach ( $posts as $post ) { ?>
                            <div class="cooperation-sub-phase" style="height: <?php echo (100 / count($posts)); ?>%;">
                                <div class="cooperation-sub-phase-content">
                                    <h3><?php echo the_title(); ?></h3>
                                    <?php echo $post->post_content; ?>
                                </div>
                            </div>
                  <?php } ?>
                </div>
          </div>
      <?php
          if ($cooperation_phase_style == 1)
              $cooperation_phase_style = 2;
          else
              $cooperation_phase_style = 1;
      } ?>
</div>
