<?php

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$plugin_version = WOO_HIDE_SHIPPING_METHODS_VERSION;
global  $whsm_fs ;
$version_label = 'Free Version';
?>
<div id="dotsstoremain">
    <div class="all-pad">
        <header class="dots-header">
            <div class="dots-plugin-details">
                <div class="dots-header-left">
                    <div class="dots-logo-main">
                        <div class="logo-image">
                            <img src="<?php 
echo  esc_url( WHSM_PLUGIN_URL . 'admin/images/hide-shipping-method-logo.png' ) ;
?>">
                        </div>
                        <div class="plugin-version">
                            <span><?php 
esc_html_e( $version_label, 'woo-hide-shipping-methods' );
?> <?php 
echo  esc_html( $plugin_version ) ;
?></span>
                        </div>
                    </div>
                    <div class="plugin-name">
                        <div class="title"><?php 
esc_html_e( 'Hide Shipping Method For WooCommerce', 'woo-hide-shipping-methods' );
?></div>
                        <div class="desc"><?php 
esc_html_e( 'Make free shipping or local pickups work properly for your store by hiding all or a few shipping methods from the cart/checkout page.', 'woo-hide-shipping-methods' );
?></div>
                    </div>
                </div>
                <div class="dots-header-right">
                    

                    <div class="button-group">
                        <div class="button-dots">
                            <span class="support_dotstore_image">
                                <a target="_blank" href="<?php 
echo  esc_url( 'http://www.thedotstore.com/support/' ) ;
?>">
                                    <span class="dashicons dashicons-sos"></span>
                                    <strong><?php 
esc_html_e( 'Quick Support', 'woo-hide-shipping-methods' );
?></strong>
                                </a>
                            </span>
                        </div>

                        <div class="button-dots">
                            <span class="support_dotstore_image">
                                <a target="_blank" href="<?php 
echo  esc_url( 'https://docs.thedotstore.com/category/180-premium-plugin-settings' ) ;
?>">
                                    <span class="dashicons dashicons-media-text"></span>
                                    <strong><?php 
esc_html_e( 'Documentation', 'woo-hide-shipping-methods' );
?></strong>
                                </a>
                            </span>
                        </div>
                        <?php 
?>
                            <div class="button-dots">
                                <span class="support_dotstore_image">
                                    <a target="_blank" href="<?php 
echo  esc_url( $whsm_fs->get_upgrade_url() ) ;
?>">
                                        <span class="dashicons dashicons-upload"></span>
                                        <strong><?php 
esc_html_e( 'Upgrade To Pro', 'woo-hide-shipping-methods' );
?></strong>
                                    </a>
                                </span>
                            </div>
                        <?php 
?>
                    </div>
                </div>
            </div>
            <?php 
$current_page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );
$current_tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
$hide_shipping_option = get_option( 'hide_shipping_option' );
$whsm_settings_page = ( isset( $current_tab ) && 'general_setting' === $current_tab ? 'active' : '' );
$whsm_getting_started = ( isset( $current_tab ) && 'get_started' === $current_tab ? 'active' : '' );
$whsm_information = ( isset( $current_tab ) && 'quick_info' === $current_tab ? 'active' : '' );
$whsm_woo_hide_shipping = ( isset( $current_tab ) && 'woo_hide_shipping' === $current_tab ? 'active' : '' );
if ( whsm_fs()->is__premium_only() && whsm_fs()->can_use_premium_code() ) {
    $whsm_import_export = ( isset( $current_tab ) && 'whsm_import_export' === $current_tab ? 'active' : '' );
}

if ( isset( $current_tab ) && 'quick_info' === $current_tab || isset( $current_tab ) && 'get_started' === $current_tab ) {
    $fee_about = 'active';
} else {
    $fee_about = '';
}

?>
            <div class="dots-menu-main">
                <nav>
                    <ul>
                        <?php 

