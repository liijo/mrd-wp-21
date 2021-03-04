<?php
function mrd_calc_submit(){
		 $calc_weburl = $_POST['calc_weburl'];
		 $calc_bsns_type = $_POST['calc_bsns_type'];
		 $calc_q1 = $_POST['calc_q1'];
		 $calc_q2 = $_POST['calc_q2'];
		 $calc_web_importance = $_POST['calc_web_importance'];
		 $calc_describe = stripslashes($_POST['calc_describe']);
		 $calc_q3 = stripslashes($_POST['calc_q3']);
		 $calc_q4 = $_POST['calc_q4'];
		 $calc_q5 = $_POST['calc_q5'];
		 $calc_q6 = $_POST['calc_q6'];
		 $calc_q7 = $_POST['calc_q7'];
		 $calc_members_area = $_POST['calc_members_area'];
		 $calc_payment = $_POST['calc_payment'];
		 $calc_other_integration = $_POST['calc_other_integration'];
		 $calc_name = $_POST['calc_name'];
		 $calc_company = $_POST['calc_company'];
		 $calc_email = $_POST['calc_email'];
		 $cal_phone = $_POST['cal_phone'];
		 $main_result = $_POST['main_result'];

		 $l_name = "NA";
$newtags = array("Website cost calculator");
 		$data = array(
 									'email_address' => $calc_email,
 									'status'     => "subscribed",
 									'tags'  =>   $newtags,
 									'merge_fields'  => array(
 												'FNAME' => $calc_name,
 												'LNAME' => $l_name,
 												'PHONE' => $cal_phone,
 												'COMPANY' => $calc_company
 											)
 								);


 		$curl = curl_init();
 		curl_setopt_array($curl, array(
 		CURLOPT_URL => "https://us20.api.mailchimp.com/3.0/lists/6e6890931d/members/",
 		CURLOPT_RETURNTRANSFER => true,
 		CURLOPT_ENCODING => "",
 		CURLOPT_MAXREDIRS => 10,
 		CURLOPT_TIMEOUT => 0,
 		CURLOPT_FOLLOWLOCATION => true,
 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 		CURLOPT_CUSTOMREQUEST => "POST",
 		CURLOPT_POSTFIELDS => json_encode($data),
 		CURLOPT_HTTPHEADER => array(
 		"Authorization: Basic YW55c3RyaW5nOjUxNTAzOTQyMWZhMDY5NzBmNDFhNWVmMjFhZjlmZTYxLXVzMjA=",
 		"Content-Type: application/json",
 		"Cookie: ak_bmsc=3EA7202BAE5ACB820F54B567540B1AC4170BD71D66130000EE2A155F37F45C45~plBTDoPXwAjzXYaoF4smerxq+mOzey6INzw3oRSaKXVU/AubQoVFQQpyGVz0AO6PqQKhffKbTk/YT26yU/mEJkWisGsjxpW0Dy3ZReUSFGFCqwzaRFNDHUrSKgCQqv/UI8HJs3ZLs+yfK+9rJTk23T0m+5UFwZxZkXu63vSn7medHdIqgAgjDdLw5EdvJYaseGCzCyD59FYwuqfG8uZXVxFIOHUAW4GN6hQAiNNj+QzBs="
 		),
 		));

 		$response = curl_exec($curl);

 		curl_close($curl);
 	



		 $subject = 'Cost Calculator Estimate Request - '. $calc_name;
     //$subject2 = 'Report of - '. $web_address;
     $message_body = '<h3>Cost Estimate Request.</h3>';
     $message_body .= '<p>Name : <strong>'.$calc_name.'</strong></p>';
     $message_body .= '<p>Email : <strong>'.$calc_company.'</strong></p>';
     $message_body .= '<p>Phone Number : '.$calc_email.'</strong></p>';
     $message_body .= '<p>Company : <strong>'.$cal_phone.'</strong></p>';
     $message_body .= '<h3>Calculator Inputs</h3>';

     $message_body .= '<p>Calculated Cost : <strong>'.$main_result.'</strong></p>';

		 if($calc_weburl){
     	$message_body .= '<p>Website Url : <strong>'.$calc_weburl.'</strong></p>';
	 	 }
		 if($calc_bsns_type != 'Type of Business?'){
     	$message_body .= '<p>Type of Business? : <strong>'.$calc_bsns_type.'</strong></p>';
	 	 }
		 if($calc_q1){
     	$message_body .= '<p>How long has your business been going? : <strong>'.$calc_q1.'</strong></p>';
	 	 }
		 if($calc_q2){
     	$message_body .= '<p>Number of Products / Services : <strong>'.$calc_q2.'</strong></p>';
	 	 }
		 if($calc_describe){
     	$message_body .= '<p>Services / Products : <strong>'.$calc_describe.'</strong></p>';
	 	 }
		 if($calc_web_importance){
     	$message_body .= '<p>How important is your website to your business? : <strong>'.$calc_web_importance.'</strong></p>';
	 	 }
		 if($calc_q3){
     	$message_body .= '<p>How do you currently get new business? : <strong>'.$calc_q3.'</strong></p>';
	 	 }
		 if($calc_q4){
     	$message_body .= '<p>Which of these traffic channels is important to your business? : <strong>'.$calc_q4.'</strong></p>';
	 	 }
		 if($calc_q5){
     	$message_body .= '<p>How many pages does your website need? : <strong>'.$calc_q5.'</strong></p>';
	 	 }
		 if($calc_q6){
     	$message_body .= '<p>Where will the content come from? : <strong>'.$calc_q6.'</strong></p>';
	 	 }
		 if($calc_q7){
     	$message_body .= '<p>Which platform would you like your website built on? : <strong>'.$calc_q7.'</strong></p>';
	 	 }
		 if($calc_members_area){
     	$message_body .= '<p>Do your site need a members area for your customers? : <strong>'.$calc_members_area.'</strong></p>';
	 	 }
		 if($calc_payment){
     	$message_body .= '<p>Do your site need integrated online payments? : <strong>'.$calc_payment.'</strong></p>';
	 	 }
		 if($calc_other_integration){
     	$message_body .= '<p>Other Integration Requirements? : <strong>'.$calc_other_integration.'</strong></p>';
	 	 }

     $message = $message_body;

		 $headers = 'From: Mr-Digital.co.uk <noreply@mr-digital.co.uk>' . "\r\n";
     function calculator_set_content_type(){
          return "text/html";
      }
      add_filter( 'wp_mail_content_type','calculator_set_content_type' );
      if(is_email($calc_email)){
    		 if(wp_mail( 'ross@mr-digital.co.uk, mohammed@mr-digital.co.uk', $subject, $message, $headers)){
           echo json_encode(array('sent'=>true, 'response'=>'<div style="margin-top:30px;" class="alert alert-success text-center">Thank you for your interest!. We will send you a detailed estimate soon..</div>' ) );
      		 die();
    		}
       	else{
					echo json_encode(array('sent'=>false, 'response'=>'<div style="margin-top:30px;" class="alert alert-danger text-center">Something went wrong! Please try again later.</div>' ) );
					die();
				}
			}else{
        echo json_encode(array('sent'=>false, 'vmail'=>true, 'response'=>'<div style="margin-top:30px;" class="alert alert-danger text-center">Please enter a valid Email Address!.</div>' ) );
        die();
      }
	}
	add_action( 'wp_ajax_nopriv_mrd_calc_submit', 'mrd_calc_submit' );
	add_action( 'wp_ajax_mrd_calc_submit', 'mrd_calc_submit' );
	////////////////////////////////////////////////////////////

