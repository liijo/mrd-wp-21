jQuery(window).on('load resize', function(){
	var windowHeight = jQuery(window).height();
	//jQuery('#banner').height(windowHeight);
	if(jQuery(window).width() > 575){
		jQuery('.process .processes').trigger('destroy.owl.carousel');
		jQuery('.process .processes').addClass('off');
		jQuery('.process .processes').removeClass('owl-carousel');
	}
	else{
		jQuery('.service-testim-slider, .process .processes').addClass('owl-carousel');
		jQuery('.process .processes').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			dots:true,
			items:1,
			autoHeight:true,
			autoplay:false,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
			navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		});

		jQuery('.processes.owl-carousel .owl-dots .owl-dot').each(function(){
			var index = jQuery(this).index();
			jQuery(this).find('span').text(index+1);
		});

	}
	if(jQuery(window).width() > 767){
		jQuery('.service-testim-slider').trigger('destroy.owl.carousel');
		jQuery('.service-testim-slider').addClass('off');
		jQuery('.service-testim-slider').removeClass('owl-carousel');
	}
	else{
		jQuery('.service-testim-slider').addClass('owl-carousel');
		jQuery('.service-testim-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			dots:false,
			items:1,
			autoplay:false,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
			navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		});

		jQuery('.logo-slider').trigger('destroy.owl.carousel');
		jQuery('.logo-slider').addClass('off');
		jQuery('.logo-slider').removeClass('owl-carousel');

	}

	jQuery('.showExitForm').click(function(event) {
		event.preventDefault();
		jQuery('.subscribers_form_pop').show();
	});

});

