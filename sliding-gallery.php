<?php
/*
Template Name: Sliding Gallery Page
*/
?>

<div class="bg-section">
  <div class="row-fluid">
    <div class="container">
      <!-- Elastislide Carousel -->
      <ul id="carousel" class="elastislide-list">
      <?php $images = get_attachments_by_parent_id( $post->ID );
            $colorbox_gallery_category = get_category_by_slug('colorbox-gallery');
            foreach($images as $image):
                $subgallery_name = $image->post_excerpt;
                $args = array('name' => $subgallery_name,
                              'category' => $colorbox_gallery_category->cat_ID);
                $subgallery_posts = get_posts( $args );
                foreach($subgallery_posts as $subgallery):
                    $image_subgallery = get_attachments_by_parent_id( $subgallery->ID ); ?>
                    <li>
                    <?php $is_first_sub_image = true;
                          foreach($image_subgallery as $sub_image):
                              echo '<a href="' . wp_get_attachment_image_src($sub_image->ID, 'full')[0] . '" class="colorbox colorbox-' . $subgallery_name . '" rel="' . $subgallery_name . '" title="' . $sub_image->post_excerpt . '">';
                              if ($is_first_sub_image)
                                  echo '<img src="' . wp_get_attachment_image_src($image->ID, 'thumbnail')[0] . '"></img>';
                              $is_first_sub_image = false;
                              echo '</a>';
                            endforeach; ?>
                    </li>
      <?php     endforeach; // END $subgallery_posts
            endforeach; // END $images
      ?>
      </ul>
      <!-- End Elastislide Carousel -->
    </div><!--/.container-->
  </div><!--/.row-fluid-->
</div><!--/.bg-section-->

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/elastislide/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/elastislide/js/jquery.elastislide.js"></script>
<script type="text/javascript">
    jQuery( '#carousel' ).elastislide( { minItems : 2 } );
    jQuery( 'a.colorbox' ).colorbox({maxWidth:'95%', maxHeight:'95%'});
</script>
