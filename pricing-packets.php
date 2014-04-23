<?php
/*
Template Name: Pricing packets
*/
?>
<?php $post_data = get_post($post->post_parent);
      $packet_category = get_category_by_slug($post_data->post_name);
      $args = array( 'post_type' => 'pricing-packet',
                     'posts_per_page' => -1,
                     'category' => $packet_category->term_id,
	             'orderby' => title,
	             'order' => 'ASC' );
      $posts = get_posts( $args ); ?>
      <div class="row">
          <?php foreach ( $posts as $post ) { ?>
          <div class="pricing-packet col-md-3">
                <?php get_template_part( 'pricing-packet', get_post_format($post->ID) ); ?>
          </div>
          <?php } ?>
      </div>
