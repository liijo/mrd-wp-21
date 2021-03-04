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
	    navText: ['<img src="' + ajaxcalls_vars.theme_url+ '/img/prev-arrow.svg" alt="prev">','<img src="' + ajaxcalls_vars.theme_url+ '/img/next-arrow.svg" alt="next">'],
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
	jQuery('.row-expert').owlCarousel({
	    loop:false,
	    // margin: 30,
	    nav:true,
			navText:['<img src="' + ajaxcalls_vars.theme_url+ '/img/arrow-prev.svg" alt="icon">','<img src="' + ajaxcalls_vars.theme_url+ '/img/arrow-next.svg" alt="icon">'],
	    dots: true,
	    autoHeight:true,
			lazyLoad: false,
	    responsive:{
	        0:{
	            items:1,
							margin : 0,
	        },
	        1200:{
	            items:2,
							margin: 60
	        },
	        992:{
	            items:2,
							margin: 60
	        },
	        1400:{
	            items:2,
	            margin: 60,
	        }
	    }
	});

	jQuery('#teamCarousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    dots: true,
			lazyLoad: false,
	    navText:['<img src="' + ajaxcalls_vars.theme_url+ '/img/arrow-prev.svg" alt="icon">','<img src="' + ajaxcalls_vars.theme_url+ '/img/arrow-next.svg" alt="icon">'],
	    responsive:{
	        0:{
	            items:2
	        },
	        768:{
	            items:3
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:4
	        },
	        1400:{
	            items:4
	        }
	    }
	});


	jQuery('.btn-grid-toggle').on('click',function(){
		jQuery('.toggle').toggleClass('active');
		jQuery('.toggle-mobile').toggleClass('active');
	});

    jQuery('.btn-grid-toggle').click(function(){
       if(jQuery(this).text() == 'close')
       {
           jQuery(this).text('Load more');
       }
       else
       {
           jQuery(this).text('close');
       }
    });

	//////////////////////////
	//////////
	jQuery('#mrdServices').change(function(event) {
		var service = jQuery(this).val();
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxcalls_vars.admin_url + 'admin-ajax.php',
			data: {
					'action'    :   'get_includes',
					'service'    :   service,
				},
				beforeSend: function(){
					// thisLink.append('<i class="fa fa-spinner fa-spin"></i>');
					jQuery('.service-calc-panel').append('<div class="preloaders"><i class="fa fa-spinner fa-spin"></i></div>');
			},
			success: function (data) {
				if(data.sent){
					jQuery('#whats_included').html(data.includes);
					jQuery('#whats_included_mob').html(data.includes);
					jQuery('.include_div').show();
					jQuery('.include_title').html(data.title);
					/////Stripe Code
				} else{
				}
				jQuery('.preloaders').remove();
			},
			error: function (errorThrown) {
			}
		});
	});
	//////////////////////////
	//////////
	jQuery('#get_result').click(function(event) {
		var service = jQuery('#mrdServices').val();
		var myCost = jQuery('#myCost').val();
		if(service == 0){
			jQuery('.show_message_select').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please select a service.</div>');
			return;
		} else{
			jQuery('.show_message_select').empty();
		}
		if(myCost == ""){
			jQuery('.show_message_number').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter a valid amount</div>');
			return;
		} else{
			jQuery('.show_message_number').empty();
		}
		if (isNaN(myCost)) {
			jQuery('.show_message_number').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter a valid amount</div>');
			return;
		} else{
			jQuery('.show_message_number').empty();
		}

		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxcalls_vars.admin_url + 'admin-ajax.php',
			data: {
					'action'    :  'get_result',
					'service'   :  service,
					'myCost'    :  myCost,
				},
				beforeSend: function(){
					// thisLink.append('<i class="fa fa-spinner fa-spin"></i>');
					jQuery('.service-calc-panel').append('<div class="preloaders"><i class="fa fa-spinner fa-spin"></i></div>');

						// jQuery('#mrd_checklist_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
			},
			success: function (data) {
				if(data.sent){
					jQuery('.result-panel').show();
					jQuery('#discount').html(data.result);
					jQuery('.show_message_number').empty();
					/////Stripe Code
				} else{
				}
				jQuery('.preloaders').remove();
				// thisLink.find('i').remove();
			},
			error: function (errorThrown) {
			}
		});
	});


	jQuery('#submit_form').click(function(event) {
		event.preventDefault();
		var yname, company, email, phone, newletter;
		yname = jQuery('#yname').val();
		company = jQuery('#company').val();
		email = jQuery('#email').val();
		phone = jQuery('#phone').val();
		newletter = jQuery('#customCheck1').val();
		if(yname == ""){
			jQuery('.show_message_name').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter your name..</div>');
			return;
		} else{
			jQuery('.show_message_name').empty();
		}
		if(company == ""){
			jQuery('.show_message_company').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter company name</div>');
			return;
		} else{
			jQuery('.show_message_company').empty();
		}
		if(email == ""){
			jQuery('.show_message_email').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter emai address</div>');
			return;
		} else{
			jQuery('.show_message_email').empty();
		}
		if (phone == "") {
			jQuery('.show_message_phone').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter your phone number</div>');
			return;
		} else{
			jQuery('.show_message_phone').empty();
		}

		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxcalls_vars.admin_url + 'admin-ajax.php',
			data: {
					'action'    :  'sent_email',
					 'yname'	: yname,
					 'company'	:	company,
					 'email'		:	email,
					 'phone'		:	phone,
					 "newletter"	: newletter
				},
				beforeSend: function(){
					// thisLink.append('<i class="fa fa-spinner fa-spin"></i>');
					jQuery('form#formsubmit').append('<div class="preloaders"><i class="fa fa-spinner fa-spin"></i></div>');

						// jQuery('#mrd_checklist_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
			},
			success: function (data) {
				if(data.sent){
					jQuery('.message_main').empty().html('<div class="alert alert-success mt-3 text-center p-2 pl-2 pr-2 mb-0 fz-13">Thank you for your interest. We will get back to you soon.</div>');
					 jQuery('#yname').val('');
					 jQuery('#yname').val('');
					 jQuery('#email').val('');
					 jQuery('#phone').val('');
					 fbq('track', 'Lead');
					/////Stripe Code
				} else{
				}
				jQuery('.preloaders').remove();
				// thisLink.find('i').remove();
			},
			error: function (errorThrown) {
			}
		});
	});

	jQuery('#submit_form_local').click(function(event) {
		event.preventDefault();
		var yname, company, email, phone, newletter;
		yname = jQuery('#yname').val();
		company = jQuery('#company').val();
		email = jQuery('#email').val();
		phone = jQuery('#phone').val();
		newletter = jQuery('#customCheck1').val();
		if(yname == ""){
			jQuery('.show_message_name').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter your name..</div>');
			return;
		} else{
			jQuery('.show_message_name').empty();
		}
		if(company == ""){
			jQuery('.show_message_company').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter company name</div>');
			return;
		} else{
			jQuery('.show_message_company').empty();
		}
		if(email == ""){
			jQuery('.show_message_email').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter emai address</div>');
			return;
		} else{
			jQuery('.show_message_email').empty();
		}
		if (phone == "") {
			jQuery('.show_message_phone').empty().html('<div class="alert alert-danger mt-1 p-1 pl-2 pr-2 mb-0 fz-13">Please enter your phone number</div>');
			return;
		} else{
			jQuery('.show_message_phone').empty();
		}

		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxcalls_vars.admin_url + 'admin-ajax.php',
			data: {
					'action'    :  'sent_email_local',
					 'yname'	: yname,
					 'company'	:	company,
					 'email'		:	email,
					 'phone'		:	phone,
					 "newletter"	: newletter
				},
				beforeSend: function(){
					// thisLink.append('<i class="fa fa-spinner fa-spin"></i>');
					jQuery('form#formsubmit').append('<div class="preloaders"><i class="fa fa-spinner fa-spin"></i></div>');

						// jQuery('#mrd_checklist_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
			},
			success: function (data) {
				if(data.sent){
					jQuery('.message_main').empty().html('<div class="alert alert-success mt-3 text-center p-2 pl-2 pr-2 mb-0 fz-13">Thank you for your interest. We will get back to you soon.</div>');
					 jQuery('#yname').val('');
					 jQuery('#yname').val('');
					 jQuery('#email').val('');
					 jQuery('#phone').val('');
					 fbq('track', 'Lead');
					/////Stripe Code
				} else{
				}
				jQuery('.preloaders').remove();
				// thisLink.find('i').remove();
			},
			error: function (errorThrown) {
			}
		});
	});

	////////////////

	jQuery('.showExitForm').click(function(event) {
		event.preventDefault();
		jQuery('.subscribers_form_pop').show();
	});


}); //Document End

