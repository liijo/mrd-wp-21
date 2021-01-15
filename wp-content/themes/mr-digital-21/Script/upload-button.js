jQuery(function(jQuery) {
	
	jQuery(document).ready(function(){
			if(jQuery('#show_wpnbr_slider_0').attr('checked')){
					jQuery('.slider_box_wrapp').hide();
			 }
			 
			jQuery('#show_wpnbr_slider_1').click(function(){
						if(jQuery(this).attr('checked')){
								jQuery('.slider_box_wrapp').show();
			 			 } 					   
				   });
			jQuery('#show_wpnbr_slider_0').click(function(){
						if(jQuery(this).attr('checked')){
								jQuery('.slider_box_wrapp').hide();
			 			 }					   
				   });
		   });
	
	jQuery(document).on('DOMNodeInserted', '#TB_iframeContent', function(){
		var postID = jQuery('#post #post_ID').val();
		jQuery(this).attr('src', 'media-upload.php?type=image&post_id=' + postID + '&wpz_slides=true');
	});

	jQuery('.wpnbr_slide_upload_image_button').click(function() {
		formfield = jQuery(this).siblings('.wpnbr_slide_upload_image');
		preview = jQuery(this).siblings('.wpnbr_slide_preview_image');
		 var send_attachment_bkp = wp.media.editor.send.attachment;
            wp.media.editor.send.attachment = function(props, attachment){
			imgurl = attachment.url;
			//classes = jQuery('img', html).attr('class');
			//id = classes.replace(/(.*?)wp-image-/, '');
			formfield.val(attachment.id);
			preview.attr('src', imgurl);
            }
            wp.media.editor.open(jQuery(this));
		return false;
	});

	jQuery('.wpnbr_slide_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.wpnbr_slide_default_image').text();
		jQuery(this).parent().siblings('.wpnbr_slide_upload_image').val('');
		jQuery(this).parent().siblings('.wpnbr_slide_preview_image').attr('src', defaultImage);
		return false;
	});

	jQuery('.wpnbr_slide_add').click(function() {
		field = jQuery(this).closest('div.inside').find('.wpnbr_slider li:last').clone(true);
		fieldLocation = jQuery(this).closest('div.inside').find('.wpnbr_slider li:last');
		function incrementNew(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		}
		field.attr('class', incrementNew);
		jQuery('input:not(:button)', field).val('').attr('name', incrementNew);
		jQuery('select', field).val('').attr('name', incrementNew);
		jQuery('textarea', field).val('').attr('name', incrementNew);
		var defaultImage = field.find('.wpnbr_slide_default_image').text();
		field.find('.wpnbr_slide_upload_image').val('');
		field.find('.wpnbr_slide_preview_image').attr('src', defaultImage);
		field.insertAfter(fieldLocation, jQuery(this).closest('div.inside'));
		if(jQuery('.wpnbr_slider li').length > 1) jQuery('.wpnbr_slider').removeClass('onlyone');
		return false;
	});

	jQuery('.wpnbr_slide_remove').click(function(){
		jQuery(this).parent().remove();
		if(jQuery('.wpnbr_slider li').length <= 1) jQuery('.wpnbr_slider').addClass('onlyone');
		return false;
	});

	jQuery('.wpnbr_slider').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});




