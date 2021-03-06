+function($) {

  $(document).ready(function() {
    var $navbar = $('.navbar-nav:last-child');
    var offset = ($(window).width() - ($navbar.offset().left)) * 1.35;
    $('.navbar > .row-fluid').css('background-size', offset + 'px 100%');
  });

  $(".anchor-link").click(function() {
    // remove 'active' class from all links
    $(".home .main-menu-nav .anchor-link").removeClass("active");
    $(".submenu-nav .anchor-link").removeClass("active");
    // add 'active' class to clicked link and scroll
    $(this).addClass("active");
    $('html, body').animate({
        scrollTop: $( $(this).find("a").attr('href') ).offset().top - 70
    }, 500);
    return false;
  });

}(jQuery);