function showProjectsbyCat( cat ){
if ( cat == 'all'){
	jQuery('#projects-hidden .project').each(function(){
		 // var owl   = jQuery(".row-expert.owl-carousel").data('owlCarousel');
		 elem      = jQuery(this).parent().html();

		 // owl.addItem( elem );
		 jQuery(".row-expert.owl-carousel").trigger('add.owl.carousel', [elem, 0]).trigger('refresh.owl.carousel');
		 jQuery(this).parent().remove();
	});
}else{
	jQuery('#projects-hidden .project.'+ cat).each(function(){
		 // var owl   = jQuery(".owl-carousel").data('owlCarousel');
		 elem      = jQuery(this).parent().html();

		 // owl.addItem( elem );
		 jQuery(this).parent().remove();
		 jQuery(".row-expert.owl-carousel").trigger('add.owl.carousel', [elem, 0]).trigger('refresh.owl.carousel');
	});

	jQuery('.row-expert .project:not(.project.'+ cat + ')').each(function(){
		 // var owl   = jQuery(".owl-carousel").data('owlCarousel');
		 targetPos = jQuery(this).parent().index();
		 elem      = jQuery(this).parent();
		 // alert(owl);
		 jQuery( elem ).clone().appendTo( jQuery('#projects-hidden') );
		 jQuery(".row-expert.owl-carousel").trigger('remove.owl.carousel', targetPos).trigger('refresh.owl.carousel');
		 // owl.removeItem(targetPos);
	});
}
}

jQuery(window).load(function(){
	jQuery('#project-terms a').click(function(e){
        e.preventDefault();
        jQuery('#project-terms a').removeClass('active');

        cat = jQuery(this).attr('ID');
        jQuery(this).addClass('active');
        showProjectsbyCat( cat );
        // alert('filtering'+ cat);
    });
		jQuery(".row-expert.owl-carousel").trigger('refresh.owl.carousel');
});



	////Exit Modal
	document.addEventListener("DOMContentLoaded", () => {
	  document.addEventListener("mouseout", (event) => {
	    if (!event.toElement && !event.relatedTarget) {
				var cookiecheck = getCookie('exitpopup');
				if(cookiecheck == ""){
		      setTimeout(() => {
		        console.log('shsh');
						var myModal = new bootstrap.Modal(document.getElementById('exitmodal'), {
  								keyboard: false
									})
						myModal.show();
						setCookie('exitpopup', 'shown', 1);
		      }, 1000);
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
