jQuery(document).ready(function(){

	// console.log('jQuery');

	jQuery('.popup-panel').each(function() {
    	jQuery(this).magnificPopup({
        	delegate: 'a',
        	type: 'image',
        	mainClass: 'mfp-fade',
        	mainClass: 'mfp-with-zoom',
        	removalDelay: 300,
        	gallery: {
        		enabled:true
        	},
        	zoom: {
			    enabled: true,
			    duration: 300,
			    easing: 'ease-in-out',
			}
    	});
	});

	// Water Wheel Carousel
	var carousel = jQuery("#carousel").waterwheelCarousel({
	   flankingItems: 3,
	   movingToCenter: function ($item) {
	      jQuery('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
	   },
	   movedToCenter: function ($item) {
	      jQuery('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
	   },
	   movingFromCenter: function ($item) {
	      jQuery('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
	   },
	   movedFromCenter: function ($item) {
	      jQuery('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
	   },
	   clickedCenter: function ($item) {
	      jQuery('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
	   }
	});

	jQuery('#prev').bind('click', function () {
	   carousel.prev();
	   return false
	});

	jQuery('#next').bind('click', function () {
	   carousel.next();
	   return false;
	});

	jQuery('#reload').bind('click', function () {
	   newOptions = eval("(" + jQuery('#newoptions').val() + ")");
	   carousel.reload(newOptions);
	   return false;
	});


}); //Document End
