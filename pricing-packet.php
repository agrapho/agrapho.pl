<div class="pricing-packet-summary">
    <div class="pricing-bar"></div>
    <h2><?php echo the_title(); ?></h2>
    <p><?php echo $post->post_content; ?></p>
</div>
<div class="pricing-packet-overview">
    <div class="pricing-bar"></div>
    <?php $pricing_packet_details = get_post_meta(get_the_ID(),'wpcf-pricing-packet-details',TRUE);
          if ($pricing_packet_details) { ?>
            <div class="pricing-packet-button">
                <p>Co zawiera?</p>
            </div>
            <div class="pricing-packet-details">
                <?php echo $pricing_packet_details; ?>
            </div>
    <?php } ?>
    <div class="pricing-packet-button">
        <p>Cennik</p>
    </div>
    <div class="pricing-packet-details pricing-packet-price">
        <?php echo get_post_meta(get_the_ID(),'wpcf-pricing-packet-prices',TRUE); ?>
    </div>
</div>