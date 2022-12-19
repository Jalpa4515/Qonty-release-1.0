<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Farmart
 */

?>

<?php do_action( 'farmart_before_site_content_close' );?>
</div><!-- #content -->
<?php do_action( 'farmart_before_footer' ) ?>
<footer id="colophon" class="site-footer">
	<?php do_action( 'farmart_footer' ) ?>
</footer><!-- #colophon -->
<?php do_action( 'farmart_after_footer' ) ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri();?>/js/master.js"></script>
<script>
jQuery(document).ready(function () {   
            jQuery('#billing_phone,#billing_postcode,#shipping_postcode,#input_1_4').keypress(function (e) {    
                var charCode = (e.which) ? e.which : event.keyCode    
                if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                    return false;                         
            });     
    
        });
	
	// 	Contact form phone validation
	 jQuery('#input_1_4').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 9) {
            return false;
        }
        
            
    });
		
	// Contact form email validation	
	 jQuery('#input_1_3,#reg_username').keypress(function() {
        var el = jQuery(this);
        if (el.val().length > 50) {
            return false;
        }
        
            
    });

	
	//billing state and city auto update
	jQuery("#billing_postcode").keyup(function() {
        var el = jQuery(this);
        
        if (el.val().length === 6) {
           
            jQuery.ajax({
                url: "https://api.postalpincode.in/pincode/"+ el.val(),
                cache: false,
                dataType: "json",
                type: "GET",
                success: function(result, success) {
                     //console.log(result[0].PostOffice[0]);
                     jQuery("#billing_city").val(result[0].PostOffice[0].District);
                   // jQuery("#billing_address_1").val(result[0].PostOffice[0].Circle);
                   var c_state = result[0].PostOffice[0].Circle;
                   jQuery("#select2-billing_state-container").attr('title', c_state);
                   jQuery("#select2-billing_state-container").text(c_state);
                    //jQuery("#billing_state").val(result[0].PostOffice[0].Circle);
                    jQuery("#billing_state option").each(function() {
                      if(jQuery(this).text() == c_state) {
                        jQuery(this).attr('selected', 'selected');            
                      }                        
                    });
                    jQuery(document.body).trigger("update_checkout");
                }
            });
        }
    });
	
		//shipping state and city auto update
	jQuery("#shipping_postcode").keyup(function() {
        var el = jQuery(this);
        
        if (el.val().length === 6) {
           
            jQuery.ajax({
                url: "https://api.postalpincode.in/pincode/"+ el.val(),
                cache: false,
                dataType: "json",
                type: "GET",
                success: function(result, success) {
                     //console.log(result[0].PostOffice[0]);
                     jQuery("#shipping_city").val(result[0].PostOffice[0].District);
                  // jQuery("#shipping_address_1").val(result[0].PostOffice[0].Circle);
                  var c_state = result[0].PostOffice[0].Circle;
                  jQuery("#select2-shipping_state-container").attr('title', c_state);
                  jQuery("#select2-shipping_state-container").text(c_state);
                    //jQuery("#shipping_state").val(result[0].PostOffice[0].Circle);
                    jQuery("#shipping_state option").each(function() {
                      if(jQuery(this).text() == c_state) {
                        jQuery(this).attr('selected', 'selected');            
                      }                        
                    });
                    jQuery(document.body).trigger("update_checkout");
                }
            });
        }
 });
	</script>



</body>
</html>

