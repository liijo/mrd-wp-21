(function( $ ) {
	'use strict';
  $(document).ready(function(){
		jQuery('body').append('<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1626746&conversionId=1717049&fmt=gif" />');
    jQuery('#checker_submit').click(function () {
					if(jQuery('#checker_name').val() == ''){
						jQuery('.required_text').text('Please fill the required fields!').addClass('show');
						jQuery('#checker_name').addClass('error');
						return;
					}
					// if(jQuery('#checker_phone').val() == ''){
					// 	jQuery('.required_text').text('Please fill the required fields!').addClass('show');
					// 	jQuery('#checker_phone').addClass('error');
					// 	return;
					// }
					if(jQuery('#checker_email').val() == ''){
						jQuery('.required_text').text('Please fill the required fields!').addClass('show');
						jQuery('#checker_email').addClass('error');
						return;
					}
					if(jQuery('#web_address').val() == ''){
						jQuery('.required_text').text('Please fill the required fields!').addClass('show');
						jQuery('#web_address').addClass('error');
						return;
					}
          // Define Variables
          var checker_name, checker_phone, checker_email, web_address, checker_chart, ajaxurl, mrd_checklist_id, selected_questions = [], section_totals = [];
          mrd_checklist_id    =   jQuery('#mrd_checklist_id').val();
          checker_name    =   jQuery('#checker_name').val();
          checker_phone    =   jQuery('#checker_phone').val();
          checker_email    =   jQuery('#checker_email').val();
          web_address   =   jQuery('#web_address').val();
          checker_chart   =   jQuery('.chart-panel').html();
          $(".point-check:checked").each(function() {

                selected_questions.push($(this).val());
          });
          $(".input_sections").each(function() {
							var sqgroup =$(this).data('qsgroup');
                section_totals.push(sqgroup + '_' + $(this).val());
          });

          ajaxurl     =   ajaxcalls_vars.admin_url + 'admin-ajax.php';
          // console.log(selected_questions);


        jQuery.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajaxurl,
          // Posting Values to Php Function
          data: {
              'action'    :   'mrd_checklist_result',
              'mrd_checklist_id' : mrd_checklist_id,
              'checker_name' : checker_name,
              'checker_phone'	:	checker_phone,
              'checker_email' :	checker_email,
              'web_address' :	web_address,
              'checker_chart' :	checker_chart,
              'selected_questions' :	selected_questions,
              'section_totals' :	section_totals

            },
						beforeSend: function(){
	     					jQuery('#mrd_checklist_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
	   			},
          success: function (data) {
             // This outputs the result of the ajax request
             // And clear the form fields
            if (data.sent) {
							jQuery('#checker_name').val('');
							jQuery('#checker_phone').val('');
							jQuery('#checker_email').val('');
							location = data.redirect;
            }
            // Alert Request Result
            jQuery('#mrd_checklist_alert').empty().append(data.response);
          },
          error: function (errorThrown) {
          }
        });
    });

  });
})( jQuery );
