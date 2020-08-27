jQuery(document).ready(function(){
	/*jQuery("#representation-form").submit(function(e){
		e.preventDefault(e);
		var search_val = jQuery('#myInput').val().toLowerCase();
		if(search_val){
		console.log(search_val);
			jQuery('.transection-box-single').hide();
			jQuery('.transection-box-single').each(function(){
					var element_cont = jQuery(this).text();
					console.log(element_cont);
					if(element_cont.toLowerCase().indexOf(search_val) != -1){
						jQuery(this).show();
					}
			});
			jQuery('.transection-hidden-content').show();
		}
	});*/
	jQuery('body').on('click',".block-expnd",function () {
		if(jQuery(this).hasClass('close-block')) {
			jQuery(this).parent().siblings('p').children('.read-more-dot').text('...');
			jQuery(this).removeClass('close-block');
		} else {
			var elmn_content = jQuery(this).parent().siblings('.collapse').text();
			jQuery(this).parent().siblings('p').children('.read-more-dot').html(elmn_content).slideDown("slow");
			jQuery(this).addClass('close-block');
		}
	});


jQuery(document).on( 'submit', '#representation-form', function() {
    var $form = jQuery(this);
    var $input = $form.find('input[name="search"]');
    var $cat_id = $form.find('input[name="cat_id"]').val();
    var query = $input.val();
    var $content = jQuery('#content')
    
    jQuery.ajax({
        type : 'post',
        url : myAjax.ajaxurl,
        data : {
            action : 'load_transactions_block',
            query : query,
            cat_id : $cat_id
        },
        beforeSend: function() {
			$input.prop('disabled', true);
			jQuery('.transaction_loader').show();
        },
        success : function( response ) {
			$input.prop('disabled', false);
			jQuery('.experience-row').fadeOut('slow',function(){
				jQuery('.experience-row').empty().append(response).fadeIn('slow');
				jQuery('.transaction_loader').hide();
			});
		}
    });
    
    return false;
});

});