if ( isset( $current_page ) && 'whsm-start-page' === $current_page && empty($current_tab) ) {
    ?>
                            <li>
                                <a class="dotstore_plugin active" href="<?php 
    echo  esc_url( add_query_arg( array(
        'page' => 'whsm-start-page&tab=general_setting',
    ), admin_url( 'admin.php' ) ) ) ;
    ?>"><?php 
    esc_html_e( 'General Settings', 'woo-hide-shipping-methods' );
    ?></a>
                            </li>
                            <?php 
} else {
    ?>
                            <li>
                                <a class="dotstore_plugin <?php 
    echo  esc_attr( $whsm_settings_page ) ;
    ?>" href="<?php 
    echo  esc_url( add_query_arg( array(
        'page' => 'whsm-start-page&tab=general_setting',
    ), admin_url( 'admin.php' ) ) ) ;
    ?>"><?php 
    esc_html_e( 'General Settings', 'woo-hide-shipping-methods' );
    ?></a>
                            </li>
                            <?php 
}


if ( isset( $hide_shipping_option ) && 'advance_hide_shipping' === $hide_shipping_option ) {
    ?>
                            <li>
                                <a class="dotstore_plugin <?php 
    echo  esc_attr( $whsm_woo_hide_shipping ) ;
    ?>" href="<?php 
    echo  esc_url( add_query_arg( array(
        'page' => 'whsm-start-page&tab=woo_hide_shipping',
    ), admin_url( 'admin.php' ) ) ) ;
    ?>"><?php 
    esc_html_e( 'Manage Conditional Hide Shipping Rules', 'woo-hide-shipping-methods' );
    ?></a>
                            </li>
                            <?php 
}

?>
                        <?php 

if ( whsm_fs()->is__premium_only() && whsm_fs()->can_use_premium_code() ) {
    ?>
                        <li>
                            <a class="dotstore_plugin <?php 
    echo  esc_attr( $whsm_import_export ) ;
    ?>" href="<?php 
    echo  esc_url( add_query_arg( array(
        'page' => 'whsm-start-page&tab=whsm_import_export',
    ), admin_url( 'admin.php' ) ) ) ;
    ?>"><?php 
    esc_html_e( 'Import / Export', 'woo-hide-shipping-methods' );
    ?></a>
                        </li>
                        <?php 
}

?>
                        <li>
                            <a class="dotstore_plugin <?php 
echo  esc_attr( $fee_about ) ;
?>" href="<?php 
echo  esc_url( add_query_arg( array(
    'page' => 'whsm-start-page&tab=get_started',
), admin_url( 'admin.php' ) ) ) ;
?>"><?php 
esc_html_e( 'About Plugin', 'woo-hide-shipping-methods' );
?></a>
                            <ul class="sub-menu">
                                <li><a class="dotstore_plugin <?php 
echo  esc_attr( $whsm_getting_started ) ;
?>" href="<?php 
echo  esc_url( add_query_arg( array(
    'page' => 'whsm-start-page&tab=get_started',
), admin_url( 'admin.php' ) ) ) ;
?>"><?php 
esc_html_e( 'Getting Started', 'woo-hide-shipping-methods' );
?></a></li>
                                <li><a class="dotstore_plugin <?php 
echo  esc_attr( $whsm_information ) ;
?>" href="<?php 
echo  esc_url( add_query_arg( array(
    'page' => 'whsm-start-page&tab=quick_info',
), admin_url( 'admin.php' ) ) ) ;
?>"><?php 
esc_html_e( 'Quick info', 'woo-hide-shipping-methods' );
?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dotstore_plugin"><?php 
esc_html_e( 'Dotstore', 'woo-hide-shipping-methods' );
?></a>
                            <ul class="sub-menu">
                                <li><a target="_blank" href="<?php 
echo  esc_url( 'www.thedotstore.com/woocommerce-plugins' ) ;
?>"><?php 
esc_html_e( 'WooCommerce Plugins', 'woo-hide-shipping-methods' );
?></a></li>
                                <li><a target="_blank" href="<?php 
echo  esc_url( 'www.thedotstore.com/wordpress-plugins' ) ;
?>"><?php 
esc_html_e( 'Wordpress Plugins', 'woo-hide-shipping-methods' );
?></a></li>
                                <li><a target="_blank" href="<?php 
echo  esc_url( 'www.thedotstore.com/support' ) ;
?>"><?php 
esc_html_e( 'Contact Support', 'woo-hide-shipping-methods' );
?></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="dots-settings-inner-main">
            <div class="dots-settings-left-side">