/**
 * Tag quickaedit for custom field
 */

(function($) {

	// we create a copy of the WP inline edit tag function
	var $miczit_wp_inline_edit = inlineEditTax.edit;

	// and then we overwrite the function with our own code
	inlineEditTax.edit = function( id ) {

		// "call" the original WP edit function
		// we don't want to leave WordPress hanging
		$miczit_wp_inline_edit.apply( inlineEditTax, arguments );

		// now we take care of our business

		// Makes sure we can pass an HTMLElement as the ID.
		if ( typeof(id) === 'object' ) {
			id = inlineEditTax.getId(id);
		}

		var editRow = $('#edit-'+id);
		var rowData = $('#tag-'+id);

		var miczit_eng_str = rowData.children("td[class*='miczit_english']").text();
		editRow.find("input[name='English']").val(miczit_eng_str);
	};
})(jQuery);