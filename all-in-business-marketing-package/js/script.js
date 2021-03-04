jQuery(document).ready(function(){

	jQuery(window).scroll(function() {    
	    var scroll = jQuery(window).scrollTop();
	    if (scroll >= 1) {
	        jQuery(".site-header").addClass("scrolled");
	    } else {
	        jQuery(".site-header").removeClass("scrolled");
	    }
	});

	jQuery('.row-popup-gallery').magnificPopup({
		delegate: 'a',
  		type: 'image',
  		removalDelay: 300,
		mainClass: 'mfp-with-zoom',
		gallery:{
			enabled:true
		},
		zoom: {
			enabled: true,
			duration: 500,
			easing: 'ease-in-out',
			opener: function(openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});

	jQuery('.portfolio-carousel').owlCarousel({
	    loop:true,
	    margin: 30,
	    nav:true,
	    dots: true,
	    center: true,
	    autoHeight:true,
	    navSpeed: 600,
	    navText: ['<img src="img/prev-arrow.svg" alt="prev">','<img src="img/next-arrow.svg" alt="next">'],
	    responsive:{
	        0:{
	            items:1
	        },
	        992:{
	            items:2,
	            margin: 0,
	        },
	        1200:{
	            items:2,
	            margin: 0,
	        },
	        1400:{
	            items:2,
	            margin: 0,
	        },
	        1600:{
	            items:3,
	            margin: 0,
	        }
	    }
	});

	jQuery('.testimonial-carousel').owlCarousel({
	    loop:true,
	    margin: 30,
	    nav:true,
	    dots: true,
	    autoHeight:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        1200:{
	            items:2
	        },
	        1400:{
	            items:2,
	            margin: 60,
	        }
	    }
	});

	// $('#teamCarousel').owlCarousel({
	//     loop:true,
	//     margin:10,
	//     nav:true,
	//     dots: true,
	//     navText:['<img src="img/arrow-prev.svg" alt="icon">','<img src="img/arrow-next.svg" alt="icon">'],
	//     responsive:{
	//         0:{
	//             items:2
	//         },
	//         768:{
	//             items:3
	//         },
	//         992:{
	//             items:3
	//         },
	//         1200:{
	//             items:4
	//         },
	//         1400:{
	//             items:4
	//         }
	//     }
	// });


	// $('.btn-grid-toggle').on('click',function(){
	// 	$('.toggle').toggleClass('active');
	// 	$('.toggle-mobile').toggleClass('active');
	// });

    // $('.btn-grid-toggle').click(function(){
    //    if($(this).text() == 'close')
    //    {
    //        $(this).text('Load more');
    //    }
    //    else
    //    {
    //        $(this).text('close');
    //    }
	// });
	
	jQuery('#videoTestimonials').owlCarousel({
	    loop:false,
	    margin: 10,
	    nav:true,
	    dots: true,
	    navText:['<img src="img/arrow-prev.svg" alt="icon">','<img src="img/arrow-next.svg" alt="icon">'],
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:1
	        },
	        992:{
				items:2,
				margin: 30,
	        },
	        1200:{
				items:2,
				margin: 40,
	        }
	    }
	});

	jQuery('#expertCarousel').owlCarousel({
	    loop:true,
	    margin: 30,
	    nav:true,
	    dots: true,
		autoHeight:true,
		navText:['<img src="img/arrow-prev.svg" alt="icon">','<img src="img/arrow-next.svg" alt="icon">'],
	    responsive:{
	        0:{
	            items:1
	        },
	        1200:{
	            items:2
	        },
	        1400:{
	            items:2,
	            margin: 40,
	        }
	    }
	});


}); //Document End
