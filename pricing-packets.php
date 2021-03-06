<?php
/*
Template Name: Pricing packets
*/
?>

<div class="entry-content container">
      <?php echo the_content(); ?>
      <br/>
      <small>* Podane seny są cenami netto. Niniejszy cennik nie stanowi oferty w rozumieniu przepisów prawa cywilnego, a jedynie zaproszenie do rozpoczęcia negocjacji.</small>
</div>

<?php $post_data = get_post($post->post_parent);
      $packet_category = get_category_by_slug($post_data->post_name);
      $args = array( 'post_type' => 'pricing-packet',
                     'posts_per_page' => -1,
                     'category' => $packet_category->term_id,
	             'order' => 'ASC' );
      $posts = get_posts( $args ); ?>
      <div class="container">
          <?php foreach ( $posts as $post ) { ?>
          <div class="pricing-packet col-md-<?php echo floor(12 / count($posts)); ?>">
                <?php get_template_part( 'pricing-packet', get_post_format($post->ID) ); ?>
          </div>
          <?php } ?>
      </div>
