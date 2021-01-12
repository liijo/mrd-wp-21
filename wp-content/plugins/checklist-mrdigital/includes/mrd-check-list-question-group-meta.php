<?php
/* Registering meta box for Portfolio slider
===============================================*/


// Add the Meta Box
function add_question_group_des_meta_box() {
    add_meta_box(
		'mrd_question_group_des_meta', // $id
		'Checklist Settings', // $title
		'show_mrd_question_group_meta_box', // $callback
		'mrd_question_group', // $page
		'normal', // $context
		'high'); // $priority

}
add_action('add_meta_boxes', 'add_question_group_des_meta_box');

// Field Array
$prefix = 'question_group_';
$mrdqgd__meta_fields3 = array(
	array(
		'label'	=> 'Question Description',
		'desc'	=> 'Question Optional Description',
		'id'	=> $prefix.'quest_description',
		'type'	=> 'editor_text'
	)

);

// The Callback
function show_mrd_question_group_meta_box() {
	global $mrdqgd__meta_fields3, $post, $meta_boxes;
	// Use nonce for verification
	wp_nonce_field( basename( __FILE__ ), 'mrdcq_meta_box_nonce' );

	// Begin the field table and loop
	echo '
  <table class="form-table">';
	foreach ($mrdqgd__meta_fields3 as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text
					case 'text':
						echo '<input type="text" style="width:100%" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;

					// image
					case 'image':
						$image = get_template_directory_uri().'/images/inner_section2.jpg';
						echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
						if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium');	$image = $image[0]; }
						echo	'<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
									<img src="'.$image.'" class="custom_preview_image" alt="" style="max-width:120px; height:auto" /><br />
										<input class="custom_upload_image_button button" type="button" value="Choose Image" />
										<small>&nbsp;<a href="#" class="custom_clear_image_button">Remove Image</a></small>
										<br clear="all" /><span class="description">'.$field['desc'].'</span>';
					break;
          ///editor
					case 'editor':

						wp_editor( $meta, $field['id'], array( 'textarea_name' => $field['id'], 'editor_class'=>'custom-editor', 'textarea_rows' => 15, 'media_buttons' => true, 'tinymce' => array( 'theme_advanced_buttons1' =>'bullist,numlist,blockquote,bold,italic,|,justifyleft,justifycenterjustifyright,justifyfull,|,link,unlink','theme_advanced_buttons3' =>''  ) ) );
            echo '<span class="description"><strong>'.$field['desc'].'</strong></span><br /><br />';
					break;///editor
					case 'editor_text':

						wp_editor( $meta, $field['id'], array( 'textarea_name' => $field['id'], 'editor_class'=>'custom-editor', 'textarea_rows' => 15, 'media_buttons' => true, 'teeny' => false,'dfw' => false,'tinymce' => false, ) );
            echo '<span class="description"><strong>'.$field['desc'].'</strong></span><br /><br />';
					break;

				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}


// Save the Data
function save_mrd_question_group_des_meta_box($post_id) {
    global $mrdqgd__meta_fields3;

	// verify nonce
	if (!isset($_POST['mrdcq_meta_box_nonce']) || !wp_verify_nonce($_POST['mrdcq_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}

	// loop through fields and save the data
	foreach ($mrdqgd__meta_fields3 as $field) {
		if($field['type'] == 'tax_select') continue;
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // enf foreach

}
add_action('save_post', 'save_mrd_question_group_des_meta_box');

// *********************************************************

function add_t_csldr_meta_box() {
	add_meta_box(
		't_csldr_meta_box', // $id
		'Questionss', // $title
		'show_t_csldr_meta_box', // $callback
		'mrd_question_group', // $page
		'normal', // $context
		'high' // $priority
	);
}
add_action('add_meta_boxes', 'add_t_csldr_meta_box');
function show_t_csldr_meta_box() {
	global $post;
	$meta = get_post_meta($post->ID, 'wpnbr_slider', true);
	//$image = get_template_directory_uri() . '/images/addPhoto.jpg';
	$image = '';
	$i = 1;
	$html = '<li class="wpnbr_slider_%1$d">
  <span class="sort hndle button" title="Click and drag to reorder this slide"><span class="dashicons-move dashicons"></span></span>
  <span class="wpnbr_slide_remove" title="Click to remove this slide"><span class="dashicons-trash dashicons"></span></span>
  <div class="row">
  <div class="col-sm-6">
    <div class="form-group">
				';
        $items = get_posts( array (
           'post_type'	=> 'mrd_questions',
           'posts_per_page' => -1
         ));
        $html .='<label for="">Select a Question</label><select name="wpnbr_slider[%1$d][question]" class="form-control"><option value="">Select One</option>'; // Select One
        foreach($items as $item) {
								$html .= '<option value="'.$item->ID.'">'.$item->post_title.'</option>';
							} // end foreach
        $html .= '</select></div>
      </div><div class="col-sm-6"><div class="form-group">';
        $html .= '<label for="">Point</label><input type="text" name="wpnbr_slider[%1$d][point]" value="%4$s" placeholder="Title&hellip;" class="wpnbr_slide_caption" /></div></div>
      </div></li>';
			wp_nonce_field( basename( __FILE__ ), 'wpnbr_slider_meta_box_nonce' );
			if ( empty($meta) ) {
				echo '<div class="slider_btn_add"><a class="wpnbr_slide_add button" href="#">+ Add Question</a><br class="clear"></div><ul class="wpnbr_slider onlyone mrd_checklist_repeater">';
			} else{
	echo '<div class="slider_btn_add"><a class="wpnbr_slide_add button" href="#">+ Add Question</a><br class="clear"></div><ul class="wpnbr_slider mrd_checklist_repeater' . (count($meta) <= 1 ? ' onlyone' : '') . '">';
}
	if ( !empty($meta) ) {
		foreach ( $meta as $item ) {
			unset($attachment, $currImg);
			$imagesource = wp_get_attachment_image_src($item['imageId'], 'thumbnail');
			$attachment = is_numeric($item['imageId']) ? array_shift($imagesource) : $item['imageId'];
			$currImg = isset($attachment) && !empty($attachment) ? $attachment : $image;
			echo '<li class="wpnbr_slider_'.$i.'">
      <span class="sort hndle button" title="Click and drag to reorder this slide"><span class="dashicons-move dashicons"></span></span>
      <span class="wpnbr_slide_remove" title="Click to remove this slide"><span class="dashicons-trash dashicons"></span></span>
      <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
				';
        $items = get_posts( array (
           'post_type'	=> 'mrd_questions',
           'posts_per_page' => -1
         ));
        echo '<label for="">Select a Question</label><select name="wpnbr_slider['.$i.'][question]" class="form-control"><option value="">Select One</option>'; // Select One
        foreach($items as $itemrd) {
                if($itemrd->ID == $item['question']){
                  $selected = ' selected';
                } else{
                  $selected = '';
                }
								echo '<option value="'.$itemrd->ID.'" '.$selected.'>'.$itemrd->post_title.'</option>';
							} // end foreach
        echo '</select></div>
      </div><div class="col-sm-6"><div class="form-group">';
        echo '<label for="">Point</label><input type="text" name="wpnbr_slider['.$i.'][point]" value="'.$item['point'].'" placeholder="Title&hellip;" class="form-control" />
        </div></div>
      </div>


			</li>';
			//printf($html, $i, $item['imageId'], $currImg, $item['caption']);
			$i++;
		}
	} else {
		printf($html, $i, '', $image, '');
	}
	echo '</ul><br class="clear" />';
	return;
}
function save_t_csldr_meta($post_id) {
	// verify nonce
	if (!isset($_POST['wpnbr_slider_meta_box_nonce']) || !wp_verify_nonce($_POST['wpnbr_slider_meta_box_nonce'], basename(__FILE__)))

		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}
	$slides = isset($_POST['wpnbr_slider']) ? (array)$_POST['wpnbr_slider'] : array();
	$new = array();
	foreach ( $slides as $slide ) {
		$caption = trim($slide['question']);
		$description = trim($slide['point']);


		$new[] = array('question' => $caption, 'point'=>$description);
	}

	update_post_meta($post_id, 'wpnbr_slider', $new);
}
add_action('save_post', 'save_t_csldr_meta');
//Script

/*
/*	Queue Scripts
============================================*/
/*
/*	Queue Scripts
============================================*/
function mrd_checklist_admin_scripts() {
	global $pagenow, $typenow;

	if ( isset($pagenow) && ( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'themes.php' ) && isset($typenow) ) {
		//wp_enqueue_script('media-upload');
		//wp_enqueue_script('thickbox');
		wp_register_script('wpnbr-upload', get_template_directory_uri() . '/Script/upload-button.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('wpnbr-upload');

	}
}
function mrd_checklist_admin_styles() {
	global $pagenow, $typenow;

	if ( isset($pagenow) && ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) && isset($typenow)) {
		wp_enqueue_style('thickbox');
	}
}
add_action('admin_print_scripts', 'mrd_checklist_admin_scripts');
add_action('admin_print_styles', 'mrd_checklist_admin_styles');

//
function csldrery_head() {
	?><style type="text/css">

		.slider_btn_add { margin:22px 0 0 10px; }
		.wpnbr_slider li, .wpnbr_slider li * { margin: 0; }
		.wpnbr_slider li { float: left; position: relative; text-align: center; background-color: #eee; padding: 5px; border: 1px solid #e0e0e0; border-radius: 4px; margin: 10px !important;  }
		.wpnbr_slider.wpnbr_slider_icon li{
				width:20%;
			}

		.wpnbr_slider li img{max-width:100%; margin:auto; margin-bottom:20px;}
    .wpnbr_slider li input, .wpnbr_slider li textarea{
      margin-bottom: 10px;
      min-height:40px;
    }
    .wpnbr_slider li textarea{
      height:80px;
    }
		.wpnbr_slider li:nth-child(5), .wpnbr_slider li:nth-child(9), .wpnbr_slider li:nth-child(13), .wpnbr_slider li:nth-child(17), .wpnbr_slider li:nth-child(21){clear:left;}
		.wpnbr_slider.wpnbr_slider_icon li:nth-child(4){
				clear:none;
			}
		.wpnbr_slider.wpnbr_slider_icon li img{max-width:80px; margin:auto; background-color:rgba(0,0,0,0.47);}
		.wpnbr_slider li .hndle, .wpnbr_slider li .wpnbr_slide_remove { display: none; position: absolute; top: -6px; padding: 4px; border-radius: 200%; width:30px; height:30px; }
		.wpnbr_slider li:hover .hndle, .wpnbr_slider li:hover .wpnbr_slide_remove { display: block; }
		.wpnbr_slider li .hndle { left: -6px; line-height: 24px; background-color:#E8BFC0; border:solid 1px #C57173}
		.wpnbr_slider li .wpnbr_slide_remove { right: -16px; font-size: 18px !important; padding: 3px 4px; cursor:pointer;width:26px; height:26px; top:-6px;}
		.wpnbr_slider li .wpnbr_slide_remove img{
				height:auto;
			}
		.wpnbr_slider.onlyone li .wpnbr_slide_remove { display: none;  }
		.wpnbr_committee_details.onlyone li .wpnbr_committee_remove { display: none; }
		.wpnbr_slider li .wpnbr_slide_remove:hover, .wpnbr_slider li .wpnbr_slide_remove:active { }
		.wpnbr_slide_preview_image { display: block; margin:auto;  margin-bottom: 8px !important; }
		.wpnbr_slider li br { display: none; }
		.wpnbr_slider li hr { border: 1px solid transparent; border-top-color: #ccc; border-bottom-color: #fff; margin: 8px 0; }
		.wpnbr_slider li .wpnbr_slide_caption { width: 100%; }
		.ui-tabs .ui-tabs-nav{
				background:#ccc!important;
				border-radius:0;
			}
		.slider_btn_add { margin:22px 0 0 10px; }
		.wpzoom_slider li, .wpzoom_slider li * { margin: 0; }
		.wpzoom_slider li { float: left; position: relative; text-align: center; background-color: #eee; padding: 5px; border: 1px solid #e0e0e0; border-radius: 4px; margin: 10px !important; width: 20%;}
		.wpzoom_slider li img{max-width:150px; margin:auto; margin-bottom:20px;}
		.wpzoom_slider li:nth-child(5), .wpzoom_slider li:nth-child(9), .wpzoom_slider li:nth-child(13), .wpzoom_slider li:nth-child(17), .wpzoom_slider li:nth-child(21){clear:left;}
		.wpzoom_slider li .hndle, .wpzoom_slider li .wpzoom_slide_remove { display: none; position: absolute; top: -6px; padding: 4px; border-radius: 50%; }
		.wpzoom_slider li:hover .hndle, .wpzoom_slider li:hover .wpzoom_slide_remove { display: block; }
		.wpzoom_slider li .hndle { left: -6px; line-height: 0; }
		.wpzoom_slider li .wpzoom_slide_remove { right: -6px; font-size: 18px !important; padding: 3px 4px; }
		.wpzoom_slider.onlyone li .wpzoom_slide_remove { display: none; }
		.wpzoom_slider li .wpzoom_slide_remove:hover, .wpzoom_slider li .wpzoom_slide_remove:active { color: red; border-color: red; }
		.wpzoom_slide_preview_image { display: block; width: 250px; border: 1px solid #ccc; margin-bottom: 8px !important; }
		.wpzoom_slider li br { display: none; }
		.wpzoom_slider li hr { border: 1px solid transparent; border-top-color: #ccc; border-bottom-color: #fff; margin: 8px 0; }
		.wpzoom_slider li .wpzoom_slide_caption { width: 100%; font-size:13px;}
		.custom_preview_image{
				display:block;
				margin:20px 0px;
			}
 	</style><?php
}
add_action('admin_head-post-new.php', 'csldrery_head', 100);
add_action('admin_head-post.php', 'csldrery_head', 100);
?>
