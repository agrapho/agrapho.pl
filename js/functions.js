+function($) {

  $(document).ready(function() {
    $('.pricing-bar').each(function() {
      $(this).css('height', '50%');
    });
  });

  $(".pricing-packet-button").click(function() {
    $(this).next().slideToggle();
  });

}(jQuery);
