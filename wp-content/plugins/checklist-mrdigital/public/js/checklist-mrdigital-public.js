(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 $(document).ready(function(){
		 $('.chartPdf').click(function(){
			 $('#hidden_html').val($('.donut-chart').html());
			 $('#donut').submit();
		 })
		 var competed_question_count = 0;

		 $('.point-check').change(function(){
			 /* Get the Point of this question*/
			 var datapoint = parseFloat($(this).data('point'));
			 var sectiontotal = 0;
			 /*Get class name of section*/
			 var datasection = $(this).data('section');
			 /*Get the current total point of question section*/
			 var currentpoint = parseFloat($('.section-total.' + datasection).find('span').text());
			 // Get the point weightage of this question group.
			 var thissectionpoint = parseFloat($('.section-total.' + datasection).data('sectionpoint'));
			 // Total point achieved for Checklist
			 var currenttotalpoint = parseFloat($('.checklist-total').find('span').text());
			 //alert(currenttotalpoint);

			 if($(this).is(":checked")){
				 				sectiontotal = currentpoint + datapoint;
                $('.section-total.' + datasection).find('span').text(sectiontotal); // Setting Section total
                $('.input_sections.' + datasection).val(sectiontotal); // Setting Section total
								var finalPoint = thissectionpoint / (100/datapoint);
								var totalFinal = currenttotalpoint + finalPoint;
								if(totalFinal >= 100){
									totalFinal = parseInt(totalFinal); // remove decimals
								} else{
									totalFinal = totalFinal.toFixed(2); // fix decimals to 2
								}
								$('.mrd_checklist_progress').css('width',totalFinal+'%'); // Progressbar
                $('.checklist-total').find('span').text(totalFinal); // Setting Total Score
								if(totalFinal < 99){
									var roundedToral = Math.round(totalFinal);
								} else{
									var roundedToral = totalFinal;
								}
                $('.score-text-inner').find('.title').text(roundedToral + '/100'); // Setting Total Score
								////Completed Question counter
								competed_question_count = competed_question_count + 1;
								$('.competed_question_count').text(competed_question_count);

            } else {
								sectiontotal = currentpoint - datapoint;
								$('.section-total.' + datasection).find('span').text(sectiontotal); // Setting Section total
								$('.input_sections.' + datasection).val(sectiontotal);
								var finalPoint = thissectionpoint / (100/datapoint);
								var totalFinal = currenttotalpoint - finalPoint;
								if(totalFinal < 0.1){
									totalFinal = parseInt(totalFinal); // remove decimals
								} else{
									totalFinal = totalFinal.toFixed(2); // fix decimals to 2
								}
                $('.checklist-total').find('span').text(totalFinal); // Setting Total Score
                $('.mrd_checklist_progress').css('width',totalFinal+'%'); // Progressbar
								////Completed Question counter
								competed_question_count = competed_question_count - 1;
								$('.competed_question_count').text(competed_question_count);


						}

		 });

		 /////
		 ////Total Questions Counter
		 jQuery('span.total_question_count').text(jQuery('#total_question_count').val());
		 //// Step Counter
		 jQuery('.mrd_s_1').addClass('active');

		 // First Next Button Click
		 jQuery('.check_step_button_first').click(function(){
    var mrdc_web_url = jQuery('#mrdc_web_url').val();
    var mrdc_next = jQuery(this).data('next');
		//if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(mrdc_web_url)){
		if(mrdc_web_url != ''){
			jQuery('.check_steps').hide();
			jQuery('.check_steps.' + mrdc_next).show();
			jQuery('.mrd_s_2').addClass('active');
			jQuery('.web_address').text(mrdc_web_url);
			jQuery('#web_address').val(mrdc_web_url);
} else {
		jQuery('#mrdc_web_url').focus();
    alert('Please enter a valid Website Url starting with "http/https"!');

}
    /*if(mrdc_web_url != ''){
      jQuery('.check_steps').hide();
      jQuery('.check_steps.' + mrdc_next).show();
      jQuery('.mrd_s_2').addClass('active');
			jQuery('.web_address').text(mrdc_web_url);
			jQuery('#web_address').val(mrdc_web_url);
    } else{
      jQuery('#mrdc_web_url').focus();
      alert('Please enter your Website Url!');
    }*/
  });
  jQuery('.mrdc_prev_btn').click(function(){
      var mrdc_next = jQuery(this).data('prev');
      jQuery('.check_steps').hide();
      jQuery('.check_steps.' + mrdc_next).show();
  });
  jQuery('.mrdc_next_btn').click(function(){
      var mrdc_next = jQuery(this).data('next');
      var mrdc_step = jQuery(this).data('step');
      jQuery('.check_steps').hide();
      jQuery('.check_steps.' + mrdc_next).show();
      jQuery('.' + mrdc_step).addClass('active');
			//jQuery('.seo-list-header').removeClass('.fixed-seo-list-header');

  });
  jQuery('.mrdc_result_btn').click(function(){
      jQuery('.mrd_checklist_item').hide();
      jQuery('.mrd_checklist_item.mrd_checklist_result').show();
			drawChart();
			function drawChart() {
				var inputs = $(".input_sections");
				var inputsval = '';
				var donutdata = 0;
				var chartData = [
    ['US', 'Number'],
  ];
				for(var i = 0; i < inputs.length; i++){
					donutdata = parseInt($(inputs[i]).val())
					chartData.push(['Work', donutdata]);
				}
				console.log(chartData);
				var data = google.visualization.arrayToDataTable(chartData);

				var options = {
					pieHole: 0.7,
					pieSliceTextStyle: {
						color: 'black',
					},
					legend: 'none',
					pieSliceText: 'none',
					backgroundColor: { fill:'transparent', stroke:'#fff' },
					height:400,
					width:400,
					chartArea: {width: '100%', height: '90%'},
					pieSliceBorderColor:"transparent",
					colors: ['#ae0a1b', '#df5017', '#e9b800', '#379c62', '#032e70', '#006ab4', '#c3440b', '#d14988', '#f8e71c', '#8bc34a' ]
				};
				var chart_div = document.getElementById('donut_single');
						var chart = new google.visualization.PieChart(chart_div);

						// Wait for the chart to finish drawing before calling the getImageURI() method.
						google.visualization.events.addListener(chart, 'ready', function () {
							chart_div.innerHTML = '<img src=' + chart.getImageURI() + '>';
							//console.log(chart_div.innerHTML);
						});


				chart.draw(data, options);
			}
			/// FB Event Track;
			fbq('track', 'Lead');
			/// Google Event track
			var url      = window.location.href;
			//gtag_report_conversion('url');
			function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-835072851/oERUCOmB7bABENPmmI4D', 'event_callback': callback }); return false; }


  });
	//var fixedtop = $('.seo-list-header').offset().top;
//	var fixedheight = $('.seo-list-header').outerHeight();
	///////scroll
	/*$(window).scroll(function(){
			if ($(window).scrollTop() >= fixedtop) {
					$('.seo-list-header').addClass('fixed-seo-list-header');
					$('.progress-list-frame').css('padding-top',fixedheight);
					$('.progress-list-frame').css('padding-top',fixedheight);
			}
			else {
					$('.seo-list-header').removeClass('fixed-seo-list-header');
					$('.progress-list-frame').css('padding-top',0);
			}
	});*/
	 });



})( jQuery );
