<?php
/* Registering meta box for Portfolio slider
===============================================*/
function mrd_checklist_meta_box() {
	add_meta_box(
		'mrd_checklist_meta_box', // $id
		'Questions', // $title
		'show_mrd_checklist_meta_box', // $callback
		'mrd_checklist', // $page
		'normal', // $context
		'high' // $priority
	);
}
add_action('add_meta_boxes', 'mrd_checklist_meta_box');
function show_mrd_checklist_meta_box() {
	global $post;
	$meta = get_post_meta($post->ID, 'wpnbr_slider', true);
	//$image = get_template_directory_uri() . '/images/addPhoto.jpg';
	$image = '';
	$i = 1;
	$html = '<li class="wpnbr_slider_%1$d">
  <span class="sort hndle button" title="Click and drag to reorder this slide"><span class="dashicons-move dashicons"></span></span>
  <span class="wpnbr_slide_remove" title="Click to remove this slide"><span class="dashicons-trash dashicons"></span></span>
  <div class="row">
	<div class="col-sm-3">
	<span class="wpnbr_slide_default_image" style="display:none"></span>
				<img src="%3$s" class="wpnbr_slide_preview_image" />
				<br />
				<input name="wpnbr_slider[%1$d][imageId]" type="hidden" class="wpnbr_slide_upload_image" value="%2$s" />
				<input class="wpnbr_slide_upload_image_button button" type="button" value="Upload Icon" /><br />
				<small>&nbsp;<a href="#" class="wpnbr_slide_clear_image_button">Remove Icon</a></small>
	</div>
  <div class="col-sm-5">
    <div class="form-group">';
		$items = get_posts( array (
			 'post_type'	=> 'mrd_question_group',
			 'posts_per_page' => -1
		 ));
    $html .='<label for="">Question</label><select name="wpnbr_slider[%1$d][question_group]" class="form-control"><option value="">Select One</option>';
		foreach($items as $item) {
						$html .= '<option value="'.$item->ID.'">'.$item->post_title.'</option>';
					} // end foreach
		$html .= '</select>
	</div>
</div>
<div class="col-sm-4">
		<div class="form-group">';
		$html .='<label for="">Point (&percnt;)</label>
				 <input type="text" name="wpnbr_slider[%1$d][q_point]" value="%4$s" placeholder="Point" class="form-control" />
		</div>
	</div>
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
			<div class="col-sm-3">
			<span class="wpnbr_slide_default_image" style="display:none">' . get_template_directory_uri() . '/images/addPhoto.jpg</span>
							<img src="'.$currImg.'" class="wpnbr_slide_preview_image" />
							<br />
							<input name="wpnbr_slider['.$i.'][imageId]" type="hidden" class="wpnbr_slide_upload_image" value="'.$item['imageId'].'" />
							<input class="wpnbr_slide_upload_image_button button" type="button" value="Upload Icon" />
							<small><div><a href="#" class="wpnbr_slide_clear_image_button">Remove Icon</a></div></small>
			</div>
      <div class="col-sm-5">
        <div class="form-group">';
        	echo '<label for="">Select a Question</label><select name="wpnbr_slider['.$i.'][question_group]" class="form-control"><option value="">Select One</option>';
					foreach($items as $itemrd) {
	                if($itemrd->ID == $item['question_group']){
	                  $selected = ' selected';
	                } else{
	                  $selected = '';
	                }
									echo '<option value="'.$itemrd->ID.'" '.$selected.'>'.$itemrd->post_title.'</option>';
								} // end foreach
				echo '</select></div>
      </div>
			<div class="col-sm-4">
					<div class="form-group">';
        	echo '<label for="">Point (&percnt;)</label>
							 <input type="text" name="wpnbr_slider['.$i.'][q_point]" value="'.$item['q_point'].'" placeholder="Point" class="form-control" />
        	</div>
				</div>
      </div>




			</li>';
			//printf($html, $i, $item['imageId'], $currImg, $item['caption']);
			$i++;
		}
	} else {
		printf($html, $i, '', $image, '');
	}
	echo '</ul><div class="slider_btn_add"><a class="wpnbr_slide_add button" href="#">+ Add Question</a><br class="clear"></div><br class="clear" />';
	return;
}
function save_mrd_checklist_meta($post_id) {
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
		$image = trim($slide['imageId']);
		$q_title = trim($slide['question_group']);
		$q_point = trim($slide['q_point']);



		$new[] = array('imageId' => $image,'question_group' => $q_title, 'q_point'=>$q_point);
	}

	update_post_meta($post_id, 'wpnbr_slider', $new);
}
add_action('save_post', 'save_mrd_checklist_meta');
//Script
////////////////////////////////////////////////////


// Add the Meta Box
function add_check_mail_meta_box() {
    add_meta_box(
		'mrd_checklist_mail_meta', // $id
		'Checklist Settings', // $title
		'show_mrd_checklist_mail_meta_box', // $callback
		'mrd_checklist', // $page
		'normal', // $context
		'high'); // $priority

}
add_action('add_meta_boxes', 'add_check_mail_meta_box');

// Field Array
$prefix = 'mrdchecklist_';
$mrdcq__meta_fields3 = array(
	array(
		'label'	=> 'Checklist Description',
		'desc'	=> 'This will show below the website url',
		'id'	=> $prefix.'checklist_description',
		'type'	=> 'editor_text'
	),
  array(
		'label'	=> 'Email Body Text',
		'desc'	=> '',
		'id'	=> $prefix.'email_body',
		'type'	=> 'editor_text'
	)

);

// The Callback
function show_mrd_checklist_mail_meta_box() {
	global $mrdcq__meta_fields3, $post, $meta_boxes;
	// Use nonce for verification
	wp_nonce_field( basename( __FILE__ ), 'mrdcq_meta_box_nonce' );

	// Begin the field table and loop
	echo '
  <table class="form-table">';
	foreach ($mrdcq__meta_fields3 as $field) {
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
function save_mrd_checklist_mail_meta_box($post_id) {
    global $mrdcq__meta_fields3;

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
	foreach ($mrdcq__meta_fields3 as $field) {
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
add_action('save_post', 'save_mrd_checklist_mail_meta_box');



//////////////////////////////
/* Filter the single_template with our custom function*/
add_filter('single_template', 'my_custom_template');

function my_custom_template($single) {
    global $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'mrd_checklist' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . '/single-mrd_checklist.php' ) ) {
            return plugin_dir_path( __FILE__ ) . '/single-mrd_checklist.php';
        }
    }
    return $single;

}


?>
