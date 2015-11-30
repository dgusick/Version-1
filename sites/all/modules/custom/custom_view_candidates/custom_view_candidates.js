(function ($) {

  Drupal.behaviors.candidates = {
    attach: function (context, settings) {

    	$('#edit-field-user-id').hide();
		$('#evaluation-node-form .field-name-field-skill-rating .form-type-select').hide();
	    $('.checkvote').change(function(){
	       
	        if($(this).attr("checked")) {
	            $(this).next().find('.form-type-select').show();
	            $(this).next().find('.form-type-select').css({
	                display: 'inline-block',
	                margin: '0 10px'
	            });
	        }
	        else {
	            $(this).next().find('.form-type-select').hide();
	        }
	    });
	    
	    $('#evaluation-node-form .field-name-field-skill-rating .field-type-fivestar').css({
	        display: 'inline-block',
	        margin: '10px 20px 10px 0',
	        width: '300px'
	    });
	     $('#evaluation-node-form .field-name-field-skill-rating .field-type-fivestar').css({
	        display: 'inline-block',
	        margin: '10px 20px 10px 0',
	        width: '300px',
	    });
	    
	    $('#evaluation-node-form .field-name-field-skill-rating .field-type-fivestar').css('vertical-align','top');
	    
	    $('.toolbar.toolbar-drawer .checkvote').css('vertical-align','top');
	    $('.toolbar.toolbar-drawer .checkvote').css('margin-top','11px');
	    
	    $('#evaluation-node-form .field-name-field-skill-rating fieldset').css('margin','20px 0 0');
	    $('#evaluation-node-form .field-name-field-skill-rating fieldset legend').css('font-weight','bold');
	    $('.checkvote').css('display','inline-block');
	    $('#evaluation-node-form .field-name-field-skill-rating .fivestar-form-item').css('display','inline-block');
	    
	    $('#evaluation-node-form .field-name-field-skill-rating label').css('display','inline-block');
	    $('#evaluation-node-form .field-name-field-skill-rating label').css('font-weight','bold');
	    $('.toolbar.toolbar-drawer #evaluation-node-form .field-name-field-skill-rating label').css('vertical-align','top');
	    $('.toolbar.toolbar-drawer #evaluation-node-form .field-name-field-skill-rating .form-type-select').css('padding','0');
	    $('.evaluation-name').css('font-weight','bold');
	    $('.evaluation-name').css('font-weight','bold');
	    $('#evaluation-node-form .field-name-field-skill-rating label').css('margin-left','5px');
	    $('#evaluation-node-form  #edit-preview').hide();
	    
	    $('#evaluation-node-form #edit-submit').val('Create New Evaluation');
	 
	    $('.submit-candidates').click(function(){
	        var skill = $('#list-skills').val();
	        var feedback = $('#feedback').val();
	        var rating = $('#list-rating').val();
	        $('#group-result-search table').remove();
	        $.ajax({
    		    url: Drupal.settings.candidates_list.ajaxUrl,
    			method: "GET",
    			data:   {
    				'skill': skill,
    				'feedback': feedback,
    				'rating': rating
    			},
    			dataType: "html",
    			beforeSend: function() {
                    jQuery('#group-result-search').after('<div class="loadgiftran" style="text-align:center;margin-top:50px;"><img style="width:10%;" src="sites/all/themes/citilights/images/ajax_loader.gif"/></div>');
                },
    			success: function(data, textStatus, jqXHR){
    				$('.loadgiftran').remove();
    				$('#group-result-search').html(data);
    			}
    		});
    		return false;
	    });
    }
  };
  
}(jQuery));