// Committee Members
//////////////////////////////////////////////////////////////////////////////////////////////
	
	jQuery('.wpnbr_committee_upload_image_button').click(function() {
		formfield = jQuery(this).parents('.profile_item').find('.wpnbr_committee_upload_image');
		preview = jQuery(this).parents('.profile_item').find('.wpnbr_committee_preview_image');
		 var send_attachment_bkp = wp.media.editor.send.attachment;
            wp.media.editor.send.attachment = function(props, attachment){
			imgurl = attachment.url;
			//classes = jQuery('img', html).attr('class');
			//id = classes.replace(/(.*?)wp-image-/, '');
			formfield.val(attachment.id);
			preview.attr('src', imgurl);
             
            }
            wp.media.editor.open(jQuery(this));
		return false;
	});

	jQuery('.wpnbr_committee_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.wpnbr_committee_default_image').text();
		jQuery(this).parent().siblings('.wpnbr_committee_upload_image').val('');
		jQuery(this).parent().siblings('.wpnbr_committee_preview_image').attr('src', defaultImage);
		return false;
	});

	jQuery('.wpnbr_committee_add').click(function() {
		field = jQuery(this).closest('div.inside').find('.wpnbr_committee_details li.profile_item:last').clone(true);
		fieldLocation = jQuery(this).closest('div.inside').find('.wpnbr_committee_details li.profile_item:last');
		function incrementNew(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		}
		field.attr('class', incrementNew);
		jQuery('input:not(:button)', field).val('').attr('name', incrementNew);
		jQuery('textarea', field).val('').attr('name', incrementNew);
		jQuery('.privile-data-value', field).html('');
		var defaultImage = field.find('.wpnbr_committee_default_image').text();
		field.find('.wpnbr_committee_upload_image').val('');
		field.find('.wpnbr_committee_preview_image').attr('src', defaultImage);
		field.insertAfter(fieldLocation, jQuery(this).closest('div.inside'));
		if(jQuery('.wpnbr_committee_details li.profile_item').length > 1) jQuery('.wpnbr_committee_details').removeClass('onlyone');
		return false;
	});

	jQuery('.wpnbr_committee_remove').click(function(){
		jQuery(this).parents('li').remove();
		if(jQuery('.wpnbr_committee_details li.profile_item').length <= 1) jQuery('.wpnbr_committee_details').addClass('onlyone');
		return false;
	});

	jQuery('.wpnbr_committee_details').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
	
	///Member Profiles
	
	jQuery('.privile-data-value').click(function(){
			jQuery(this).parents('.profile_selector').find('.profile_list').fadeToggle();											 
		});
	jQuery('.profile_list ul li').click(function(){
			var dataValue = jQuery(this).attr('data-value');
			var dtaText = jQuery(this).html();
			jQuery(this).parents('.profile_selector').find('.privile-data-value').html(dtaText);
			jQuery(this).parents('.profile_selector').find('input.profile_id').val(dataValue);
			jQuery(this).parents('.profile_selector').find('input.profile_name').val(dtaText);
			jQuery(this).parents('.profile_list').fadeOut();
		});
	///////////////////
	//////////////
	jQuery('.wpzoom_slide_upload_image_button').click(function() {
		formfield = jQuery(this).siblings('.wpzoom_slide_upload_image');
		preview = jQuery(this).siblings('.wpzoom_slide_preview_image');
		 var send_attachment_bkp = wp.media.editor.send.attachment;
            wp.media.editor.send.attachment = function(props, attachment){
			imgurl = attachment.url;
			//classes = jQuery('img', html).attr('class');
			//id = classes.replace(/(.*?)wp-image-/, '');
			formfield.val(attachment.id);
			preview.attr('src', imgurl);
             
            }
            wp.media.editor.open(jQuery(this));
		return false;
		
		
		
	});

	jQuery('.wpzoom_slide_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.wpzoom_slide_default_image').text();
		jQuery(this).parent().siblings('.wpzoom_slide_upload_image').val('');
		jQuery(this).parent().siblings('.wpzoom_slide_preview_image').attr('src', defaultImage);
		return false;
	});

	jQuery('.wpzoom_slide_add').click(function() {
		field = jQuery(this).parents('div.slide_parent').find('.wpzoom_slider li:last').clone(true);
		fieldLocation = jQuery(this).parents('div.slide_parent').find('.wpzoom_slider li:last');
		function incrementNew(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		}
		field.attr('class', incrementNew);
		jQuery('input:not(:button)', field).val('').attr('name', incrementNew);
		var defaultImage = field.find('.wpzoom_slide_default_image').text();
		field.find('.wpzoom_slide_upload_image').val('');
		field.find('.wpzoom_slide_preview_image').attr('src', defaultImage);
		field.insertAfter(fieldLocation, jQuery(this).parents('div.slide_parent'));
		if(jQuery('.wpzoom_slider li').length > 1) jQuery('.wpzoom_slider').removeClass('onlyone');
		return false;
	});

	jQuery('.wpzoom_slide_remove').click(function(){
		jQuery(this).parent().remove();
		if(jQuery('.wpzoom_slider li').length <= 1) jQuery('.wpzoom_slider').addClass('onlyone');
		return false;
	});

	jQuery('.wpzoom_slider').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});