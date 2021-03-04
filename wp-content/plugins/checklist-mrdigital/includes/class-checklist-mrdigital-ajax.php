<?php

/**
 * Fired during plugin activation
 *
 * @link       https://mr-digital.co.uk
 * @since      1.0.0
 *
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/includes
 * @author     Gopu <gopu@mrdigital.co.uk>
 */
 require_once WPMRDC_PLUGIN_DIR . '/admin/sources/dompdf/autoload.inc.php';
 use Dompdf\Dompdf;
class Checklist_Mrdigital_Ajax {

	/**
	 * Shortcode for display Checklists in Frontend.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_action( 'wp_ajax_nopriv_mrd_checklist_result', array( $this, 'mrd_checklist_result' ) );
		add_action( 'wp_ajax_mrd_checklist_result', array( $this, 'mrd_checklist_result' ) );
	}
	public function mrd_checklist_result_new(){
		 $mrd_checklist_id = $_POST['mrd_checklist_id'];
		 $checker_name = $_POST['checker_name'];
		 $checker_phone = $_POST['checker_phone'];
		 $checker_email = $_POST['checker_email'];
		 $web_address = $_POST['web_address'];
		 $checker_chart = stripslashes($_POST['checker_chart']);
		 $selected_questions = $_POST['selected_questions'];
     foreach ($selected_questions as $selected_question) {
       $questions .= 'Question: '.$selected_question.'<br />';
     }
			 echo json_encode(array('sent'=>true, 'response'=>'<div class="alert alert-success">
       Checklist: '.$mrd_checklist_id.'<br />
       Name: '.$checker_name.'<br />
       Phone: '.$checker_phone.'<br />
       Email: '.$checker_email.'<br />
       Web: '.$web_address.'<br />
       Questions: '.$selected_questions.'<br />
       Chart: '.$checker_chart.'<br />
       '.$questions.'
       </div>' ) );
			 die();

	}

	public function mrd_checklist_result(){
    $mrd_checklist_id = $_POST['mrd_checklist_id'];
    $checker_name = $_POST['checker_name'];
    $checker_phone = $_POST['checker_phone'];
    $checker_email = $_POST['checker_email'];
    $web_address = $_POST['web_address'];
    $checker_chart = stripslashes($_POST['checker_chart']);
    $selectedQuestions = $_POST['selected_questions'];
    $section_totals = $_POST['section_totals'];
		$dompdf = new Dompdf();

    $html = '

     <style>
     .head_line{
     }
     .header{
       position:fixed; top:-2.5cm;width:100%;
         /*background:url("'. WPMRDC_PLUGIN_DIR .'/includes/img/top-line2.png");*/
         border-top:solid 4px #d8001a;
         background-position: center top;
         background-repeat:no-repeat;
         padding:15px 1cm 10px;
         border-bottom:solid 1px #ccc;
         z-index:100;
         font-size:12px;
     }
     footer {
                   position: fixed;
                   bottom: 0cm;
                   left: 0cm;
                   right: 0cm;
                   padding:0.5cm 1cm;
                   background-color:#F0F0F0;
                   height:20px;
                   font-size:12px;
               }



    .SetAutoPageBreak{
      page-break-after: always;
    }
    .checklist_report{
      page-break-inside: auto;
    }

     @page {
        size: A4;
        margin-top:2.5cm;
        margin-bottom:0;
        margin-left:0;
        margin-right:0;
        padding: 0;
      }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }
    td{
      vertical-align:midle;
    }
    .first-header{

      background:#fff;
      width:100%;
      padding:30px 0;
      padding-bottom:30px;
      text-align: center;

    }
    .cover-page{
      margin-top: -50px;
      z-index: 2;
      background:#fff;
      top:0;
      page-break-inside: auto;
    }
    .heading{
      text-align: center;
    }

    .heading:before{
      content:"";
      display:block;
      margin:auto;
      width:50px;
      height:1px;
      background-color:#CC001B;
    }
    .heading h2{
      text-align: center;
      font-family:arial, sans-serif;
    }
    .heading p{
      text-align: center;
      font-family:arial, sans-serif;
      font-size:13px;
    }
    .heading h2 span{
      color:#CC001B;
    }
    .web_chart{
      background:url("'. WPMRDC_PLUGIN_DIR .'/includes/img/web-bg.png");
      background-position:center top;
      background-repeat:no-repeat;
      height:300px;
      margin-top:50px;
      padding-top: 30px;
    }
    .web_chart .website_url{
      color:#CC001B;
      font-family:arial, sans-serif;
      font-size:20px;
      text-align: center;
    }

    .page:after { content: counter(page, decimal);}

    .doc-panel {
        width: 100%;
        max-width: 670px;
        margin: 20px auto;
        background: #FFFFFF;
        box-shadow: 0px 7px 13px #0000001F;
        padding: 40px 40px;
        font-family:arial, sans-serif;
        font-size:14px;
    }
    .progress-frame ul{
      margin:0;
      padding:0;
    }
    .progress-frame ul li {
        display: block;
        flex-direction: row;
        align-items: center;
        margin-bottom: 20px;
        font-family:arial, sans-serif;
        font-size:20px;
    }
    .progress-frame ul li table tr td{
      font-size:12px;
    }
    .progress-frame ul li:last-child { margin-bottom: 0; }
    .progress-frame .progress-txt {
        width: 45%;
        text-align: right;
    }
    .progress-frame .progress-percentage {
        width: 10%;
        text-align: center;
    }
    .progress-frame .progress-line {
        width: 45%;
    }
    .progress-bar {
        display: block;
        height: 10px;
        position: relative;
        width: 100%;
        height: 10px;
        background: #F4F4F4;
    }
    .progress-bar .progress-bar-inner {
        width: 40%;
        display: block;
        height:10px;
        flex-direction: column;
        justify-content: center;
        background: red;
    }
    .progress-bar .progress-bar-inner.c1 { background: #ae0a1b; }
    .progress-bar .progress-bar-inner.c2 { background: #df5017; }
    .progress-bar .progress-bar-inner.c3 { background: #e9b800; }
    .progress-bar .progress-bar-inner.c4 { background: #379c62; }
    .progress-bar .progress-bar-inner.c5 { background: #032e70; }
    .progress-bar .progress-bar-inner.c6 { background: #006ab4; }
    .progress-bar .progress-bar-inner.c7 { background: #c3440b; }
    .progress-bar .progress-bar-inner.c8 { background: #d14988; }
    .progress-bar .progress-bar-inner.c9 { background: #f8e71c; }
    .progress-bar .progress-bar-inner.c10 { background: #8bc34a; }

    .panel.lg-mb { margin-bottom: 40px; }
    .title-panel {
        margin-bottom: 20px;
    }
    .title-panel .title {
        font-size: 20px;
        font-weight: 700;
        color: #000000;
        margin-top: 0px;
        padding-top:10px;
        position:relative;
    }
    .title-panel .title:after {
        content: "";
        display: inline-block;
        width: 22px;
        height: 2px;
        position: absolute;
        background: #CC001B;
        top: 0;
        left: 0px;
    }
    .title-panel .title-badge {
        font-size: 12px;
        display: block;
        margin:auto;
        margin-right:0;
        width:100px;
        text-align: center;
        padding: 6px 15px;
        border-radius: 10px;
        color: #8B8B8B;
        background: #F8F8F8;
        margin-top:6px;
    }
    .title-panel .title-badge.text-danger {
        color: #CC001B;
    }

    .result-list li {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: center;
        padding-left: 40px;
        margin-bottom: 20px;
        position: relative;
    }
    .result-list li:last-child {
        margin-bottom: 0;
    }
    .result-list .not-complete {
        color: #CC001B;
    }
    .result-list .not-complete .result-meta p {
      color: #CC001B;
    }
    .result-list .result-icon {

    }
    .result-list .result-meta {
    }
    .result-list .result-meta h4 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 8px;
        margin-top: 0;
    }
    .result-list .result-meta p {
        line-height: 1.423;
        color:#343434;
    }
    .result-list .result-percentage {
        vertical-align:middle;
        font-size: 16px;
        font-weight: 700;
        color: #6E6E6E;
        padding: 5px 0 5px 15px;
        border-left: 2px solid #F4F4F4;
    }
    .result-list .not-complete .result-percentage {
        color: #CC001B;
    }
    .result-item{
      margin-bottom: 20px;
    }
    .chart-panel { margin: 40px auto; position:relative; font-family: arial, sans-serif;}
    .chart-row {
      position: relative;
      width: 250px;
      margin: 0 auto;
      padding-top:20px;
      text-align:center;
    }
    .chart-row .chart-img-container img { width: 250px; max-width:100%; margin-bottom:0px !important;}
    .chart-row .score-text {
      text-align:center;
      position: absolute;
      z-index:2;
      width:100%;
      top:100px;
    }
    .chart-row .score-text .score-text-inner { width: 100%; }
    .chart-row .score-text .score-text-inner .title {
      font-size: 28px;
      font-weight: 700;
      color: #000000;
      line-height: 30px;
    }
    .chart-row .score-text .score-text-inner span {
      font-size: 16px;
      color: #959595;
    }
    </style>




      <div class="cover-page">
        <div class="first-header">';
        $imagedata1 = file_get_contents(WPMRDC_PLUGIN_DIR ."/includes/img/mrdc_logo1.png");
             // alternatively specify an URL, if PHP settings allow
        $base64_1 = base64_encode($imagedata1);
      $html .='<img src="data:image/png;base64,'. $base64_1 .'" alt="" />
        </div>
        <div class="heading">
          <h2>'.get_the_title($mrd_checklist_id).'</h2>
          <p>'.date("j F, Y").'</p>
        </div>
        <div class="web_chart">
          <div class="website_url">'.$web_address.'</div>
          <div class="chart-panel">'.$checker_chart.'</div>
        </div>
        <div class="doc-panel">
           <div class="progress-frame">
              <ul>';
              $questionGroups = get_post_meta($mrd_checklist_id, 'wpnbr_slider', true);
                        //$slideCount = counts($slides);
                        if ($questionGroups){
                                $clr = 1;
                                foreach ($questionGroups as $questionGroup) {
                                  $q_group = $questionGroup['question_group'];
                                  foreach($section_totals as $values){
                                      $section_total = explode('_', $values);
                                      if($section_total[0] == $q_group){
                                           $total_point_in_section= $section_total[1];
                                      }
                                  }

              $html .= '<li>
                 <table border="0">
                   <tr>
                     <td width="45%" align="right">'.get_the_title($q_group).'</td>
                     <td width="10%" align="center">'.$total_point_in_section.'%</td>
                     <td width="45%"><div class="progress-bar"><div class="progress-bar-inner c'.$clr.'" style="width: '.$total_point_in_section.'%"></div></div></td>
                   </tr>
                 </table>
                 </li>';
                 $clr++;
                   }
                 }
                 $html .= '</ul>
           </div>
        </div>
      </div>
      <div class="SetAutoPageBreak"></div>';
      $imagedata2 = file_get_contents(WPMRDC_PLUGIN_DIR ."/includes/img/brand-logo.png");
           // alternatively specify an URL, if PHP settings allow
      $base64_2 = base64_encode($imagedata2);


      $html .= '<div class="header">
        <table border="0" width="100%">
          <tr>
            <td width="50%"><img src="data:image/png;base64,'. $base64_2 .'" alt="" /></td>
            <td width="50%" align="right">'.date("j F, Y").'</td>
          </tr>
        </table>
      </div>
      <footer>
      <table border="0" width="100%">
        <tr>
          <td width="50%"><img src="data:image/png;base64,'. $base64_2 .'" alt="" /></td>
          <td width="50%" align="right"><span class="page">Page: </span></td>
        </tr>
      </table>
      </footer>';
      $questionGroups = get_post_meta($mrd_checklist_id, 'wpnbr_slider', true);
                //$slideCount = counts($slides);
                if ($questionGroups){
                        $count = 1;
                        foreach ($questionGroups as $questionGroup) {
                                $q_group = $questionGroup['question_group'];
                                $q_point = $questionGroup['q_point'];
                                $questions = get_post_meta($q_group, 'wpnbr_slider', true);
                                $total_q_in_section = count($questions);
                                foreach($selectedQuestions as $value){
                                    $completed = explode('_', $value);
                                    if($completed[1] == $q_group){
                                         $total_q_in_section= $total_q_in_section - 1;
                                    }
                                }
      $html .='<div class="checklist_report">
      <div class="doc-panel" style="padding-bottom:0; padding-top:0; margin:0;">
         <div class="panel lg-mb">
            <div class="title-panel">
              <table>
                <tr>
                  <td width="87%"><h2 class="title">'.get_the_title($q_group).'</h2></td>
                  <td width="12%" style="text-align:right" align="right"><span class="title-badge text-danger">incomplete '.$total_q_in_section.'</span></td>
                </tr>
              </table>


            </div>
            <div class="result-list">';
            $questions = get_post_meta($q_group, 'wpnbr_slider', true);
            if ($questions):
                    $count = 1;
                    foreach ($questions as $question) {
                            $q_title = $question['q_title'];
                            $q_point = $question['q_point'];
                            $q_description = $question['q_description'];
                    $q_id = 'q_'.$q_group.'_'.$count;
                    if(in_array($q_id,$selectedQuestions)){
                      $imagedata3 = file_get_contents(WPMRDC_PLUGIN_DIR ."/includes/img/green-check.svg");
                           // alternatively specify an URL, if PHP settings allow
                      $base64_3 = base64_encode($imagedata3);
            $html .= '<div class="result-item completed">
                  <table width="100%">
                    <tr>
                      <td style="width:6%;"><span class="result-icon"><img src="data:image/svg;base64,'. $base64_3 .'" alt="icon"></span></td>
                      <td width="89%"><div class="result-meta">
                         <h4>'.$q_title.'</h4>
                         <p>'.$q_description.'</p>
                      </div></td>
                      <td width="5%" class="result-percentage">
                        '.$q_point.'%
                      </td>
                    </tr>
                  </table>
                </div>';
            } else{
              $imagedata4 = file_get_contents(WPMRDC_PLUGIN_DIR ."/includes/img/red-uncheck.svg");
                   // alternatively specify an URL, if PHP settings allow
              $base64_4 = base64_encode($imagedata4);
              $html .= '<div class="result-item not-complete">
                    <table width="100%">
                      <tr>
                        <td style="width:6%;"><span class="result-icon"><img src="data:image/svg;base64,'. $base64_4 .'" alt="icon"></span></td>
                        <td width="89%"><div class="result-meta">
                           <h4>'.$q_title.'</h4>
                           <p>'.$q_description.'</p>
                        </div></td>
                        <td width="5%" class="result-percentage">
                          '.$q_point.'%
                        </td>
                      </tr>
                    </table>
                  </div>';
            }
                $count++;
            }
          endif;
            $html .= '

            </div>
         </div>
      </div>
      </div>';

    }
    }
		// $html .= '<link rel="stylesheet" href="bootstrap.min.css">';
		// $html .= '<div class="SetAutoPageBreak"></div>';
    //
		//  $html .= '<p class="page">Page </p>';
    // echo $html;
    // exit;
		 //$file_name = md5(rand()) . '.pdf';
		 $file_name = 'chklst-' . strtolower(str_replace(' ', '-', $checker_name)) . date('m-d-Y-hia') . '.pdf';
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();
		//$dompdf->stream("checklist", array("Attachment" => 0));
	/*	$file = $dompdf->output();
			 file_put_contents($file_name, $file);
			 echo json_encode(array('sent'=>true, 'response'=>'<div class="alert alert-success">'.$file_name.'</div>' ) );
			 die(); */
		$file = $dompdf->output();
		 file_put_contents($file_name, $file);
		 $attachments = array( $file_name );
     $subject = 'Report - '. get_the_title($mrd_checklist_id);
     $subject2 = 'Report of - '. $web_address;
     $message_body = wpautop(get_post_meta($mrd_checklist_id,'mrdchecklist_email_body',true));
     $message = '<div style="font-size:16px"><p style="font-size:16px">Hi '.$checker_name.',</p>';
     $message .= $message_body;
     $message .= '</div>';
     $message2 = '<div style="font-size:16px"><p style="font-size:16px">Report for '.$web_address.',</p><p style="font-size:16px">Report Taken By: '.$checker_name.',</p><p style="font-size:16px">Email Id: '.$checker_email.',</p><p style="font-size:16px">Phone: '.$checker_phone.',</p>';
     $message2 .= '</div>';
		 $headers = 'From: Mr-Digital.co.uk <noreply@mr-digital.co.uk>' . "\r\n";
     function mrdchecklist2020_set_content_type(){
          return "text/html";
      }
      add_filter( 'wp_mail_content_type','mrdchecklist2020_set_content_type' );
      if(is_email($checker_email)){
    		 if(wp_mail( $checker_email, $subject, $message, $headers, $attachments )){

           if(wp_mail( 'hello@mr-digital.co.uk, ross@mr-digital.co.uk', $subject2, $message2, $headers, $attachments )){
             echo json_encode(array('sent'=>true, 'redirect' => get_permalink(6784), 'response'=>'<div style="margin-top:30px;" class="alert alert-success text-center">Your report is successfully sent. Please check your email inbox and spam folders too.</div>' ) );
      		 die();
           }

    		}
      } else{
        echo json_encode(array('sent'=>false, 'response'=>'<div style="margin-top:30px;" class="alert alert-danger text-center">Please enter a valid email address.</div>' ) );
        die();
      }
	}



}
$mrdchecklistajax = new Checklist_Mrdigital_Ajax();
?>
