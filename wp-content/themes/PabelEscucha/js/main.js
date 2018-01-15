 

 
 sliderGalery = $('.slider').bxSlider({
 auto: true
});

 slider = $('.sliderMenuMovil').bxSlider({
    slideWidth: 160,
    nextSelector: '#pronext',
 	prevSelector: '#proprev',
    nextText: '<img src="http://localhost:8888/pabelescucha/wp-content/themes/PabelEscucha/img/slider/right.png" height="16" width="16"/>',
	prevText: '<img src="http://localhost:8888/pabelescucha/wp-content/themes/PabelEscucha/img/slider/left.png" height="16" width="16"/>',
    minSlides: 2,
    maxSlides: 3,
    slideMargin: 0,
 	autoControls: false,
 	auto: true,
 	controls: true,
 	pager: false
});










// SUBMENU

$('.misPropuestas').mouseover(function() {
  $( ".submenuMisPropuestas" ).stop( true, true ).fadeIn();	
});

$('.misPropuestas').mouseleave(function() {
  $( ".submenuMisPropuestas" ).fadeOut();
});

  
$( function() {
    $('.Desc').characterCountdown({countdownTarget: '.countdown',maxChars:251});
});
 