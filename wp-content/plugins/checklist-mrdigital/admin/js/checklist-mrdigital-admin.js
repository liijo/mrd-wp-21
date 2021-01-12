(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


})( jQuery );

jQuery(document).ready(function(){
	//jQuery(".chosen").chosen();


	jQuery('.mrdcheck_slide_add').click(function() {
		jQuery(this).closest('div.inside').find('.mrdcheck_slider > li:first').find('.chosen-search-input').attr('name','chose-search-1');
		field = jQuery(this).closest('div.inside').find('.mrdcheck_slider > li:last').clone(true);
		fieldLocation = jQuery(this).closest('div.inside').find('.mrdcheck_slider > li:last');
		function incrementNew(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		}
		field.attr('class', incrementNew);
		jQuery('input:not(:button)', field).val('').attr('name', incrementNew);
		jQuery('select', field).val('').attr('name', incrementNew);
		jQuery('textarea', field).val('').attr('name', incrementNew);
		var defaultImage = field.find('.mrdcheck_slide_default_image').text();
		field.find('.mrdcheck_slide_upload_image').val('');
		field.find('.mrdcheck_slide_preview_image').attr('src', defaultImage);
		field.insertAfter(fieldLocation, jQuery(this).closest('div.inside'));
		if(jQuery('.mrdcheck_slider > li').length > 1) jQuery('.mrdcheck_slider').removeClass('onlyone');
		return false;
	});

	jQuery('.mrdcheck_slide_remove').click(function(){
		jQuery(this).parent().remove();
		if(jQuery('.mrdcheck_slider > li').length <= 1) jQuery('.mrdcheck_slider').addClass('onlyone');
		return false;
	});
	if(jQuery('.mrd_checklist_repeater').length){

	jQuery('.mrd_checklist_repeater').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
}
})
