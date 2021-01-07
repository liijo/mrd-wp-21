jQuery(document).ready(function(){

	jQuery('.podcast-carousel').owlCarousel({
		loop:true,
		margin: 0,
		nav:true,
		navText:['<img src="images/icon-arrow-prev.png" alt="prev">','<img src="images/icon-arrow-next.png" alt="next">'],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:2
			},
			992:{
				items:2
			},
			1200:{
				items:3,
				margin: 20,
			},
			1400:{
				items:3,
				margin: 50,
			}
		}
	});

});