jQuery(document).ready(function($){

	$('.influencer-slider').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:true,
		items:5,
		autoplay:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		responsive:{
			1024:{
				items:5
			},
			768:{
				items:3
			},
			575:{
				items:2
			},
			0:{
				items:1
			}
		}
	});

	$('.result-slider').owlCarousel({
		dots: false,
		autoplay: false,
		autoplayHoverPause:true,
		loop: true,
		items: 2,
		margin: 30,
		nav: true,
		autoHeight:true,
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
				nav: true,
				items:1
			},
			0:{
				nav: true,
				items:1
			}
		}
	});

	$('.badge-slider').owlCarousel({
		dots: false,
		autoplay: false,
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
		autoplay: false,
		autoplayHoverPause:true,
		loop: false,
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
				nav: true,
				items:1
			}
		}
	});

	$('.events-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		margin: 10,
		autoplay: false,
		items: 1,
		autoplayHoverPause:true,
	});

	$('#carrousel').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin: 10,
		autoplay: false,
		items: 1,
		autoHeight: true,
		autoplayHoverPause:true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
	});

	$('.dev-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplay: false,
		items: 1,
		autoplayHoverPause:true,
		//autoHeight: true,
	});

	$('.dev-slider .owl-dots .owl-dot').each(function(){
		var index = $(this).index();
		$(this).find('span').text(index+1);
	});

	$('.testim-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplay: false,
		items: 1,
		autoplayHoverPause:true,
		margin: 10,
	});

	$('.cs-slider').owlCarousel({
		dots: false,
		//center: true,
		items:4,
		autoHeight: true,
		loop:false,
		margin:30,
		autoplay:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:true,
		navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
		responsive:{
			0:{
				nav: true,
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

	$('.blog-slider').owlCarousel({
		dots: true,
		items:1,
		stagePadding: 200,
		loop:false,
		margin:50,
		autoplay:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:false,
		responsive:{
			3240:{
				nav: false,
				items:4
			},
			2160:{
				nav: false,
				items:3
			},
			1024:{
				nav: false,
				items:2
			},
			768:{
				nav: false,
				items:2,
				stagePadding: 0,
				margin:20,
			},
			0:{
				nav: false,
				items:1,
				stagePadding: 0,
				margin:20,
			}
		}
	});

	$('.team-slider').owlCarousel({
		dots: false,
		items:4,
		loop:false,
		margin:30,
		lazyLoad: true,
		autoplay:false,
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
				items:3
			},
			575:{
				nav: false,
				items:2
			},
			0:{
				nav: true,
				items:2,
				margin:15,
			}
		}
	});

	$('.navbar-toggler').click(function(){
		$('header').toggleClass('menu-active');
		$('body').toggleClass('overflow-hidden');
	});

	$('body').on('click', '.launch-modal', function(){
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
				$('#exampleModalLabel').html(response.title);
				$('#modal-body').html(response.image);
				$('.loader-2').removeClass('spinner-border');
				$('#prevpost').data('id', response.prevpost);
				$('#nextpost').data('id', response.nextpost);
				if(response.file){
					$('#download-file').show();
					$('#download-file').attr('href', response.file);
				}
				else{
					$('#download-file').hide();
				}
			},
		});
	});



	$('.btn-play').click(function(){
		var postId = $(this).data('id');
		$('.loader-2').addClass('spinner-border');
		$.ajax({
			url: frontend_ajax_object.ajaxurl,
			type: 'post',
			data: {
				'action' : 'get_popup_content_video',
				'postId' : postId
			},
			success: function( response ) {
				console.log(response);
				$('#video').html(response.video);
				$('.loader-2').removeClass('spinner-border');
			},
		});
	});

	$('#video-popup .btn-close').click(function(){
		$('#video').html('');
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

	$(".podcast-video").on('hidden.bs.modal', function (e) {
		var $frame = $(this).find('iframe');
		var vidsrc = $frame.attr('src');
		$frame.attr('src', '');
		$frame.attr('src', vidsrc);
		console.log(vidsrc);

		var div = document.getElementById("video-wrap");
		var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
		iframe.postMessage('{"method":"pause"}', '*');
	});

	$('#mrd-post-content img').wrap('<figure></figure>');

	var imgH = 0;
	$('#carousel img').each(function(){
		if( $(this).height() > imgH )
			imgH = $(this).height();
	});
	imgH += 60;
	$('#carousel').height(imgH);

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
/*var prevScrollpos = jQuery(window).scrollTop();
jQuery(window).scroll(function(){
	var headerTop = jQuery('.main-slider').height();
	if(jQuery('header').hasClass('short-header')){
		headerTop = 1;
	}

	var currentScrollPos = jQuery(window).scrollTop();
	var windowWidth = jQuery(window).width();

	if(jQuery(this).scrollTop() >= headerTop){
		if(windowWidth < 800){
			if (prevScrollpos > currentScrollPos) {
				jQuery('#top-bar').removeClass('position-absolute');
				jQuery('#top-bar').addClass('visible');

			} else{
				jQuery('#top-bar').addClass('position-absolute');
				jQuery('#top-bar').removeClass('visible');
			}
		} else{
			jQuery('#top-bar').removeClass('position-absolute');
			jQuery('#top-bar').addClass('visible');
		}

	}
	else{
		jQuery('#top-bar').addClass('position-absolute');
		jQuery('#top-bar').removeClass('visible');
	}
	prevScrollpos = currentScrollPos;

});*/

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = jQuery('header').outerHeight();

jQuery(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = jQuery(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        jQuery('header').removeClass('nav-down').addClass('nav-up');
    } else if(st <= 100){
    	jQuery('header').removeClass('nav-down');
    }
    else {
        // Scroll Up
        if(st + jQuery(window).height() < jQuery(document).height()) {
            jQuery('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}




function printDiv() {
	var divContents = document.getElementById("modal-body").innerHTML;
	var a = window.open('', 'Print-Window');
	a.document.write('<html><head><title>Print Case Study</title>');
	a.document.write('<body>');
	a.document.write(divContents);
	a.document.write('</body></html>');
	a.document.close();
	a.print();
	setTimeout(function(){a.close();},10);
}

var myModalEl = document.getElementById('csModal')
myModalEl.addEventListener('hidden.bs.modal', function (event) {
	document.getElementById('exampleModalLabel').innerHTML = '';
	document.getElementById('modal-body').innerHTML = '';
});

jQuery(window).load(function(){
	jQuery('#page-loader').hide();
	var imgH = 0;
	jQuery('#carousel img').each(function(){
		if( jQuery(this).height() > imgH )
			imgH = jQuery(this).height();
	});
	imgH += 60;
	jQuery('#carousel').height(imgH);
});


///////////////


	////Exit Modal
	document.addEventListener("DOMContentLoaded", () => {
		document.addEventListener("mouseout", (event) => {
			if (!event.toElement && !event.relatedTarget) {

				var cookiecheck = getCookie('exitpopup');
				if(jQuery('#exitmodal.notopened').length){
						// if(cookiecheck == ""){
							setTimeout(() => {
				        // console.log('shsh');
				        var myModal = new bootstrap.Modal(document.getElementById('exitmodal'), {
				        	keyboard: false
				        })
				        myModal.show();
				        jQuery('#exitmodal').removeClass('notopened');
								// setCookie('exitpopup', 'shown', 1);
							}, 100);
						// }
					}
				}
			})
	});

	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
////////
