jQuery(window).on('load resize', function(){
	var windowHeight = jQuery(window).height();
	//jQuery('#banner').height(windowHeight);
	if(jQuery(window).width() > 767){
		jQuery('.logo-slider').addClass('owl-carousel');
		jQuery('.logo-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			dots:false,
			items:6,
			autoplay:true,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
		});
		jQuery('.service-testim-slider').trigger('destroy.owl.carousel');
		jQuery('.service-testim-slider').addClass('off');
		jQuery('.service-testim-slider').removeClass('owl-carousel');
	}
	else{
		jQuery('.service-testim-slider').addClass('owl-carousel');
		jQuery('.service-testim-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			dots:false,
			items:1,
			autoplay:true,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
		});

		jQuery('.logo-slider').trigger('destroy.owl.carousel');
		jQuery('.logo-slider').addClass('off');
		jQuery('.logo-slider').removeClass('owl-carousel');
	}

});

jQuery(document).ready(function($){
	
	$('.banner-slider').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:false,
		items:1,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
	});

	$('.result-slider').owlCarousel({
		dots: false,
		autoplay: true,
		autoplayHoverPause:true,
		loop: true,
		items: 2,
		margin: 30,
		nav: true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		// autoHeight: true,
		responsive:{
			1024:{
				nav: true,
				items:2
			},
			768:{
				nav: false,
				items:2
			},
			575:{
				nav: false,
				items:1
			},
			0:{
				nav: false,
				items:1
			}
		}
	});

	$('.badge-slider').owlCarousel({
		dots: false,
		autoplay: true,
		autoplayHoverPause:true,
		loop: false,
		items: 3,
		margin: 30,
		nav: true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		responsive:{
			1024:{
				nav: true,
				items:3
			},
			768:{
				nav: false,
				items:3
			},
			575:{
				nav: false,
				items:2
			},
			0:{
				nav: false,
				items:1
			}
		}
	});

	$('.checklist-slider').owlCarousel({
		dots: false,
		autoplay: true,
		autoplayHoverPause:true,
		loop: true,
		items: 3,
		margin: 0,
		nav: true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		responsive:{
			1024:{
				nav: true,
				items:3
			},
			768:{
				nav: false,
				items:2
			},
			575:{
				nav: false,
				items:1
			},
			0:{
				nav: false,
				items:1
			}
		}
	});

	$('.dev-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		items: 1,
		autoplayHoverPause:true,
		// autoHeight: true,
	});

	$('.testim-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		items: 1,
		autoplayHoverPause:true,
	});

	$('.cs-slider').owlCarousel({
		dots: false,
		//center: true,
		items:4,
		
		loop:false,
		margin:30,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		responsive:{
			0:{
				nav: false,
				items:1
			},
			575:{
				nav: false,
				items:1
			},
			768:{
				nav: false,
				items:2
			},
			1024:{
				nav: true,
				items:3,
				stagePadding: 200,
			}
		}
	});

	$('.team-slider').owlCarousel({
		dots: false,
		items:4,
		loop:true,
		margin:30,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		responsive:{
			1024:{
				nav: true,
				items: 4
			},
			768:{
				nav: false,
				items:2
			},
			575:{
				nav: false,
				items:1
			},
			0:{
				nav: false,
				items:1
			}
		}
	});

	$('.navbar-toggler').click(function(){
		$('#top-bar').toggleClass('menu-active');
		$('body').toggleClass('overflow-hidden');
	});

	$('.launch-modal').click(function(){
		var postId = $(this).data('id');
		$('.loader-2').addClass('spinner-border');
		$.ajax({
	        url: frontend_ajax_object.ajaxurl,
	        type: 'post',
	        data: {
	            'action' : 'get_popup_content',
	            'postId' : postId
	        },
	        success: function( response ) {
	        	console.log(response);
	            $('#exampleModalLabel').html(response.title);
	            $('#modal-body').html(response.image);
	            $('.loader-2').removeClass('spinner-border');
	            $('#prevpost').data('id', response.prevpost);
	            $('#nextpost').data('id', response.nextpost);
	        },
	    });
	});

	$('#load-more').click(function(e){
		e.preventDefault();
		$('.loader-3').addClass('spinner-border');
		var btn = $(this);
		var offset = $('input[name=offset]').val();
		var term = $('select[name=work_category]').val();
		var ptype = $(this).data('ptype');
		$.ajax({
	        url: frontend_ajax_object.ajaxurl,
	        type: 'post',
	        data: {
	            'action' : 'get_post_set',
	            'offset' : offset,
	            'ptype' : ptype,
	            'term' : term
	        },
	        success: function( response ) {
	        	$('.loader-3').removeClass('spinner-border');
	            $('#works').append(response.html);
	            $('input[name=offset]').val(parseInt(offset)+6);
	            if($('#works > div').length == $('input[name=total-posts]').val()){
	            	$( '<p class="alert alert-primary">No more posts</p>' ).insertAfter( '#load-more' );
	            	btn.remove();
	            }
	        },
	    });
	});

});

var a = 0;
jQuery(window).scroll(function() {
	if(jQuery('#counter').length){
		var oTop = jQuery('#counter').offset().top - window.innerHeight;
		if (a == 0 && jQuery(window).scrollTop() > oTop) {
			jQuery('.counter-value').each(function() {
				var $this = jQuery(this),
				countTo = $this.attr('data-count');
				jQuery({
					countNum: $this.text()
				}).animate({
					countNum: countTo
				},
				{
					duration: 2000,
					easing: 'swing',
					step: function() {
						$this.text(Math.floor(this.countNum));
					},
					complete: function() {
						$this.text(this.countNum);
	        		}
	    		});
			});
			a = 1;
		}
	}
});

jQuery(window).scroll(function(){
	var headerTop = jQuery('header').height();
	if(jQuery('header').hasClass('short-header')){
		headerTop = 1;
	}
    if(jQuery(this).scrollTop() >= headerTop){
    	jQuery('#top-bar').removeClass('position-absolute');
    	jQuery('#top-bar').addClass('position-fixed visible');
    }
    else{
    	jQuery('#top-bar').addClass('position-absolute');
    	jQuery('#top-bar').removeClass('position-fixed visible');	
	}
});

var myModalEl = document.getElementById('csModal')
myModalEl.addEventListener('hidden.bs.modal', function (event) {
	document.getElementById('exampleModalLabel').innerHTML = '';
	document.getElementById('modal-body').innerHTML = '';
});