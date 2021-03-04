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
class Checklist_Mrdigital_ShortCodes {

	/**
	 * Shortcode for display Checklists in Frontend.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_shortcode('mrd_checklist_old', array( $this, 'mrd_checklist_shortcode' ));
		add_shortcode('mrd_checklist', array( $this, 'mrd_checklist_full_shortcode' ));
	}
	public function mrd_checklist_shortcode($atts, $content = null)	{
		extract(shortcode_atts(array(
			'checklist_id'    	 => ''
	    ), $atts));
		$mrdq = new WP_Query(array(
	        'post_type' => 'mrd_checklist',
	        'post__in' => array($checklist_id)
	    ));
			if(isset($_POST['hidden_html'])){

			} else{
			$output = '<div class="progressbar mrd_checklist_progress" style="width:10%"><label for="" class="checklist-total"><span>0</span>%</label></div>';
			while ($mrdq->have_posts()) : $mrdq->the_post();
			global $post;
				$output .= get_the_title();

				$questionGroups = get_post_meta($post->ID, 'wpnbr_slider', true);
                  //$slideCount = counts($slides);
                  if ($questionGroups):
                          $count = 1;
                          foreach ($questionGroups as $questionGroup) {
                                  $q_group = $questionGroup['question_group'];
                                  $q_point = $questionGroup['q_point'];
				$output .= '<div>';
				$output .= get_the_title($q_group);
				$output .= '-';
				$output .= $q_point;
				$mrdqg = new WP_Query(array(
			        'post_type' => 'mrd_question_group',
			        'post__in' => array($q_group)
			    ));
				$output .= ' <label style="display:none; visibility:hidden;" for="" data-sectionPoint="'.$q_point.'" class="section-total section-'.$q_group.'">(<span>0</span>%)</label><ul>';
				while ($mrdqg->have_posts()) : $mrdqg->the_post();
				global $post;
					$questions = get_post_meta($post->ID, 'wpnbr_slider', true);
					if ($questions):
									$count = 1;
									foreach ($questions as $question) {
													$q_title = $question['q_title'];
													$q_point = $question['q_point'];
													$q_description = $question['q_description'];
													$q_links = $question['q_links'];

					$output .= '<li>';
					$output .= '<h3><input class="point-check" type="checkbox" data-section="section-'.$q_group.'" data-point="'.$q_point.'" />'.$q_title.'('.$q_point.')</h3>';
					$output .= '<div>';
					//$output .= $q_description;
					//$output .= '<blockquote>'.$q_links.'</blockquote>';
					$output .= '</div>';
					$output .= '</li>';
				} endif;
				endwhile;
				$output .= '</ul>';
				$output .= '</div>';
												}
									endif;

			endwhile;
				$output .= '<div><h3>Email my detaild report.</h3>';
				$output .= '<div><form action="'.get_permalink($checklist_id).'" id="donut" method="post"><input type="text" name="your-name" placeholder="Your Name" /></div>';
				$output .= '<div><input type="text" name="your-email" placeholder="Email Address" /></div>';
				$output .= '<div><input type="text" name="contact-number" placeholder="Phone Number" /> <input type="hidden" name="hidden_html" id="hidden_html" /></div>';
				$output .= '<div><button class="chartPdf" id="chartPdf">SUBMIT</button></div></form></div><div class="donut-chart"><div id="donut_single" ></div></div>';
			}
			return $output;

	}

	public function mrd_checklist_full_shortcode($atts, $content = null)	{
		extract(shortcode_atts(array(
			'checklist_id'    	 => '',
			'web_url_label' => 'Enter your Website Url'
	    ), $atts));
		$mrdq = new WP_Query(array(
	        'post_type' => 'mrd_checklist',
	        'post__in' => array($checklist_id),
	    ));
			while ($mrdq->have_posts()) : $mrdq->the_post();
			global $post;

			$output ='<div class="seo-list-frame" id="mrd_checklist">
    <div class="container_check">
			<div class="mrd_checklist_item mrd_checklist_test active">
      <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
          <div class="seo-list-header">
            <h2 class="seo-list-title">'.get_the_title($checklist_id).'</h2>
            <div class="progress progress-seo">
              <div class="progress-bar mrd_checklist_progress" style="width:6%">
                <label for="" class="checklist-total"><span>0</span>%</label>
              </div>
            </div>
            <div class="seo-list-meta"><span>Questions Completed : <span class="competed_question_count">0</span>/<span class="total_question_count">43</span></span></div>
          </div>
          <div class="progress-list-frame">
            <div class="progress-list-label">STEP</div>
            <ul class="progress-list">';
						$mrdQestions = get_post_meta($post->ID, 'wpnbr_slider', true);
											$stepCount = count($mrdQestions);
											$stepCount = $stepCount + 2;
											for ($i=1; $i <= $stepCount ; $i++) {
													$output .= '<li class="mrd_s_'.$i.'"></li>';
											}
						$output .= '</ul>
          </div>

        </div>
      </div>
      <div class="check_steps check_step-1 active">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
						<div class="mcrCheckDescription">'.wpautop(get_post_meta($checklist_id, 'mrdchecklist_checklist_description', true)).'</div>
            <div class="seo-list-footer">
              <img src="'.plugin_dir_url( __FILE__ ).'img/enter-your-web-icon.png" alt="media">
              <h4 class="seo-red-title" style="margin-top:0 !important;">'.$web_url_label.'</h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="row">
              <div class="col-md-9">
                <div class="form-group form-group-seo">
                  <input type="text" class="form-control liner" required id="mrdc_web_url" placeholder="https://www.website.com">
                  <span class="form-group-icon">
                    <img src="'.plugin_dir_url( __FILE__ ).'img/icon-seo-world.svg" alt="icon">
                  </span>
                </div>
              </div>
              <div class="col-md-3">
                <a href="#mrd_checklist" class="btn btn-site-red btn-block btn-next check_step_button_first" data-step="mrd_s_2" data-next="check_step-2">Next
                  <svg xmlns="http://www.w3.org/2000/svg" width="21.905" height="18.828" viewBox="0 0 21.905 18.828">
                    <g id="Group_902" data-name="Group 902" transform="translate(-1072.136 -8429.086)">
                      <path id="Path_5202" data-name="Path 5202" d="M1068.041,8405l8,8-8,8" transform="translate(17 25.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                      <line id="Line_43" data-name="Line 43" x2="18" transform="translate(1073.136 8438.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" />
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>';
			$questionGroups = get_post_meta($post->ID, 'wpnbr_slider', true);
								$questionCount = count($questionGroups);
								if ($questionGroups):
												$c = 2;
												$totalcount = 0;
												foreach ($questionGroups as $questionGroup) {
																$q_group = $questionGroup['question_group'];
																$q_point = $questionGroup['q_point'];
    $output .= '<div class="check_steps check_step-'.$c.'">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="seo-list-footer">
              <img src="'.plugin_dir_url( __FILE__ ).'img/semantic-core-icon.svg" alt="media">
              <h4 class="seo-red-title" style="margin-top:0 !important;">'.get_the_title($q_group).'<input type="hidden" data-sectionTitle="'.get_the_title($q_group).'" data-qsgroup="'.$q_group.'" class="input_sections section-'.$q_group.'" value="" /><label style="display:none; visibility:hidden;" for="" data-sectionPoint="'.$q_point.'" class="section-total section-'.$q_group.'">(<span>0</span>%)</label></h4>
            </div>
						<div class="mcrCheckDescriptions">'.wpautop(get_post_meta($q_group, 'question_group_quest_description', true)).'</div>

          </div>
        </div>

        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="accordion accordion-list" id="accordionSEOList">';
						$questions = get_post_meta($q_group, 'wpnbr_slider', true);
						if ($questions):
										$count = 1;
										foreach ($questions as $question) {
														$q_title = $question['q_title'];
														$q_point = $question['q_point'];
														$q_description = $question['q_description'];
														$q_links = $question['q_links'];
    $output .='<div class="card card-check-box">
                <input type="checkbox" class="point-check" id="checkbox_'.$q_group.'_'.$count.'" data-section="section-'.$q_group.'" value="q_'.$q_group.'_'.$count.'" data-point="'.$q_point.'">
                <label for="checkbox_'.$q_group.'_'.$count.'">
                  <span class="round-box"><i></i></span>
                  <div class="card-header" id="headingOne">
                    '.$q_title.'
                    <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_'.$q_group.'_'.$count.'" aria-expanded="true" aria-controls="collapse_'.$q_group.'_'.$count.'"></button>
                  </div>
                  <div id="collapse_'.$q_group.'_'.$count.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSEOList">
                    <div class="card-body">'.$q_description.'</div>
                  </div>
                </label>
              </div>';
							$count++;
							$totalcount++;
						}
					endif;
					$nect_c = $c+1;
					$prev_c = $c-1;
					$newCount = $questionCount + 1;
          $output .= '
            </div>

            <div class="row mt-3">
              <div class="col-6 text-left"><a href="#mrd_checklist" class="btn btn-site-light mrdc_prev_btn" data-prev="check_step-'. $prev_c .'">Back</button></div>';
						if($c < $newCount){
            $output .= '<div class="col-6 text-right"><a href="#mrd_checklist" class="btn btn-site-red btn-next mrdc_next_btn" data-step="mrd_s_'. $nect_c .'"  data-next="check_step-'. $nect_c .'">
                  Next<svg xmlns="http://www.w3.org/2000/svg" width="21.905" height="18.828" viewBox="0 0 21.905 18.828">
                    <g id="Group_902" data-name="Group 902" transform="translate(-1072.136 -8429.086)">
                      <path id="Path_5202" data-name="Path 5202" d="M1068.041,8405l8,8-8,8" transform="translate(17 25.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                      <line id="Line_43" data-name="Line 43" x2="18" transform="translate(1073.136 8438.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" />
                    </g>
                  </svg>
                </a>
              </div>';
						} else{
							$output .= '<div class="col-6 text-right"><a href="#mrd_checklist" class="btn btn-site-red btn-next mrdc_result_btn" data-next="check_step-last">
	                  Submit
	                </a>
	              </div>';
						}
          $output .= '</div> <!-- row mt-3 -->
          </div>

        </div> <!-- row accordian -->
      </div> <!-- Step2 -->';
			$c++;
		}
	endif;
	$output .= '</div>';
	$output .= '<div class="mrd_checklist_item mrd_checklist_result"><div class="">
	<div class="row">
						 <div class="col-xl-9 col-lg-10 mx-auto">
								<div class="seo-result-panel text-center">
									 <h2 class="title-dark">Your Score</h2>
									 <h3 class="title-red"><span class="web_address">www.demowebsite.com</span></h3>
									 <div class="chart-panel">
											<div class="chart-row">
												 <div class="chart-img-container" id="donut_single"><img src="'.plugin_dir_url( __FILE__ ).'img/round-img.png" alt="media"></div>
												 <div class="score-text">
														<div class="score-text-inner">
															 <div class="title">0/100</div>
															 <span>Your Score</span>
														</div>
												 </div>
											</div>
									 </div>
								</div>
						 </div>
					</div>

					<div class="row">
						 <div class="col-xl-9 col-lg-10 mx-auto">
								<div>
									 <h3 class="seo-form-title">Email My Detailed Report and score Card</h3>
								</div>
								<div class="seo-submit-form">
									 <div class="row">
											<div class="col-md-6">
												 <div class="form-group form-group-seo">
														<input type="text" class="form-control liner" value="'. $_GET['yname'] . '" placeholder="Name" id="checker_name">
														<span class="form-group-icon">
															 <img src="'.plugin_dir_url( __FILE__ ).'img/icon-seo-user.svg" alt="icon">
														</span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group form-group-seo">
														<input type="text" id="web_address" name="web_address" class="form-control liner" placeholder="Website">
														<span class="form-group-icon">
															 <img src="'.plugin_dir_url( __FILE__ ).'img/icon-seo-world.svg" alt="icon">
														</span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group form-group-seo">
														<input type="text" id="checker_phone" value="'. $_GET['phone'] . '" class="form-control liner" placeholder="Phone Number">
														<span class="form-group-icon">
															 <img src="'.plugin_dir_url( __FILE__ ).'img/icon-seo-phone.svg" alt="icon">
														</span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group form-group-seo">
														<input type="email" id="checker_email" value="'. $_GET['email'] . '" class="form-control liner" placeholder="Email">
														<span class="form-group-icon">
															 <img src="'.plugin_dir_url( __FILE__ ).'img/icon-seo-mail.svg" alt="icon">
														</span>
												 </div>
											</div>
											<div class="col-md-12 mt-4 text-center">
												<div class="required_text"></div>
												<input type="hidden" id="mrd_checklist_id" value="'.$checklist_id.'" />
												 <button class="btn btn-site-red" id="checker_submit"><img src="'.plugin_dir_url( __FILE__ ).'img/icon-send-mail.svg" class="mr-3" alt="media">Email My Detailed Report</button>
												 <div id="mrd_checklist_alert"></div>
											</div>
									 </div>
								</div>
						 </div>
					</div>
	</div></div>';
	$output .=' </div> <!-- container -->
  </div> <!-- seoframe -->
	';
	$output .="
	<script>
	google.charts.load('current', {'packages':['corechart']});
	//google.charts.setOnLoadCallback(drawChart);


	</script>";
	$output .= '
	<input type="hidden" id="total_question_count" value="'.$totalcount.'" />';
endwhile;


			return $output;

	}

}
$mrdcshortcode = new Checklist_Mrdigital_ShortCodes();
?>
