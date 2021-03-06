+function($) {

  $(window).load(function() {
    var max_height = 0;
    $('.cooperation-phase').each(function() {
      max_height = 0;
      $(this).children('div').each(function() {
        if ($(this).height() > max_height) {
          max_height = $(this).height();
        }
      });
      $(this).children('div').each(function() {
        $(this).height(max_height);
      });
    });

    max_height = 0;
    $('.pricing-packet-summary').each(function() {
      if ($(this).height() > max_height) {
        max_height = $(this).height();
      }
    });
    $('.pricing-packet-summary').each(function() {
      $(this).height(max_height);
    });

    packet_count = $('.pricing-packet-summary .pricing-bar').length;
    packet_no = 1;
    $('.pricing-packet-summary .pricing-bar').each(function() {
      $(this).css('height', packet_no/packet_count*100 + "%");
      packet_no += 1;
    });
  });

  $(".pricing-packet-button").click(function() {
    $(this).next().slideToggle();
  });

}(jQuery);
