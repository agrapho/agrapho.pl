+function($) {

  function initializeLogo() {
    var div_width = $('#header-logo').width();
    var left_pos_ref = $('.navbar-header').position().left;
    var top_pos_ref = 170;

    // agrapho
    $('#logo-part-1').data('params', {
        left0: left_pos_ref,
        left1: left_pos_ref,
	top0 : top_pos_ref,
	top1 : 15,
	width0: div_width,
	width1: 100,
	opacity0: 1.0,
	opacity1: -0.2
    }); 

    // O|
    $('#logo-part-2').data('params', {
        left0: left_pos_ref + div_width * 0.015,
        left1: left_pos_ref,
	top0 : top_pos_ref + div_width * 0.2,
	top1 : 15,
	width0: div_width * 0.09,
	width1: 42,
        opacity0: 1.0,
        opacity1: 1.0
    }); 

    // GRAPH
    $('#logo-part-3').data('params', {
        left0: left_pos_ref + div_width * 0.112,
        left1: left_pos_ref + 35,
	top0 : top_pos_ref + div_width * 0.235,
	top1 : 40,
	width0: div_width * 0.28,
	width1: 20,
        opacity0: 1.0,
        opacity1: -0.2
    }); 
	
    // O
    $('#logo-part-4').data('params', {
        left0: left_pos_ref + div_width * 0.395,
        left1: left_pos_ref + 19,
	top0 : top_pos_ref + div_width * 0.19,
	top1 : 29,
	width0: div_width * 0.09,
	width1: 38,
        opacity0: 1.0,
        opacity1: 1.0
    }); 

    // Design blue
    $('#logo-part-5').data('params', {
        left0: left_pos_ref + div_width * 0.438,
        left1: left_pos_ref + 37,
	top0 : top_pos_ref + div_width * 0.198,
	top1 : 31,
	width0: div_width * 0.136,
	width1: 62,
        opacity0: 0.0,
        opacity1: 1.0
    }); 

    // Design gray
    $('#logo-part-6').data('params', {
        left0: left_pos_ref + div_width * 0.438,
        left1: left_pos_ref + 37,
	top0 : top_pos_ref + div_width * 0.198,
	top1 : 31,
	width0: div_width * 0.136,
	width1: 62,
        opacity0: 1.0,
        opacity1: 0.0
    }); 

    positionLogo();
  };

  function showLogo() {
    var logo = $('#header-logo');
    if (! $(logo).parent().hasClass('active')) {
      $(logo).fadeIn("slow");
    }
  };

  function hideLogo() {
    var logo = $('#header-logo');
    if ($(logo).parent().hasClass('active')) {
      $(logo).fadeOut("slow");
    }
  };

  function positionLogo() {
    var maxScrollTop = 500;
    var scrollTop = $(this).scrollTop();

    function move(p0, p1, s) {
        return Math.max((-p0 + p1) / maxScrollTop  * s + p0, p1);
    }
    
    for (var i = 1; i <= 6; i++) {
      var logo = $('#logo-part-' + i);
    
      var x = move($(logo).data('params').left0, $(logo).data('params').left1, scrollTop),
          y = move($(logo).data('params').top0, $(logo).data('params').top1, scrollTop),
          opacity = move($(logo).data('params').opacity0, $(logo).data('params').opacity1, scrollTop),
          width = move($(logo).data('params').width0, parseInt($(logo).data('params').width1), scrollTop);

      $(logo).stop().css({
          left: x + 'px',
          top: y + 'px',
          width: width + 'px',
          opacity: opacity
      });
    }
  };

  function showBubbles() {
    $('#header-bubbles').show();
    $('.bubble').each(function() {
	var maxBubbleSize = 200;
	var containerWidth = $(window).width();
	var containerHeight = $('#header-bubbles').height();

	var bubbleSize = Math.random() * 100 + 50;
	var opacity = (Math.random() + 0.7) / 2;
	var rColor = Math.floor(Math.random() * 28 + 32);
	var gColor = Math.floor(Math.random() * 50 + 150);
	var bColor = Math.floor(Math.random() * 50 + 150);
	var left = Math.random() * (containerWidth - maxBubbleSize);
	var top = Math.random() * (containerHeight - maxBubbleSize) + 80;

	$(this).data('params', {
		size: bubbleSize,
		opacity: opacity
    	}); 
	$(this).width(bubbleSize);
	$(this).height(bubbleSize);
	$(this).offset({left: left, top: top});
	$(this).css("background", "rgba(" + rColor + ", " + gColor + ", " + bColor + ", " + opacity + ")");
    });
  };

  function hideBubbles() {
    $('#header-bubbles').hide();
  };

  function positionBubbles() {
    var scrollTop = $(this).scrollTop();

    $('.bubble').each(function() {
      if (scrollTop > $(this).offset().top - 90) {
        bubbleSize = 0;
      } else {
        bubbleSize = $(this).data('params').size;
      }
      $(this).stop().animate({
        width: bubbleSize,
        height: bubbleSize
      }, 50, function() {
        // Animation complete.
      });
    });

  };

  $(document).ready(function() {
    $('#header-carousel').carousel('pause');
    initializeLogo();
  });


  $('#header-carousel').on('slide.bs.carousel', function () {
    hideLogo();
    hideBubbles();
    showLogo();
  });

  $('#header-carousel').on('slid.bs.carousel', function () {
    showBubbles();
  });

  $(window).scroll(function () {
    positionBubbles();
    positionLogo();
  });

  $('.bubble').hover(
        // Display text in bubble
        function () {
            $(this).stop().animate({
                'width'     : '200',
                'height'    : '200',
                'opacity'   : '1.0'
            }, 500, function(){
                $(this).find('p').fadeIn(200);
            });
        },
        function () {
	    var bubbleSize = $(this).data('params').size;
	    var opacity = $(this).data('params').opacity;
            $(this).find('p').fadeOut(100);
            $(this).stop().animate({
                'width'     : bubbleSize,
                'height'    : bubbleSize,
		'opacity'   : opacity
            }, 1000);
        }
    );
}(jQuery);
