<?php

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
wp_nonce_field( 'whsm_save_general_setting_action', 'whsm_save_general_setting' );
$hide_shipping_option = get_option( 'hide_shipping_option' );
$chk_enable_logging = get_option( 'chk_enable_logging' );
$whsm_hide_shipping_cart = get_option( 'whsm_hide_shipping_cart' );
$hide_shipping_method_list = get_option( 'hide_shipping_method_list' );
$chk_enable_logging_checked = ( !empty($chk_enable_logging) && 'on' === $chk_enable_logging || empty($chk_enable_logging) ? 'checked' : '' );
$whsm_hide_shipping_cart_checked = ( !empty($whsm_hide_shipping_cart) && 'on' === $whsm_hide_shipping_cart ? 'checked' : '' );
$whsm_admin_object = new Woo_Hide_Shipping_Methods_Admin( '', '' );
require_once plugin_dir_path( __FILE__ ) . 'header/plugin-header.php';
?>
<div class="whsm-section-left">
	<table class="table-mastersettings table-outer form-table" cellpadding="0" cellspacing="0">
		<tbody>
		<tr valign="top" id="combine_default_shipping_with_forceall_td">
			<th scope="row">
				<label for="table-whattodo">
					<?php 
esc_html_e( 'When "Free Shipping" is available during Checkout', 'woo-hide-shipping-methods' );
?>
				</label>
			</th>
			<td>
				<label>
					<input type="radio" name="hide_shipping_option" id="hide_shipping"
					       value="free_shipping_available" <?php 
checked( $hide_shipping_option, 'free_shipping_available' );
?>/>
					<span
						class="date-time-text format-i18n"><?php 
esc_html_e( 'Hide all other shipping method and when "Free Shipping" available on the cart page', 'woo-hide-shipping-methods' );
?></span>
				</label>
				<br>
				<label>
					<input type="radio" name="hide_shipping_option" id="hide_shipping"
					       value="free_local_available" <?php 
checked( $hide_shipping_option, 'free_local_available' );
?>/>
					<span
						class="date-time-text format-i18n"><?php 
esc_html_e( 'Hide all other shipping method and when "Free Shipping" or "Local Pickup" available on the cart page', 'woo-hide-shipping-methods' );
?></span>
				</label>
				<br>
				<?php 
?>
						<label class="whsm-pro-feature">
							<input type="radio" name="hide_shipping_option" id="hide_shipping"
							       value="other_shipping_hide" disabled="disabled"/>
							<span
								class="date-time-text format-i18n"><?php 
esc_html_e( 'Hide specific shipping method when "Free Shipping" available on the cart page - ', 'woo-hide-shipping-methods' );
?><span class="in-pro"><?php 
esc_html_e( 'Available in pro', 'woo-hide-shipping-methods' );
?></span></span>
						</label>
						<br>
						<?php 
?>
				<label>
					<input type="radio" name="hide_shipping_option" id="hide_shipping"
					       value="advance_hide_shipping" <?php 
checked( $hide_shipping_option, 'advance_hide_shipping' );
?>/>
					<span
						class="date-time-text format-i18n"><?php 
esc_html_e( 'Conditional Hide shipping method Rules', 'woo-hide-shipping-methods' );
?></span>
				</label>
				<p class="description">
					<?php 
$html = sprintf( '%s<br>%s', esc_html__( 'With this option, you can create conditional hide shipping method rules as your business needs', 'woo-hide-shipping-methods' ), esc_html__( 'After settings saved, new manu will display - Manage Conditional Hide Shipping Rules', 'woo-hide-shipping-methods' ) );
echo  wp_kses_post( $html ) ;
?>
				</p>
			</td>
		</tr>
		<?php 
?>
		<tr valign="top" id="enable_logging">
			<th scope="row">
				<label for="table-whattodo">
					<?php 
esc_html_e( 'Enable Logging', 'woo-hide-shipping-methods' );
?>
				</label>
			</th>
			<td>
				<input type="checkbox" name="chk_enable_logging" id="chk_enable_logging"
				       value="on" <?php 
echo  esc_attr( $chk_enable_logging_checked ) ;
?>>
			</td>
		</tr>
		<tr valign="top" id="hide_shipping_cart">
			<th scope="row">
				<label for="whsm_hide_shipping_cart">
					<?php 
esc_html_e( 'Want to hide all shipping methods from cart page?', 'woo-hide-shipping-methods' );
?>
				</label>
			</th>
			<td>
				<input type="checkbox" name="whsm_hide_shipping_cart" id="whsm_hide_shipping_cart"
				       value="off" <?php 
echo  esc_attr( $whsm_hide_shipping_cart_checked ) ;
?>>
			</td>
		</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" class="button button-primary" name="save_general_setting"
		       value="<?php 
esc_attr_e( 'Save Settings', 'woo-hide-shipping-methods' );
?>">
	</p>
</div>
<?php 
require_once plugin_dir_path( __FILE__ ) . 'header/plugin-sidebar.php';