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

	jQuery('.brand-carousel').owlCarousel({
	    loop: true,
	    margin: 6,
	    nav: false,
			lazyLoadEager: true,
			 autoplay:true,
    	autoplayTimeout:1000,
   		autoplayHoverPause:true,
	    dots: true,

	    navText: ['<img src="https://www.mr-digital.co.uk/wp-content/themes/mr-digital/img2/red-arrow-prev.svg" alt="icon">','<img src="https://www.mr-digital.co.uk/wp-content/themes/mr-digital/img2/red-arrow-next.svg" alt="icon">'],
	    responsive:{
	        0:{
	            items:2
	        },
	        768:{
	            items:3
	        },
	        992:{
	            items:4,
	            margin: 18,
	        },
	        1200:{
	            items:5,
	            margin: 18,
	        },
	        1330:{
	            items:6,
	            margin: 18,
	        }
	    }
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
