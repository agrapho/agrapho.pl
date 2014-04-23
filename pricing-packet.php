<div class="pricing-packet-summary">
    <div class="pricing-bar"></div>
    <h1><?php echo the_title(); ?></h1>
    <p><?php echo $post->post_content; ?></p>
</div>
<div class="pricing-packet-overview">
    <div class="pricing-bar"></div>
    <div class="pricing-packet-button">
        <p>Co zawiera?</p>
    </div>
    <div class="pricing-packet-details">
        <?php echo get_post_meta(get_the_ID(),'wpcf-pricing-packet-details',TRUE); ?>
    </div>
    <div class="pricing-packet-button">
        <p>Cena</p>
    </div>
    <div class="pricing-packet-details pricing-packet-price">
        <p><?php echo get_post_meta(get_the_ID(),'wpcf-pricing-packet-price',TRUE); ?></p>
    </div>
</div>
