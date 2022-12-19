jQuery(document).ready(function(){

// 	jQuery('input[name="register"]').submit(function(e){
		
// // 		one field
// 		if(jQuery('input[name="digits_reg_lastname"]').val()==''){
// 			jQuery('input[name="digits_reg_lastname"]').addClass('has-error'); 
// 			jQuery('input[name="digits_reg_lastname"]').parent().find('.error').remove();
// 			jQuery('input[name="digits_reg_lastname"]').parent().append('<div class="error">Field is required</div>');
// 			e.preventDefault();
// 		}else if(jQuery('input[name="digits_reg_lastname"]').val().length > 50){
// 			jQuery('input[name="digits_reg_lastname"]').addClass('has-error'); 
// 			jQuery('input[name="digits_reg_lastname"]').parent().find('.error').remove();
// 			jQuery('input[name="digits_reg_lastname"]').parent().append('<div class="error">Field length should be less than 50</div>');
// 			e.preventDefault();
// 		}else{
// 			jQuery('input[name="digits_reg_lastname"]').removeClass('has-error'); 
// 			jQuery('input[name="digits_reg_lastname"]').parent();
// 			jQuery('input[name="digits_reg_lastname"]').parent().find('.error').remove();
// 		}
		
		
		
		
		
		
		
// 	});
	
	
// 	//one field 50 
// 	jQuery('input[name="digits_reg_lastname"],#billing_first_name').on("input", function() {
        
//     	if(jQuery(this).val()==''){
// 			jQuery(this).addClass('has-error');
// 			jQuery(this).parent().find('.error').remove();
// 			jQuery(this).parent().append('<div class="error">Field is required</div>');
// 		}
// 		else if(jQuery(this).val().length > 50){
// 		    			jQuery(this).addClass('has-error');
// 			jQuery(this).parent().find('.error').remove();
// 			jQuery(this).parent().append('<div class="error">Field length should be less than 50</div>');
// 		}else{
// 		    jQuery(this).removeClass('has-error');
// 			jQuery(this).parent().find('.error').remove();

// 		}
    
    
//     });

// //one field 10.
// 	jQuery('#reg_email').on("input", function(e) {
        
//         if(jQuery(this).val().length > 10){
//             e.preventDefault();
// 		    return;
// 		}
//     	if(jQuery(this).val()==''){
// 			jQuery(this).addClass('has-error');
// 			jQuery(this).parent().find('.error').remove();
// 			jQuery(this).parent().append('<div class="error">Field is required</div>');
// 		}
		
// 		else if(jQuery(this).val().length > 10){
		    
// 		    jQuery(this).addClass('has-error');
// 			jQuery(this).parent().find('.error').remove();
// 			jQuery(this).parent().append('<div class="error">Field length should be equal to 10</div>');
// 		}else{
// 		    			jQuery(this).removeClass('has-error');
// 			jQuery(this).parent().find('.error').remove();

// 		}
//     });
	

//10 digit
    jQuery('#input_1_4,#billing_phone').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 9) {
            return false;
        }
        
            
    });

//50 digit
    jQuery('input[name="digits_reg_lastname"],#billing_first_name,#secondmailormobile,#billing_last_name,#billing_company,#billing_city,#billing_email,#account_first_name,#account_last_name,#account_display_name,#account_email,#shipping_first_name,#shipping_last_name,#shipping_company,#shipping_city,#reg_username,#reg_email,#username,#input_1_3').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 50) {
            return false;
        }
        
            
    });
	//250 digit
jQuery('#billing_address_1,#billing_address_2,#shipping_address_1,#shipping_address_2').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 250) {
            return false;
        }
        
            
    });
	
	//6 digit
jQuery('#billing_postcode,#shipping_postcode').keypress(function() {
        var el = jQuery(this);
        if (el.val().length >5) {
            return false;
        }
        
            
    });
	
	
});



jQuery(document).ready(function(){

    jQuery('#input_1_4,#billing_phone').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 9) {
            return false;
        }
        
            
    });

//50 digit
    jQuery('input[name="digits_reg_lastname"],#billing_first_name,#secondmailormobile,#billing_last_name,#billing_company,#billing_city,#billing_email,#account_first_name,#account_last_name,#account_display_name,#account_email,#shipping_first_name,#shipping_last_name,#shipping_company,#shipping_city,#reg_username,#reg_email,#username,#input_1_3').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 50) {
            return false;
        }
        
            
    });
	//250 digit
jQuery('#billing_address_1,#billing_address_2,#shipping_address_1,#shipping_address_2').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 250) {
            return false;
        }
        
            
    });
	
	//6 digit
jQuery('#billing_postcode,#shipping_postcode').keypress(function() {
        var el = jQuery(this);
        if (el.val().length >5) {
            return false;
        }
        
            
    });
	
	
})


