<?php
// require_once get_template_directory() . '/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

function package_builder_exact_submit(){
$dompdf = new Dompdf();
		 $calc_weburl = $_POST['calc_weburl'];

		 $your_name = $_POST['your_name'];
		 $your_company = $_POST['your_company'];
		 $email_address = $_POST['email_address'];
		 $phone_number = $_POST['phone_number'];
		 $type_of_business = $_POST['type_of_business'];
		 $size_of_marketing_team = $_POST['size_of_marketing_team'];
		 $website_url = $_POST['website_url'];
		 $how_many_blogs = $_POST['how_many_blogs'];
		 $number_of_words = $_POST['number_of_words'];
		 $infographic = $_POST['infographic'];
		 $number_of_webpages = $_POST['number_of_webpages'];
		 $webpage_design = $_POST['webpage_design'];
		 $seo_ranking = $_POST['seo_ranking'];
		 $social_media_channels = $_POST['social_media_channels'];
		 $number_of_posts = $_POST['number_of_posts'];
		 $smo_design_type = $_POST['smo_design_type'];
		 $email_newsletter = $_POST['email_newsletter'];
		 $email_automation = $_POST['email_automation'];
		 $crm = $_POST['crm'];
		 $ad_spend = $_POST['ad_spend'];
		 $facebookAds = $_POST['facebookAds'];
		 $google_ads = $_POST['google_ads'];
		 $linkedin_ads = $_POST['linkedin_ads'];
		 $microsoft_ads = $_POST['microsoft_ads'];
		 $linkedin_out_reach = $_POST['linkedin_out_reach'];
		 $frequency = $_POST['frequency'];
		 $modeOfMeeting = $_POST['modeOfMeeting'];
		 $caluculateHour = $_POST['caluculateHour'];
		 $caluculateCost = $_POST['caluculateCost'];

		 $subject = 'Marketing Package Calculator Exact Cost Request - '. $your_name;
     //$subject2 = 'Report of - '. $web_address;
     $message_body = '<h3>Exact Cost Request.</h3>';
     $message_body .= '<h3>Caculated Cost : <strong>'.$caluculateCost.'</strong></h3>';
     $message_body .= '<h3>Calculated Hour : <strong>'.$caluculateHour.'</strong></h3>';
     $message_body .= '<p>Name : <strong>'.$your_name.'</strong></p>';
     $message_body .= '<p>Email : <strong>'.$email_address.'</strong></p>';
     $message_body .= '<p>Phone Number : '.$phone_number.'</strong></p>';
     $message_body .= '<p>Company : <strong>'.$your_company.'</strong></p>';
		 $message_body .= '<p>Website Url : <strong>'.$website_url.'</strong></p>';
		 $message_body .= '<p>Type of Business? : <strong>'.$type_of_business.'</strong></p>';
		 $message_body .= '<p>Size of Dedicated Marketing Team? : <strong>'.$size_of_marketing_team.'</strong></p>';
		 $message_body .= '<p>How Many Blogs per Month : <strong>'.$how_many_blogs.'</strong></p>';
		 $message_body .= '<p>Number of words per blog : <strong>'.$number_of_words.'</strong></p>';
		 $message_body .= '<p>Infographic / eBook / Case study : <strong>'.$infographic.'</strong></p>';
		 $message_body .= '<p>Number of Pages on Website : <strong>'.$number_of_webpages.'</strong></p>';
		 $message_body .= '<p>Web Page Design & Development  : <strong>'.$webpage_design.'</strong></p>';
		 $message_body .= '<p>SEO Ranking for Keywords : <strong>'.$seo_ranking.'</strong></p>';
		 $message_body .= '<p>How many Social Media Channels? : <strong>'.$social_media_channels.'</strong></p>';
		 $message_body .= '<p>Number of posts per channel : <strong>'.$number_of_posts.'</strong></p>';
		 $message_body .= '<p>Design : <strong>'.$smo_design_type.'</strong></p>';
		 $message_body .= '<p>Email Newsletter : <strong>'.$email_newsletter.'</strong></p>';
		 $message_body .= '<p>Email Automation : <strong>'.$email_automation.'</strong></p>';
		 $message_body .= '<p>CRM : <strong>'.$crm.'</strong></p>';
		 $message_body .= '<p>Ad Spend - Monthly Advertising Budget : <strong>'.$ad_spend.'</strong></p>';
		 $message_body .= '<p>Facebook Ads - Number of Campaigns : <strong>'.$facebookAds.'</strong></p>';
		 $message_body .= '<p>Google Ads - Number of Campaigns : <strong>'.$google_ads.'</strong></p>';
		 $message_body .= '<p>LinkedIn Ads - Number of Campaigns : <strong>'.$linkedin_ads.'</strong></p>';
		 $message_body .= '<p>Microsoft Ads - Number of Campaigns : <strong>'.$microsoft_ads.'</strong></p>';
		 $message_body .= '<p>LinkedIn Outreach : <strong>'.$linkedin_out_reach.'</strong></p>';
		 $message_body .= '<p>Frequency : <strong>'.$frequency.'</strong></p>';
		 $message_body .= '<p>Mode of Meeting : <strong>'.$modeOfMeeting.'</strong></p>';
		 $message_body2 = '<p>Hi '.$your_name.',</p>';
		 $message_body2 .= '<p>Thanks for requesting your marketing package cost from Mr Digital.</p>';
		 $message_body2 .= '<p>Please find attached a breakdown of your marketing package requirements and quote.</p>';
		 $message_body2 .= '<p>When is a good time for me to contact you to discuss your requirements?</p>';
		 $message_body2 .= '<p>I look forward to hearing from you.</p>';
		 $message_body2 .= '<p>Kind regards,</p>';
		 $message_body2 .= '<p>Ross</p>';

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
		img{
			max-width:80px;
			height:auto;
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
			padding:6px 0px;
		 }

		h4{
			color:#D8001A;
		}

		.time{
			text-align: center;
font: Bold 34px/28px arial;
font-family:arial, sans-serif;
letter-spacing: 0;
color: #D8001A;
opacity: 1;
		}
		td p{
			text-align: center;
font: Medium 13px/28px arial;
font-family:arial, sans-serif;
letter-spacing: 0;
color: #000000;
opacity: 1;
		}
		.cal_costs	img{
			margin-bottom: 0px;

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
		 	 <div class="first-header">
		 		 <img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/newlogo.png" alt="" />
		 	 </div>
		 	 <div class="heading">
			 	 <p>'.date("j F, Y").'</p>
		 		 <h2>Marketing Package Summary</h2>
				 <p>'.$website_url.'</p>
		 	 </div>
			 <div class="score">
			 	<table>
					<tr>
						<td align="center" class="cal_costs">
							<img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/clock.jpg" alt="" />
							<div class="time">'.$caluculateHour.':00</div>
							<p>Hrs per Month</p>
						</td>
						<td align="center"  class="cal_costs">
							<img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/euro.jpg" alt="" />
							<div class="time">'.$caluculateCost.'</div>
							<p>Monthly Investment</p>
						</td>
					</tr>
				</table>
			 </div>
		 	 <div class="doc-panel">
		 			<div class="progress-frame">
		 				 <ul>';
						if($type_of_business || $size_of_marketing_team){
						 $html .= '<li>
						 <h4>Let us get to know your business</h4>
		 						<table border="0">';
									if($type_of_business){
							$html .= '<tr>
		 								<td width="45%" align="left">Type of Business?</td>
		 								<td width="10%" align="center">:</td>
		 								<td width="45%"><strong>'.$type_of_business.'</strong></td>
		 							</tr>';
								}
									if($size_of_marketing_team){
							$html .= '<tr>
		 								<td width="45%" align="left">Size of Dedicated Marketing Team?</td>
		 								<td width="10%" align="center">:</td>
		 								<td width="45%"><strong>'.$size_of_marketing_team.'</strong></td>
		 							</tr>';
								}
		 						$html .= '</table>
		 						</li>';
							}
							if($how_many_blogs || $number_of_words || $infographic){
							$html .= '<li>
	 						 <h4>Content</h4>
	 		 						<table border="0">';
										if($how_many_blogs){
	 		 						$html .= '	<tr>
	 		 								<td width="45%" align="left">How Many Blogs per Month</td>
	 		 								<td width="10%" align="center">:</td>
	 		 								<td width="45%"><strong>'.$how_many_blogs.'</strong></td>
	 		 							</tr>';
									}
									if($number_of_words){
									$html .= '	<tr>
	 		 								<td width="45%" align="left">Number of words per blog</td>
	 		 								<td width="10%" align="center">:</td>
	 		 								<td width="45%"><strong>'.$number_of_words.'</strong></div></td>
	 		 							</tr>';
									}
									if($infographic){
	 								$html .= '<tr>
	 		 								<td width="45%" align="left">Infographic / eBook / Case study</td>
	 		 								<td width="10%" align="center">:</td>
	 		 								<td width="45%"><strong>'.$infographic.'</strong></td>
	 		 							</tr>';
									}
									$html .= '	</table>
	 		 						</li>';
								}
								if($number_of_webpages || $webpage_design || $seo_ranking){
								$html .= '<li>
		 						 <h4>Website Management</h4>
		 		 						<table border="0">';
										if($number_of_webpages){
		 		 						$html .= '	<tr>
		 		 								<td width="45%" align="left">Number of Pages on Website</td>
		 		 								<td width="10%" align="center">:</td>
		 		 								<td width="45%"><strong>'.$number_of_webpages.'</strong></td>
		 		 							</tr>';
										}
										if($webpage_design){
		 								$html .= '	<tr>
		 		 								<td width="45%" align="left">Web Page Design & Development </td>
		 		 								<td width="10%" align="center">:</td>
		 		 								<td width="45%"><strong>'.$webpage_design.'</strong></td>
		 		 							</tr>';
										}
										if($seo_ranking){
		 								$html .= '	<tr>
		 		 								<td width="45%" align="left">SEO Ranking for Keywords</td>
		 		 								<td width="10%" align="center">:</td>
		 		 								<td width="45%"><strong>'.$seo_ranking.'</strong></td>
		 		 							</tr>';
										}
		 		 						$html .= '</table>
		 		 						</li>';
									}
									if($social_media_channels || $number_of_posts || $smo_design_type){
										$html .= '<li>

			 						 <h4>Social Media</h4>
			 		 						<table border="0">';
											if($social_media_channels){
			 		 						$html .= '
			 		 							<tr>
			 		 								<td width="45%" align="left">How many Social Media Channels?</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$social_media_channels.'</strong></td>
			 		 							</tr>';
											}
											if($number_of_posts){
			 								$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Number of posts per channel</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$number_of_posts.'</strong></td>
			 		 							</tr>';
											}
											if($smo_design_type){
			 								$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Design</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$smo_design_type.'</strong></td>
			 		 							</tr>';
											}
			 		 					$html .= '	</table>
										</li>';
									}
									if($email_newsletter || $email_automation || $crm){
										$html .= '
										<li>
			 						 <h4>Emails & CRM</h4>
			 		 						<table border="0">';
											if($email_newsletter){
			 		 						$html .= '
			 		 							<tr>
			 		 								<td width="45%" align="left">Email Newsletter</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$email_newsletter.'</strong></td>
			 		 							</tr>';
											}
												if($email_automation){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Email Automation</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$email_automation.'</strong></td>
			 		 							</tr>';
											}
												if($crm){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">CRM</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$crm.'</strong></td>
			 		 							</tr>';
											}
			 		 							$html .= '</table>
										</li>';
									}
									if($ad_spend || $facebookAds || $google_ads || $linkedin_ads || $microsoft_ads){
										$html .= '	<li>
			 						 <h4>Advertising Campaigns</h4>
			 		 						<table border="0">';
											if($ad_spend){
			 		 						$html .= '
			 		 							<tr>
			 		 								<td width="45%" align="left">Ad Spend - Monthly Advertising Budget</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$ad_spend.'</strong></td>
			 		 							</tr>';
											}
												if($facebookAds){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Facebook Ads - Number of Campaigns</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$facebookAds.'</strong></td>
			 		 							</tr>';
											}
												if($google_ads){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Google Ads - Number of Campaigns</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$google_ads.'</strong></td>
			 		 							</tr>';
											}
												if($linkedin_ads){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">LinkedIn Ads - Number of Campaigns</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$linkedin_ads.'</strong></td>
			 		 							</tr>';
											}
												if($microsoft_ads){
				 		 						$html .= '
			 									<tr>
			 		 								<td width="45%" align="left">Microsoft Ads - Number of Campaigns</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$microsoft_ads.'</strong></td>
			 		 							</tr>';
											}
			 		 						$html .= '</table>
										</li>';
									}
									if($linkedin_out_reach){
										$html .= '	<li>
			 						 <h4>Sales Outreach</h4>
			 		 						<table border="0">
			 		 							<tr>
			 		 								<td width="45%" align="left">LinkedIn Outreach</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$linkedin_out_reach.'</strong></td>
			 		 							</tr>
			 		 						</table>
										</li>
										';
									}
									if($frequency || $modeOfMeeting){
										$html .= '
										<li>
			 						 <h4>Project Management</h4>
			 		 						<table border="0">';
											if($frequency){
											$html .= '
			 		 							<tr>
			 		 								<td width="45%" align="left">Frequency</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$frequency.'</strong></td>
			 		 							</tr>';
											}
											if($modeOfMeeting){
											$html .= '
			 		 							<tr>
			 		 								<td width="45%" align="left">Mode of Meeting</td>
			 		 								<td width="10%" align="center">:</td>
			 		 								<td width="45%"><strong>'.$modeOfMeeting.'</strong></td>
			 		 							</tr>';
											}
												$html .= '
			 		 						</table>
										</li>';
									}
										$html .= '
									</ul>
		 			</div>
		 	 </div>
		  </div>
		 ';
		  $html .= '<div class="header">
		 	 <table border="0" width="100%">
		 		 <tr>
		 			 <td width="50%"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/newlogo.png" alt="" /></td>
		 			 <td width="50%" align="right">'.date("j F, Y").'</td>
		 		 </tr>
		 	 </table>
		  </div>
		  <footer>
		  <table border="0" width="100%">
		 	 <tr>
		 		 <td width="50%"><img src="'. WPMRDC_PLUGIN_DIR .'/includes/img/newlogo.png" alt="" /></td>
		 		 <td width="50%" align="right"><a href="https://www.mr-digital.co.uk">www.mr-digital.co.uk</a></td>
		 	 </tr>
		  </table>
		  </footer>';
		$file_name = 'mr-digital-' . strtolower(str_replace(' ', '-', $checker_name)) . date('m-d-Y-hia') . '.pdf';
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
     $message = $message_body;

		 $headers = 'From: Mr-Digital.co.uk <noreply@mr-digital.co.uk>' . "\r\n";
     function calculator_set_content_type_mail(){
          return "text/html";
      }
      add_filter( 'wp_mail_content_type','calculator_set_content_type_mail' );
      if(is_email($email_address)){
    		 if(wp_mail( 'gopu@mr-digital.co.uk, ross@mr-digital.co.uk', $subject, $message, $headers)){
					 wp_mail( $email_address, 'Your Marketing Package Summary - Mr Digital', $message_body2, $headers, $attachments);
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
	add_action( 'wp_ajax_nopriv_package_builder_exact_submit', 'package_builder_exact_submit' );
	add_action( 'wp_ajax_package_builder_exact_submit', 'package_builder_exact_submit' );
	////////////////////////////////////////////////////////////
 ?>
