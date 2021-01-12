<?php
// Add the Meta Box
function add_mrd_cq_meta_box() {
    add_meta_box(
		'mrd_checklist_question_meta', // $id
		'Usefull Links', // $title
		'show_mrd_cq_meta_box', // $callback
		'mrd_questions', // $page
		'normal', // $context
		'high'); // $priority

}
add_action('add_meta_boxes', 'add_mrd_cq_meta_box');

// Field Array
$prefix = 'mrdcq_';
$mrdcq__meta_fields3 = array(
  array(
		'label'	=> 'Usefull Links',
		'desc'	=> 'Usefull Links',
		'id'	=> $prefix.'question_links',
		'type'	=> 'editor_text'
	),
);

// The Callback
function show_mrd_cq_meta_box() {
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
function save_mrd_cq_meta_box($post_id) {
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
add_action('save_post', 'save_mrd_cq_meta_box');

?>
