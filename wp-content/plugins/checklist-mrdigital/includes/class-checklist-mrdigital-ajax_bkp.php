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
	public function mrd_checklist_result(){
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

	public function mrd_checklist_result_new(){
    $mrd_checklist_id = $_POST['mrd_checklist_id'];
    $checker_name = $_POST['checker_name'];
    $checker_phone = $_POST['checker_phone'];
    $checker_email = $_POST['checker_email'];
    $web_address = $_POST['web_address'];
    $checker_chart = stripslashes($_POST['checker_chart']);
    $selected_questions = $_POST['selected_questions'];
		$dompdf = new Dompdf();
		$html = '
		<style>
	  .head_line{
	  }
	  .header{
	    position:fixed; top:-2.5cm;width:100%;
	      background:url("'. WPMRDC_PLUGIN_DIR .'/includes/img/top-line2.png");
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
	 .progress-frame ul li {
	     display: block;
	     flex-direction: row;
	     align-items: center;
	     margin-bottom: 20px;
	     font-family:arial, sans-serif;
	     font-size:20px;
	 }
	 .progress-frame ul li table tr td{
	   font-size:15px;
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
	 .progress-bar .progress-bar-inner.orange { background: #E86914; }
	 .progress-bar .progress-bar-inner.yellow { background: #E9C700; }
	 .progress-bar .progress-bar-inner.red { background: #AE0A1B; }
	 .progress-bar .progress-bar-inner.green { background: #32AB76; }
	 .progress-bar .progress-bar-inner.blue { background: #1C7AC1; }
	 .progress-bar .progress-bar-inner.violet { background: #022C70; }

	 .panel.lg-mb { margin-bottom: 40px; }
	 .title-panel {
	     margin-bottom: 20px;
	 }
	 .title-panel .title {
	     font-size: 20px;
	     font-weight: 700;
	     color: #000000;
	     margin-top: 10px;
	 }
	 .title-panel .title:after {
	     content: "";
	     display: inline-block;
	     width: 22px;
	     height: 2px;
	     position: absolute;
	     background: #CC001B;
	     top: 0;
	     left: 62px;
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
	 </style>




	   <div class="cover-page">
	     <div class="first-header">
	       <img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/mrdc_logo.png" alt="" />
	     </div>
	     <div class="heading">
	       <h2>Web page <span>SEO Audit</span></h2>
	       <p>'.date("j F, Y").'</p>
	     </div>
	     <div class="web_chart">
	       <div class="website_url">https://www.demowebsite.co.uk</div>
	     </div>
	     <div class="doc-panel">
	        <div class="progress-frame">
	           <ul>
	              <li>
	              <table border="0">
	                <tr>
	                  <td width="45%" align="right">Semantic core and keyword Research</td>
	                  <td width="10%" align="center">85%</td>
	                  <td width="45%"><div class="progress-bar"><div class="progress-bar-inner orange" style="width: 85%"></div></div></td>
	                </tr>
	              </table>
	              </li>
	              <li>
	              <table border="0">
	                <tr>
	                  <td width="45%" align="right">On-Site Optimisation</td>
	                  <td width="10%" align="center">95%</td>
	                  <td width="45%"><div class="progress-bar"><div class="progress-bar-inner yellow" style="width: 95%"></div></div></td>
	                </tr>
	              </table>
	              </li>



	           </ul>
	        </div>
	     </div>
	   </div>
	   <div class="header">
	     <table border="0" width="100%">
	       <tr>
	         <td width="50%"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/brand-logo.png" alt="" /></td>
	         <td width="50%" align="right">11 Oct, 2019</td>
	       </tr>
	     </table>
	   </div>
	   <footer>
	   <table border="0" width="100%">
	     <tr>
	       <td width="50%"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/brand-logo.png" alt="" /></td>
	       <td width="50%" align="right"><span class="page">Page: </span></td>
	     </tr>
	   </table>
	   </footer>

	   <div class="checklist_report">
	   <div class="doc-panel">
	      <div class="panel lg-mb">
	         <div class="title-panel">
	           <table>
	             <tr>
	               <td width="70%"><h2 class="title">Semantic core and keyword Research</h2></td>
	               <td width="30%" style="text-align:right" align="right"><span class="title-badge text-danger">incomplete 1</span></td>
	             </tr>
	           </table>


	         </div>
	         <div class="result-list">
	             <div class="result-item completed">
	               <table width="100%">
	                 <tr>
	                   <td style="width:10%;"><span class="result-icon"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/green-check.svg" alt="icon"></span></td>
	                   <td width="75%"><div class="result-meta">
	                      <h4>Analyse competitors’ keywords:</h4>
	                      <p>With ‘competitor research’ you’re just a basic research away from discovering your competitor’s keywords and taking SEO measures to outrank them.</p>
	                   </div></td>
	                   <td width="15%" class="result-percentage">
	                     25%
	                   </td>
	                 </tr>
	               </table>
	             </div>
	             <div class="result-item not-complete">
	               <table width="100%">
	                 <tr>
	                   <td style="width:10%;"><span class="result-icon"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/red-uncheck.svg" alt="icon"></span></td>
	                   <td width="75%"><div class="result-meta">
	                      <h4>Analyse competitors’ keywords:</h4>
	                      <p>With ‘competitor research’ you’re just a basic research away from discovering your competitor’s keywords and taking SEO measures to outrank them.</p>
	                   </div></td>
	                   <td width="15%" class="result-percentage">
	                     25%
	                   </td>
	                 </tr>
	               </table>
	             </div>

	         </div>
	      </div>
	   </div>
	   </div>
		';
		$html .= '<link rel="stylesheet" href="bootstrap.min.css">';
		$html .= '<div class="SetAutoPageBreak"></div>';
		 $html .= '<div id="overlay"></div>';
		 $html .= '<p class="page">Page </p>';
		 $html .= stripslashes($_POST["checker_chart"]);
		 $file_name = md5(rand()) . '.pdf';
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
		 $headers = 'From: My Name <gopu@mr-digital.co.uk>' . "\r\n";
		 if(wp_mail( 'gopu@mr-digital.co.uk', 'report-from-website', 'pleasefindtheattachment', $headers, $attachments )){
			 echo json_encode(array('sent'=>true, 'response'=>'<div class="alert alert-success">The Registration Derails was sent successfully , Thanks!</div>' ) );
			 die();
		}
	}



}
$mrdchecklistajax = new Checklist_Mrdigital_Ajax();
?>
