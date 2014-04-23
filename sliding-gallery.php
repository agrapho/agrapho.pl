<?php
/*
Template Name: Sliding Gallery Page
*/
?>

<!-- Elastislide Carousel -->
<ul id="carousel" class="elastislide-list">
<?php $args = array('post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'post_parent' => $post->ID,
                    'posts_per_page' => -1 );
      $images = get_posts( $args );
      foreach($images as $image):
          echo '<li><a href="#"><img src="' . wp_get_attachment_image_src($image->ID, 'thumbnail')[0] . '"></img></a></li>';
      endforeach;
?>
</ul>
<!-- End Elastislide Carousel -->

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/elastislide/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/elastislide/js/jquery.elastislide.js"></script>
<script type="text/javascript">
    jQuery( '#carousel' ).elastislide( { minItems : 2 } );
</script>
