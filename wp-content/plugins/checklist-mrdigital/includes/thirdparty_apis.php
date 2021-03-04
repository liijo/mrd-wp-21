<?php

						add_action("wpcf7_before_send_mail", "postTomail");

						function postTomail($cf7) {

								// get the contact form object
								$wpcf = WPCF7_ContactForm::get_current();
								$submission = WPCF7_Submission::get_instance();
								if (!$submission){
										return;
								}
								$unit_tag = $submission->get_meta( 'unit_tag' );
								$explode_unit_tag = explode("-", $unit_tag);
								$post_id = str_replace("p", "", $explode_unit_tag[2]);
								$posted_data = $submission->get_posted_data();
								//echo $post_id;
								// if you wanna check the ID of the Form $wpcf->id
								$ymessage = "";
								 $user_email = $posted_data['ymail']; //'ben@cogiva.com';
								 $first_name = $posted_data['yname']; //'Benjamin';
								 $phone = $posted_data['yphone']; //'Benjamin';
								 $ycompany = $posted_data['ycompany']; //'Benjamin';
								 $l_name = $posted_data['lname']; //'Benjamin';
								 $ymessage = $posted_data['ymessage']; //'Benjamin';
								 $recieve_marketing = $posted_data['recieve_marketing']; //'Benjamin';
								 $form_tag = $posted_data['form_tag']; //'Benjamin';

								 if($l_name == ''){
									  $l_name = $posted_data['ylastname'];
								 }
								 if(!$phone){
									 $phone = '';
								 }
								 if(!$ycompany){
									 $ycompany = 'NA';
								 }
								 if($l_name == ""){
									 $full = $first_name;
									 $full1 = explode(' ', $first_name);
									 $first_name = $full1[0];
									 $l_name = ltrim($full, $first_name.' ');
								 }
								 if(!$l_name){
									 $l_name = 'NA';
								 }


						      $tag = $form_tag;

									// echo $tag;
									if(!$tag){
										if($wpcf->id == '2705'){
											$tag = "Website - Footer Form ";
										} elseif($wpcf->id == '2954'){
											$tag = "Website - Business Aid 1 ";
										}elseif($wpcf->id == '4017'){
											$tag = "Seo checklist ";
										}elseif($wpcf->id == '4017'){
											$tag = "Seo checklist ";
										}elseif($wpcf->id == '6716'){
											$tag = "LinkedIn Prospecting Checklist";
										}elseif($wpcf->id == '6690'){
											$tag = "Instagram Ads Checklist";
										}elseif($wpcf->id == '6715'){
											$tag = "Ideal Customer Checklist form";
										}elseif($wpcf->id == '6713'){
											$tag = "Landing Page Optimisation Checklist";
										}elseif($wpcf->id == '6717'){
											$tag = "Facebook Ads Checklist";
										}elseif($wpcf->id == '5'){
											$tag = "Contact Us Page - Form";
										}

									}
								 $newtags = array($tag);
								 // print_r($newtags);
								 $data = array(
								               'email_address' => $user_email,
								               'status'     => "subscribed",
								               'tags'  =>   $newtags,
								               'merge_fields'  => array(
								                     'FNAME' => $first_name,
								                     'LNAME' => $l_name,
								                     'PHONE' => $phone,
								                     'COMPANY' => $ycompany
								                   )
								             );


							$cf7id = array('2705', '2954', '6716', '6690', '6715', '6713', '6717', '5');

						//if ($wpcf->id == $cf7id) {

							if (in_array($wpcf->id, $cf7id)) {
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
											// echo json_encode(array('sent'=>true, 'response'=> $response) );
											$rspon = json_decode($response);
											// print_r($rspon);
											// exit;
											$data = array(
		 								               'tags'  =>   array(
																		 array(
																			 								'name' => $tag,
																											'status'=> 'active'
																		 							)
																	 ),
		 								             );
											if($rspon->title == "Member Exists"){
												$userhash = md5($user_email);
												$curl = curl_init();
												curl_setopt_array($curl, array(
												CURLOPT_URL => "https://us20.api.mailchimp.com/3.0/lists/6e6890931d/members/". $userhash . "/tags",
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
												// echo json_encode(array('sent'=>true, 'response'=> $response) );
											}
											// exit;
											//$wpcf->skip_mail = true;
								}

								////
								//Productive API Add Company
								$curl = curl_init();

								curl_setopt_array($curl, array(
								  CURLOPT_URL => 'https://api.productive.io/api/v2/companies',
								  CURLOPT_RETURNTRANSFER => true,
								  CURLOPT_ENCODING => '',
								  CURLOPT_MAXREDIRS => 10,
								  CURLOPT_TIMEOUT => 0,
								  CURLOPT_FOLLOWLOCATION => true,
								  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								  CURLOPT_CUSTOMREQUEST => 'POST',
								  CURLOPT_POSTFIELDS =>'{
								  "data": {
								    "type": "companies",
								    "attributes": {
								      "name": "'.$ycompany.'"
								    }
								  }
								}',
								  CURLOPT_HTTPHEADER => array(
								    'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5',
								    'Content-Type: application/vnd.api+json',
								    'X-Auth-Token: a14edc94-f2cd-45f3-8ada-abdbb77b7eee',
								    'X-Organization-Id: 13603'
								  ),
								));

								$response = curl_exec($curl);
								$rspon = json_decode($response);
								// print_r($rspon);
								if($rspon->data){
									$company_id = $rspon->data->id;
								}
								// exit;
								curl_close($curl);


								////
								// Create Contact
								$curl = curl_init();

								curl_setopt_array($curl, array(
								  CURLOPT_URL => 'https://api.productive.io/api/v2/people',
								  CURLOPT_RETURNTRANSFER => true,
								  CURLOPT_ENCODING => '',
								  CURLOPT_MAXREDIRS => 10,
								  CURLOPT_TIMEOUT => 0,
								  CURLOPT_FOLLOWLOCATION => true,
								  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								  CURLOPT_CUSTOMREQUEST => 'POST',
								  CURLOPT_POSTFIELDS =>'{
								  "data": {
								    "type": "people",
								    "attributes": {
								      "first_name": "'.$first_name.'",
								      "last_name": "'.$l_name.'",
								      "email": "'.$user_email.'"
								    }
								  }
								}',
								  CURLOPT_HTTPHEADER => array(
								    'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5',
								    'Content-Type: application/vnd.api+json',
								    'X-Auth-Token: a14edc94-f2cd-45f3-8ada-abdbb77b7eee',
								    'X-Organization-Id: 13603'
								  ),
								));

								$nresponse = curl_exec($curl);
								$nrspon = json_decode($nresponse);
								// print_r($nrspon);
								if($nrspon->data){
									$contact_id = $nrspon->data->id;
								}
								curl_close($curl);

								////Productive API create Deal
								$curl = curl_init();
								$date = date("Y-m-d");
								if(!$ymessage){
									$ymessage = $tag;
								}
								if($recieve_marketing){
									$acceptdate = $date;
								} else{
									$acceptdate = "";
								}
								curl_setopt_array($curl, array(
								  CURLOPT_URL => 'https://api.productive.io/api/v2/deals',
								  CURLOPT_RETURNTRANSFER => true,
								  CURLOPT_ENCODING => '',
								  CURLOPT_MAXREDIRS => 10,
								  CURLOPT_TIMEOUT => 0,
								  CURLOPT_FOLLOWLOCATION => true,
								  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								  CURLOPT_CUSTOMREQUEST => 'POST',
								  CURLOPT_POSTFIELDS =>'{
								  "data": {
								    "type": "deals",
								    "attributes": {
								      "name": "'.$first_name.'",
								      "date": "'.$date.'",
								      "deal_type_id": 2,
								      "deal_status_id": 70130,
								      "sales_status_id": 1,
								      "probability": 50,
								      "currency": "EUR",
								      "tag_list": [
								        "'.$tag.'"
								      ],
											"custom_fields": {
					                "4130": "'.$ymessage.'",
					                "4131": "'.$acceptdate.'",
					                "4149": "'.$phone.'"
					            }
								    },
								    "relationships": {
								      "company": {
								        "data": {
								          "type": "companies",
								          "id": "'.$company_id.'"
								        }
								      },
								      "responsible": {
								        "data": {
								          "type": "people",
								          "id": "153110"
								        }
								      },
								      "contact": {
								            "data": {
								                "type": "people",
								                "id" : "'.$contact_id.'"
								            }
								        }

								    }
								  }
								}',
								  CURLOPT_HTTPHEADER => array(
								    'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5',
								    'Content-Type: application/vnd.api+json',
								    'X-Auth-Token: a14edc94-f2cd-45f3-8ada-abdbb77b7eee',
								    'X-Organization-Id: 13603'
								  ),
								));

								$response = curl_exec($curl);
								$drspon = json_decode($response);
								// print_r($drspon);
								curl_close($curl);
								// exit;

								return $wpcf;
						}
 ?>
