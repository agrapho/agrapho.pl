<?php
$background_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
?>

<section id="<?php echo $post->post_name; ?>" class="bg-section" style="background: url(<?php echo $background_image_url ?>) no-repeat center center fixed;">
  <div class="row-fluid">
    <div class="container">
      <p><?php echo $post->post_content; ?></p>
    </div>
  </div>
</section>