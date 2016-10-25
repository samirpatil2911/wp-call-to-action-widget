jQuery(document).ajaxSuccess(function(e, xhr, settings) {
	jQuery('.button-primary').click(function(){
		var id = this.id;
		if(id.indexOf('wp-call-to-action-widget')>=0)
			{
				var clickedForm = jQuery('#'+id).closest("form");
				if(jQuery(clickedForm).find('.button-text').val()=="")
				{
					jQuery(clickedForm).find('.buttontext_required').show();
					return false;
				}
				
			}
	})
});

