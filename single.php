<?php get_header(); ?> 
    
<div id="content" class="container">
  <div class="row-fluid">
    <div class="span12">
      <div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
        <?php 

        while(have_posts()): the_post(); ?>
 
          <div  <?php post_class('post'); ?>>
            <div class="clear"></div>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <?php wp_link_pages( ); ?>
          </div>

        <?php endwhile; ?>

      </div> <!-- /#post -->
    </div> <!-- /.span12 -->
  </div> <!-- /.row-fluid -->
</div> <!-- /.container -->

<?php get_footer(); ?>