function mrd_exact_submit(){
		 $calc_weburl = $_POST['calc_weburl'];

		 $calc_name = $_POST['calc_name'];
		 $calc_company = $_POST['calc_company'];
		 $calc_email = $_POST['calc_email'];
		 $cal_phone = $_POST['cal_phone'];
		 $main_result = $_POST['main_result'];
		 $l_name = "NA";
		 $newtags = array("Website cost calculator");
		 $data = array(
									 'email_address' => $calc_email,
									 'status'     => "subscribed",
									 'tags'  =>   $newtags,
									 'merge_fields'  => array(
												 'FNAME' => $calc_name,
												 'LNAME' => $l_name,
												 'PHONE' => $cal_phone,
												 'COMPANY' => $calc_company
											 )
								 );


		 $curl = curl_init();
		 curl_setopt_array($curl, array(
		 CURLOPT_URL => "https://us20.api.mailchimp.com/3.0/lists/6e6890931d/members/",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 0,
		 CURLOPT_FOLLOWLOCATION => true,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 CURLOPT_CUSTOMREQUEST => "POST",
		 CURLOPT_POSTFIELDS => json_encode($data),
		 CURLOPT_HTTPHEADER => array(
		 "Authorization: Basic YW55c3RyaW5nOjUxNTAzOTQyMWZhMDY5NzBmNDFhNWVmMjFhZjlmZTYxLXVzMjA=",
		 "Content-Type: application/json",
		 "Cookie: ak_bmsc=3EA7202BAE5ACB820F54B567540B1AC4170BD71D66130000EE2A155F37F45C45~plBTDoPXwAjzXYaoF4smerxq+mOzey6INzw3oRSaKXVU/AubQoVFQQpyGVz0AO6PqQKhffKbTk/YT26yU/mEJkWisGsjxpW0Dy3ZReUSFGFCqwzaRFNDHUrSKgCQqv/UI8HJs3ZLs+yfK+9rJTk23T0m+5UFwZxZkXu63vSn7medHdIqgAgjDdLw5EdvJYaseGCzCyD59FYwuqfG8uZXVxFIOHUAW4GN6hQAiNNj+QzBs="
		 ),
		 ));

		 $response = curl_exec($curl);

		 curl_close($curl);

		 $subject = 'Exact Cost Request - '. $calc_name;
     //$subject2 = 'Report of - '. $web_address;
     $message_body = '<h3>Exact Cost Request.</h3>';
     $message_body .= '<p>Name : <strong>'.$calc_name.'</strong></p>';
     $message_body .= '<p>Email : <strong>'.$calc_company.'</strong></p>';
     $message_body .= '<p>Phone Number : '.$calc_email.'</strong></p>';
     $message_body .= '<p>Company : <strong>'.$cal_phone.'</strong></p>';
		 $message_body .= '<p>Website Url : <strong>'.$calc_weburl.'</strong></p>';

     $message = $message_body;

		 $headers = 'From: Mr-Digital.co.uk <noreply@mr-digital.co.uk>' . "\r\n";
     function calculator_set_content_type(){
          return "text/html";
      }
      add_filter( 'wp_mail_content_type','calculator_set_content_type' );
      if(is_email($calc_email)){
    		 if(wp_mail( 'ross@mr-digital.co.uk, mohammed@mr-digital.co.uk', $subject, $message, $headers)){
           echo json_encode(array('sent'=>true, 'response'=>'<div style="margin-top:30px;" class="alert alert-success text-center">Thank you for your interest!. We will send you a detailed estimate soon..</div>' ) );
      		 die();
    		}
       	else{
					echo json_encode(array('sent'=>false, 'response'=>'<div style="margin-top:30px;" class="alert alert-danger text-center">Something went wrong! Please try again later.</div>' ) );
					die();
				}
			}else{
        echo json_encode(array('sent'=>false, 'vmail'=>true, 'response'=>'<div style="margin-top:30px;" class="alert alert-danger text-center">Please enter a valid Email Address!.</div>' ) );
        die();
      }
	}
	add_action( 'wp_ajax_nopriv_mrd_exact_submit', 'mrd_exact_submit' );
	add_action( 'wp_ajax_mrd_exact_submit', 'mrd_exact_submit' );
	////////////////////////////////////////////////////////////

	function mrd_calc_before_submit(){
			 $calc_weburl = $_POST['calc_weburl'];
			 $calc_bsns_type = $_POST['calc_bsns_type'];
			 $calc_q1 = $_POST['calc_q1'];
			 $calc_q2 = $_POST['calc_q2'];
			 $calc_web_importance = $_POST['calc_web_importance'];
			 $calc_describe = stripslashes($_POST['calc_describe']);
			 $calc_q3 = stripslashes($_POST['calc_q3']);
			 $calc_q4 = $_POST['calc_q4'];
			 $calc_q5 = $_POST['calc_q5'];
			 $calc_q6 = $_POST['calc_q6'];
			 $calc_q7 = $_POST['calc_q7'];
			 $calc_members_area = $_POST['calc_members_area'];
			 $calc_payment = $_POST['calc_payment'];
			 $calc_other_integration = $_POST['calc_other_integration'];
			 $main_result = $_POST['main_result'];

			 $subject = 'Cost Calculator Estimate Request - '. $calc_name;
	     //$subject2 = 'Report of - '. $web_address;
	     $message_body = '<h2>Cost Calculator Initial Lead.</h2>';
	     $message_body .= '<h3>Calculator Inputs</h3>';

	     $message_body .= '<p>Calculated Cost : <strong>'.$main_result.'</strong></p>';

			 if($calc_weburl){
	     	$message_body .= '<p>Website Url : <strong>'.$calc_weburl.'</strong></p>';
		 	 }
			 if($calc_bsns_type != 'Type of Business?'){
	     	$message_body .= '<p>Type of Business? : <strong>'.$calc_bsns_type.'</strong></p>';
		 	 }
			 if($calc_q1){
	     	$message_body .= '<p>How long has your business been going? : <strong>'.$calc_q1.'</strong></p>';
		 	 }
			 if($calc_q2){
	     	$message_body .= '<p>Number of Products / Services : <strong>'.$calc_q2.'</strong></p>';
		 	 }
			 if($calc_describe){
	     	$message_body .= '<p>Services / Products : <strong>'.$calc_describe.'</strong></p>';
		 	 }
			 if($calc_web_importance){
	     	$message_body .= '<p>How important is your website to your business? : <strong>'.$calc_web_importance.'</strong></p>';
		 	 }
			 if($calc_q3){
	     	$message_body .= '<p>How do you currently get new business? : <strong>'.$calc_q3.'</strong></p>';
		 	 }
			 if($calc_q4){
	     	$message_body .= '<p>Which of these traffic channels is important to your business? : <strong>'.$calc_q4.'</strong></p>';
		 	 }
			 if($calc_q5){
	     	$message_body .= '<p>How many pages does your website need? : <strong>'.$calc_q5.'</strong></p>';
		 	 }
			 if($calc_q6){
	     	$message_body .= '<p>Where will the content come from? : <strong>'.$calc_q6.'</strong></p>';
		 	 }
			 if($calc_q7){
	     	$message_body .= '<p>Which platform would you like your website built on? : <strong>'.$calc_q7.'</strong></p>';
		 	 }
			 if($calc_members_area){
	     	$message_body .= '<p>Do your site need a members area for your customers? : <strong>'.$calc_members_area.'</strong></p>';
		 	 }
			 if($calc_payment){
	     	$message_body .= '<p>Do your site need integrated online payments? : <strong>'.$calc_payment.'</strong></p>';
		 	 }
			 if($calc_other_integration){
	     	$message_body .= '<p>Other Integration Requirements? : <strong>'.$calc_other_integration.'</strong></p>';
		 	 }

	     $message = $message_body;

			 $headers = 'From: Mr-Digital.co.uk <noreply@mr-digital.co.uk>' . "\r\n";
	     function calculator_set_content_type(){
	          return "text/html";
	      }
	      add_filter( 'wp_mail_content_type','calculator_set_content_type' );

	    		 if(wp_mail( 'ross@mr-digital.co.uk, mohammed@mr-digital.co.uk', $subject, $message, $headers)){
	           echo json_encode(array('sent'=>true, 'response'=>'<div style="margin-top:30px;" class="alert alert-success text-center">Thank you for your interest!. We will send you a detailed estimate soon..</div>' ) );
	      		 die();
	    		}
	       	else{
						echo json_encode(array('sent'=>false, 'response'=>'<div style="margin: 34px;margin-bottom: 0;padding: 14px 10px;line-height: 20px;border-radius: 6px;" class="alert alert-danger text-center">Something went wrong! Please try again later.</div>' ) );
						die();
					}

		}
		add_action( 'wp_ajax_nopriv_mrd_calc_before_submit', 'mrd_calc_before_submit' );
		add_action( 'wp_ajax_mrd_calc_before_submit', 'mrd_calc_before_submit' );
   ?>
