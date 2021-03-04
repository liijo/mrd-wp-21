<?php
///////////////////////////
add_action("wp_ajax_get_includes", "get_includes");
add_action("wp_ajax_nopriv_get_includes", "get_includes");
function get_includes(){

    $postID = $_POST['service'];
    $includes = get_field( 'whats_included', $postID );
    $title = get_the_title( $postID );
      header("Content-type: application/json");
      echo json_encode(array('sent'=>true, 'includes'=> $includes, 'title'=> $title ) );
      die();

  }
///////////////////////////
add_action("wp_ajax_get_result", "get_result");
add_action("wp_ajax_nopriv_get_result", "get_result");
function get_result(){

    $postID = $_POST['service'];
    $myCost = $_POST['myCost'];
    $partner_cost = get_field( 'partner_cost', $postID );
    $result = $myCost - $partner_cost;
    $title = get_the_title( $postID );
      header("Content-type: application/json");
      echo json_encode(array('sent'=>true, 'result'=> $result) );
      die();

  }
///////////////////////////
add_action("wp_ajax_sent_email", "sent_email");
add_action("wp_ajax_nopriv_sent_email", "sent_email");
function sent_email(){

    $yname = $_POST['yname'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $user_email = $email;
    $first_name = $yname;
    $ycompany = $company;
    $l_name = "";

    if($l_name == ""){
      $full = $first_name;
      $full1 = explode(' ', $first_name);
      $first_name = $full1[0];
      $l_name = ltrim($full, $first_name.' ');
    }
    if(!$l_name){
      $l_name = 'NA';
    }

    $newletter = $_POST['newletter'];

    $date = date("Y-m-d");
    $ymessage = "Agency Partner Program";
    if($newletter){
      $acceptdate = $date;
    } else{
      $acceptdate = "";
    }



    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $subject="Agency Partner Program Lead";
    $message = "Name: " .$yname ."<br />Email: " . $email . "<br />Number: " .$phone.'<br />Company Name:' . $company.'<br />Newsletter:' . $newletter;
    $message = wordwrap($message, 70);

       $to      ='hello@mr-digital.co.uk';

    $headers .= 'From:noreply@mr-digital.co.uk' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    $tag = "Agency Partner Form";
    $newtags = array($tag);
    $data = array(
								               'email_address' => $email,
								               'status'     => "subscribed",
								               'tags'  =>   $newtags,
								               'merge_fields'  => array(
								                     'FNAME' => $yname,
								                     'PHONE' => $phone,
								                     'COMPANY' => $company
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

      header("Content-type: application/json");
      echo json_encode(array('sent'=>true, 'result'=> $result, 'redirect'=> get_permalink( 6978 )) );
      die();

  }
///////////////////////////
add_action("wp_ajax_sent_email_local", "sent_email_local");
add_action("wp_ajax_nopriv_sent_email_local", "sent_email_local");
function sent_email_local(){

    $yname = $_POST['yname'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    



    $user_email = $email;
    $first_name = $yname;
    $ycompany = $company;
    $l_name = "";

    if($l_name == ""){
      $full = $first_name;
      $full1 = explode(' ', $first_name);
      $first_name = $full1[0];
      $l_name = ltrim($full, $first_name.' ');
    }
    if(!$l_name){
      $l_name = 'NA';
    }

    $newletter = $_POST['newletter'];

    $date = date("Y-m-d");
    $ymessage = "Local Page - Form Enquiry";
    if($newletter){
      $acceptdate = $date;
    } else{
      $acceptdate = "";
    }



    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $subject="Agency Partner Program Lead";
    $message = "Name: " .$yname ."<br />Email: " . $email . "<br />Number: " .$phone.'<br />Company Name:' . $company.'<br />Newsletter:' . $newletter;
    $message = wordwrap($message, 70);

       $to      ='hello@mr-digital.co.uk';

    $headers .= 'From:noreply@mr-digital.co.uk' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    $tag = "Local Page - Form Enquiry";
    $newtags = array($tag);
    $data = array(
								               'email_address' => $email,
								               'status'     => "subscribed",
								               'tags'  =>   $newtags,
								               'merge_fields'  => array(
								                     'FNAME' => $yname,
								                     'PHONE' => $phone,
								                     'COMPANY' => $company
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

      header("Content-type: application/json");
      echo json_encode(array('sent'=>true, 'result'=> $result, 'redirect'=> get_permalink( 6978 )) );
      die();

  }
   ?>
