// Initiate WOW ________________________________________________________________
new WOW().init();

// Parallaxie __________________________________________________________________
$('.parallaxie').parallaxie({
  speed: 0.5,
});


// Normalise div heights _______________________________________________________
$.fn.divHeights = function() {

    var items = $(this), //grab all slides
        heights = [], //create empty array to store height values
        tallest; //create variable to make note of the tallest slide

    var normaliseHeights = function() {

        items.each(function() { //add heights to array
            heights.push($(this).height());
        });
        tallest = Math.max.apply(null, heights); //cache largest value
        items.each(function() {
            $(this).css('min-height',tallest + 'px');
        });
    };

    normaliseHeights();

    $(window).on('resize orientationchange', function () {
        //reset vars
        tallest = 0;
        heights.length = 0;

        items.each(function() {
            $(this).css('min-height','0'); //reset min-height
        });
        normaliseHeights(); //run it again
    });
};

jQuery(function($){
    $(window).on('load', function(){
      $('#heroContent').find('.carousel-item').divHeights();
    });
});

// Carousel Sync _______________________________________________________________
$('.carousel-sync').on('slide.bs.carousel', function (ev) {
    // get the direction, based on the event which occurs
    var dir = ev.direction == 'right' ? 'prev' : 'next';
    // get synchronized non-sliding carousels, and make'em sliding
    $('.carousel-sync').not('.sliding').addClass('sliding').carousel(dir);
});
$('.carousel-sync').on('slid.bs.carousel', function (ev) {
    // remove .sliding class, to allow the next move
    $('.carousel-sync').removeClass('sliding');
});

// sync clicks on carousel-indicators as well
$('.carousel-sync .carousel-indicators li').click(function (e) {
    e.stopPropagation();
    var goTo = $(this).data('slide-to');
    $('.carousel-sync').not('.sliding').addClass('sliding').carousel(goTo);
});

// Menu Height _______________________________________________________________
$('document').ready(function(){
  var mHeight = $('header').outerHeight(),
      padding = parseInt(mHeight) + 96;

  $('.page_title').css('padding-top', padding + 'px');
});

// Class on Scroll _____________________________________________________________
function init() {
window.addEventListener('scroll', function(e){
	var distanceY = window.pageYOffset || document.documentElement.scrollTop,
		shrinkOn = 200,
		header = document.querySelector("headerfixed");
	if (distanceY > shrinkOn) {
		classie.add(headerfixed,"drop");
	} else {
		if (classie.has(headerfixed,"drop")) {
			classie.remove(headerfixed,"drop");
		}
	}
});
}
window.onload = init();

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
		$('#headerfixed').addClass('dropIt');
  } else {
    $('#headerfixed').removeClass('dropIt');

  }
  prevScrollpos = currentScrollPos;
}

// Hamburger _____________________________________________________________
$('.hamburger').click(function(){
  $('body').toggleClass('openMenu');
});
