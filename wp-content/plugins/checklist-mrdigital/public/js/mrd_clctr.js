window.onload = function() {
  // onclick open the selectBox dropdown
  document.querySelector(".input-badge-cont").addEventListener("click", function() {
    document.querySelector(".dropdowns-select").classList.toggle("selectOpen");
    document.querySelector(".aero-icon").classList.toggle("rotate");
  });
  // onclick open the selectBox dropdown (End)
  // For custom selectBox, trying to get the options and inner text
  document.querySelectorAll('.options').forEach(function(targeting) {
    targeting.addEventListener("click", function() {
      var selected = document.querySelector(".selected");
      if (selected) {
        selected.classList.remove("selected");
      }
      this.classList.add("selected");
      document.querySelector(".texts").innerText = this.innerText;
      document.querySelector(".dropdowns-select").classList.remove("selectOpen");
      document.querySelector(".aero-icon").classList.remove("rotate");
    });
  });
  // For custom selectBox, trying to get the options and inner text (End)
}
jQuery(document).ready(function(){
    jQuery('.button_next').click(function(e){
      var error = 0;
      jQuery(this).parents('.calc-panel-inner').find('.calc_section_total').each(function(){
        if(jQuery(this).val() == 0){
          jQuery(this).parents('.form-group').addClass('error');
          e.preventDefault();
          error = 1;
        } else{
          jQuery(this).parents('.form-group').removeClass('error');
        }
      });
      if(error == 0){
        var calc_next = jQuery(this).data('nextstep');
        var calc_step = jQuery(this).data('step');
        jQuery('.calculator_panel').hide();
        jQuery('.calculator_panel.' + calc_next).show();
        jQuery('.calc_progress_step' + calc_step).addClass('is-active');
      }
    });

    ////
    jQuery('.calc_field').change(function(){
      var thisSection_val = 0;
      jQuery(this).parents('.single_field').find('.calc_field').each(function(){
        if(jQuery(this).is(":checked")){
          thisSection_val = parseInt(jQuery(this).data('value'));;
        }
      });
      jQuery(this).parents('.single_field').find('.calc_section_total').val(thisSection_val);
    });
    ////
    jQuery('.range-slider-range').change(function(){
      var thisVal = jQuery(this).val();
      thisVal = parseInt(thisVal);
      switch (thisVal)
      {
        case 1:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(1);
            break;

        case 2:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(2);
            break;

        case 3:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(3);
            break;
        case 4:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(4);
            break;
        case 5:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(5);
            break;
        case 6:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(5);
            break;
        case 7:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(10);
            break;
        case 8:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(15);
            break;
        case 9:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(25);
            break;
        case 10:
            jQuery(this).parents('.cal_range').find('.calc_section_total').val(30);
            break;
      }

    })
    ////
    jQuery('.multi_field .calc_field').change(function(){
      var thisSection_val = 0;
      jQuery(this).parents('.multi_field').find('.calc_field').each(function(){
        if(jQuery(this).is(":checked")){
          thisSection_val = thisSection_val + parseInt(jQuery(this).data('value'));;
        }
      });
      jQuery(this).parents('.multi_field').find('.calc_section_total').val(thisSection_val);
    });
    ////
    jQuery('.text_field .calc_field').blur(function(){
      var thisSection_val = 1;
      jQuery(this).parents('.text_field').find('.calc_section_total').val(thisSection_val);
      if(jQuery(this).val() != ''){
        if(jQuery(this).val() != 'No'){
          if(jQuery(this).val() != 'Nil'){
            if(jQuery(this).val() != 'N/A'){
              if(jQuery(this).val() != 'Na'){
                thisSection_val = parseInt(jQuery(this).data('value'));
                jQuery(this).parents('.text_field').find('.calc_section_total').val(thisSection_val);
              }
            }
          }
        }
      }
    });
    ////
    jQuery('.button_submit').click(function(e){
      var error = 0;
      jQuery(this).parents('.calc-panel-inner').find('.calc_section_total').each(function(){
        if(jQuery(this).val() == 0){
          jQuery(this).parents('.form-group').addClass('error');
          e.preventDefault();
          error = 1;
        } else {
          jQuery(this).parents('.form-group').removeClass('error');
        }
      });
      if(error == 0){

      var grandTotalcalc = 0;
      var calc_step = jQuery(this).data('step');
      jQuery('.calc_section_total').each(function(){
        grandTotalcalc = grandTotalcalc + parseInt(jQuery(this).val());
      });
      grandTotalcalc = parseInt(grandTotalcalc);
      // jQuery('#grandtotal').text(grandTotalcalc);
      if(jQuery('#web_url').val()){
        //first_lead_mail();
      }
      jQuery('.calc-panel').hide();
      jQuery('.calc-panel.calc_result').show();
      switch (true)
      {
        case grandTotalcalc <= 150:
            jQuery('#main_result').text('£1300 to £2000');
            break;

        case grandTotalcalc <= 225:
              jQuery('#main_result').text('£2000 to £3000');
            break;

        case grandTotalcalc <= 325:
              jQuery('#main_result').text('£3000 to £5000');
            break;

        case grandTotalcalc <= 425:
              jQuery('#main_result').text('£5000 to £7500');
            break;

        case grandTotalcalc <= 500:
              jQuery('#main_result').text('£7500 to £10000');
            break;

        default:
            jQuery('#main_result_caption').text('Approximate cost of your site is');
            jQuery('#main_result').text('Over £10000');
            break;
      } /// End Wsitch


      }
      });

    function first_lead_mail(){
      var calc_weburl, ajaxurl, calc_bsns_type, calc_q1, calc_q2,
          calc_describe, calc_web_importance, calc_q3, calc_q4, calc_q5, calc_q6, calc_q7, calc_members_area, calc_payment, calc_other_integration, main_result;

          calc_weburl = jQuery('#web_url').val();
          calc_bsns_type = jQuery('#typeOfB').text();
          calc_q1 =jQuery('.calc_field_1:checked').siblings('label').text();
          calc_q2 = jQuery('.calc_field_2:checked').siblings('label').text();
          calc_describe = jQuery('#describeService').val();
          calc_web_importance = jQuery('#importantsOfWeb').val();
          calc_q3 = jQuery('.calc_field_4:checked').siblings('label').text();
          calc_q4 = jQuery('.calc_field_5:checked').siblings('label').text();
          calc_q5 = jQuery('.calc_field_6:checked').siblings('label').text();
          calc_q6 = jQuery('.calc_field_17:checked').siblings('label').text();
          calc_q7 = jQuery('.calc_field_8:checked').siblings('label').text();
          calc_members_area = jQuery('.calc_field_9:checked').val();
          calc_payment = jQuery('.calc_field_10:checked').val();
          calc_other_integration = jQuery('.calc_field_10:checked').siblings('label').text();
          calc_other_integration = jQuery('#onter_integration').val();
          main_result = jQuery('#main_result').text();
          ajaxurl     =   ajaxcalls_vars.admin_url + 'admin-ajax.php';
          jQuery.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajaxurl,
          // Posting Values to Php Function
          data: {
              'action'    :   'mrd_calc_before_submit',
              'calc_weburl' : calc_weburl,
              'calc_bsns_type' : calc_bsns_type,
              'calc_q1'	:	calc_q1,
              'calc_q2' :	calc_q2,
              'calc_describe' :	calc_describe,
              'calc_web_importance' :	calc_web_importance,
              'calc_q3' :	calc_q3,
              'calc_q4' :	calc_q4,
              'calc_q5' :	calc_q5,
              'calc_q6' :	calc_q6,
              'calc_q7' :	calc_q7,
              'calc_members_area' :	calc_members_area,
              'calc_payment' :	calc_payment,
              'calc_other_integration' :	calc_other_integration,
              'main_result' :	main_result,

            },
						beforeSend: function(){
	     					//jQuery('#mrd_calc_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
	   			},
          success: function (data) {

          },
          error: function (errorThrown) {
          }
        });
    }
    ////

    jQuery('#calc_submit_btn').click(function(e){
      e.preventDefault();
      if(jQuery('#calc_name').val() == ''){
						jQuery('#calc_name').addClass('error');
						return;
			} else{
						jQuery('#calc_name').removeClass('error');
			}
      if(jQuery('#calc_company').val() == ''){
						jQuery('#calc_company').addClass('error');
						return;
			} else{
						jQuery('#calc_company').removeClass('error');
			}
      if(jQuery('#calc_email').val() == ''){
						jQuery('#calc_email').addClass('error');
						return;
			} else{
						jQuery('#calc_email').removeClass('error');
			}
      if(jQuery('#cal_phone').val() == ''){
						jQuery('#cal_phone').addClass('error');
						return;
			} else{
						jQuery('#cal_phone').removeClass('error');
			}


      var calc_name, calc_company, calc_email, cal_phone, calc_weburl, ajaxurl, calc_bsns_type, calc_q1, calc_q2,
          calc_describe, calc_web_importance, calc_q3, calc_q4, calc_q5, calc_q6, calc_q7, calc_members_area, calc_payment, calc_other_integration, main_result;

          calc_weburl = jQuery('#web_url').val();
          calc_bsns_type = jQuery('#typeOfB').text();
          calc_q1 =jQuery('.calc_field_1:checked').siblings('label').text();
          calc_q2 = jQuery('.calc_field_2:checked').siblings('label').text();
          calc_describe = jQuery('#describeService').val();
          calc_web_importance = jQuery('#importantsOfWeb').val();
          calc_q3 = jQuery('.calc_field_4:checked').siblings('label').text();
          calc_q4 = jQuery('.calc_field_5:checked').siblings('label').text();
          calc_q5 = jQuery('.calc_field_6:checked').siblings('label').text();
          calc_q6 = jQuery('.calc_field_17:checked').siblings('label').text();
          calc_q7 = jQuery('.calc_field_8:checked').siblings('label').text();
          calc_members_area = jQuery('.calc_field_9:checked').val();
          calc_payment = jQuery('.calc_field_10:checked').val();
          calc_other_integration = jQuery('.calc_field_10:checked').siblings('label').text();
          calc_other_integration = jQuery('#onter_integration').val();
          main_result = jQuery('#main_result').text();

          calc_name = jQuery('#calc_name').val();
          calc_company = jQuery('#calc_company').val();
          calc_email = jQuery('#calc_email').val();
          cal_phone = jQuery('#cal_phone').val();

          ajaxurl     =   ajaxcalls_vars.admin_url + 'admin-ajax.php';

          jQuery.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajaxurl,
          // Posting Values to Php Function
          data: {
              'action'    :   'mrd_calc_submit',
              'calc_weburl' : calc_weburl,
              'calc_bsns_type' : calc_bsns_type,
              'calc_q1'	:	calc_q1,
              'calc_q2' :	calc_q2,
              'calc_describe' :	calc_describe,
              'calc_web_importance' :	calc_web_importance,
              'calc_q3' :	calc_q3,
              'calc_q4' :	calc_q4,
              'calc_q5' :	calc_q5,
              'calc_q6' :	calc_q6,
              'calc_q7' :	calc_q7,
              'calc_members_area' :	calc_members_area,
              'calc_payment' :	calc_payment,
              'calc_other_integration' :	calc_other_integration,
              'calc_name' :	calc_name,
              'calc_company' :	calc_company,
              'calc_email' :	calc_email,
              'cal_phone' :	cal_phone,
              'main_result' :	main_result,

            },
						beforeSend: function(){
	     					jQuery('#mrd_calc_alert').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
	   			},
          success: function (data) {
             // This outputs the result of the ajax request
             // And clear the form fields
            if (data.vmail) {
							jQuery('#calc_email').addClass('error');
						}
            if (data.sent) {
							jQuery('#calc_email').removeClass('error');
            }
            // Alert Request Result
            //jQuery('#mrd_calc_alert').empty().append(data.response);
            jQuery('#mrd_calc_alert').empty();
            jQuery('.calc-panel').hide();
            jQuery('.calc-panel.calc_result2').show();
          },
          error: function (errorThrown) {
          }
        });
    });

    jQuery('#excat_submit_btn').click(function(e){
      e.preventDefault();
      if(jQuery('#calc_name').val() == ''){
						jQuery('#calc_name').addClass('error');
						return;
			} else{
						jQuery('#calc_name').removeClass('error');
			}
      if(jQuery('#calc_company').val() == ''){
						jQuery('#calc_company').addClass('error');
						return;
			} else{
						jQuery('#calc_company').removeClass('error');
			}
      if(jQuery('#calc_email').val() == ''){
						jQuery('#calc_email').addClass('error');
						return;
			} else{
						jQuery('#calc_email').removeClass('error');
			}
      if(jQuery('#cal_phone').val() == ''){
						jQuery('#cal_phone').addClass('error');
						return;
			} else{
						jQuery('#cal_phone').removeClass('error');
			}


      var calc_name, calc_company, calc_email, cal_phone, calc_weburl, ajaxurl;

          calc_weburl = jQuery('#web_url').val();

          calc_name = jQuery('#calc_name').val();
          calc_company = jQuery('#calc_company').val();
          calc_email = jQuery('#calc_email').val();
          cal_phone = jQuery('#cal_phone').val();

          ajaxurl     =   ajaxcalls_vars.admin_url + 'admin-ajax.php';
          jQuery.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajaxurl,
          // Posting Values to Php Function
          data: {
              'action'    :   'mrd_exact_submit',
              'calc_weburl' : calc_weburl,
              'calc_name' :	calc_name,
              'calc_company' :	calc_company,
              'calc_email' :	calc_email,
              'cal_phone' :	cal_phone,

            },
						beforeSend: function(){
	     					jQuery('#mrd_calc_alert2').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
	   			},
          success: function (data) {
             // This outputs the result of the ajax request
             // And clear the form fields
            if (data.vmail) {
							jQuery('#calc_email').addClass('error');
						}
            if (data.sent) {
							jQuery('#calc_name').val('');
							jQuery('#calc_company').val('');
							jQuery('#calc_email').val('');
							jQuery('#calc_email').removeClass('error');
							jQuery('#cal_phone').val('');
              jQuery('#mrd_calc_alert2').empty().append(data.response);
            }
          },
          error: function (errorThrown) {
          }
        });
    });
});
