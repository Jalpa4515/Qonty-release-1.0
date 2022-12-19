<?php
/**
 * Plugin Name: WP Bottom Menu
 * Description: WP Bottom Menu allows you to add a woocommerce supported bottom menu to your site.
 * Version: 2.0.1
 * Author: J4
 * Author URI: https://hub.liquid-themes.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-bottom-menu
 * Domain Path: /languages
 * 
 * WP Bottom Menu is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * 
 * WP Bottom Menu is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'WP_BOTTOM_MENU_VERSION', '2.0.1' );
define( 'WP_BOTTOM_MENU_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_BOTTOM_MENU_DIR_PATH', plugin_dir_path( __FILE__ ) );


final class WPBottomMenu{

    /**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var WPBottomMenu The single instance of the class.
	 */
	private static $_instance = null;

    /**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return WPBottomMenu An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }

    /**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
    public function __construct() {
        $this->init();
    }

    /**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'wp-bottom-menu' );

	}

    /**
	 * Initialize the plugin
	 *
	 * Load the files required to run the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
    function init(){

        $this->i18n();
        $this->include_files();
        $this->promote_hub();

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_footer', array($this, 'wp_bottom_menu' ) );
        add_filter( 'plugin_action_links', array($this, 'wp_bottom_menu_action_links'), 10, 2 );

        add_action( 'customize_controls_enqueue_scripts', function(){

            // customizer js
            wp_enqueue_script( 'wp-bottom-menu-customize', WP_BOTTOM_MENU_DIR_URL . 'assets/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
            
            // select2
            wp_enqueue_script( 'select2', WP_BOTTOM_MENU_DIR_URL . 'assets/vendors/select2/select2.min.js', [], false, false );
            wp_enqueue_style( 'select2', WP_BOTTOM_MENU_DIR_URL . 'assets/vendors/select2/select2.min.css', array(), WP_BOTTOM_MENU_VERSION, 'all' );
            wp_add_inline_script( 'wp-bottom-menu-customize', '
                jQuery( document ).ready(function() {
                    jQuery(".wp-bottom-menu-select2").select2({
                        placeholder: "Select an option"
                      });
                });
            ');
        } );

        // Load WooCommerce Fragments
        if ( class_exists( 'WooCommerce' ) ){
            add_filter( 'woocommerce_add_to_cart_fragments', array($this, 'wp_bottom_menu_add_to_cart_fragment'), 10, 1 );
        }
    } 
    
    function include_files(){

        require_once( WP_BOTTOM_MENU_DIR_PATH . 'inc/customizer/customizer-repeater/functions.php' );
        require_once( WP_BOTTOM_MENU_DIR_PATH . 'inc/customizer/customizer.php' );
        require_once( WP_BOTTOM_MENU_DIR_PATH . 'inc/customizer/condition.php' );

    }

    function promote_hub(){

        // Hub promote notice
        if ( isset( $_GET['hub_promote'] ) && 'false' === $_GET['hub_promote'] ) {
            set_transient( 'hub_promote', [], 4 * WEEK_IN_SECONDS );
        }
        
        if ( false === get_transient( 'hub_promote' ) ){
            add_action( 'admin_notices', function() {
                if ( 'Hub' === wp_get_theme()->get( 'Name' ) || 'Hub Child' === wp_get_theme()->get( 'Name' ) ) {
                    return;
                }
                ?>
                    <div class="notice">
                        <h3 style="margin-bottom:0.5em">Looking for an ultra fast WP theme?</h3>
                        <h4 style="margin:0">WP Bottom Menu developers recommend Hub:</h4>
                        <ul style="list-style:disc;margin-left:2em">
                            <li>The Best Selling Theme of the Year</li>
                            <li>Free Support + Updates + Plugins</li>
                            <li>Elementor + WP Bakery + WP Bottom Menu Support</li>
                            <li>800+ Award-Winning Templates</li>
                            <li>And Many More!</li>
                        </ul>
                        <p style="display:flex;align-items:center;">
                            <a class="button button-primary" target="_blank" href="<?php echo esc_url( 'https://themeforest.net/item/hub-responsive-multipurpose-wordpress-theme/31569152?utm_source=wp_bottom_menu&utm_medium=banner&utm_campaign=wpbm_promote' ); ?>" >
                                Join Hub
                            </a>
                            <a style="margin-left:1em" class="button button-secondary" target="_blank" href="<?php echo esc_url( 'https://hub.liquid-themes.com/?utm_source=wp_bottom_menu&utm_medium=banner&utm_campaign=wpbm_promote' ); ?>" >
                                Learn More
                            </a>
                            <a style="margin-left:auto" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'hub_promote', 'false' ), 'false' ) ); ?>" >
                                Hide Notification
                            </a>
                        </p>
                    </div>
                <?php
            } );
        }

    }

    // enqueue scripts
    function enqueue_scripts() {

        // check the display condition
        if ( $this->display_condition() ){
          
            wp_enqueue_style( 'wp-bottom-menu', WP_BOTTOM_MENU_DIR_URL . 'assets/css/style.css', array(), WP_BOTTOM_MENU_VERSION, 'all' );
            wp_enqueue_script( 'wp-bottom-menu', WP_BOTTOM_MENU_DIR_URL . 'assets/js/main.js', array(), WP_BOTTOM_MENU_VERSION, true );
            
            if ( get_option( 'wpbottommenu_iconset', 'fontawesome' ) == 'fontawesome' ){
                wp_enqueue_style( 'font-awesome', WP_BOTTOM_MENU_DIR_URL . 'inc/customizer/customizer-repeater/css/font-awesome.min.css', array(), CUSTOMIZER_REPEATER_VERSION );
            }
            if ( get_option( 'wpbottommenu_iconset', 'fontawesome' ) == 'fontawesome2' ){
                wp_enqueue_style( 'font-awesome-wpbm', WP_BOTTOM_MENU_DIR_URL . 'assets/vendors/fontawesome/all.min.css', array(), '6.1.1' );
            }
            
        }
            
    }

    // wp bottom menu
    function wp_bottom_menu() {

        // check the display condition
        if ( !$this->display_condition() ){
            return;
        }

        ?>
        <div class="wp-bottom-menu" id="wp-bottom-menu">

        <?php
        $customizer_repeater_wpbm = get_option('customizer_repeater_wpbm', json_encode( array(
            array("choice" => "wpbm-homepage" ,"subtitle" => "fa-home", "title" => "Home", "id" => "customizer_repeater_1" ),
            array("choice" => "wpbm-woo-account" ,"subtitle" => "fa-user", "title" => "Account", "id" => "customizer_repeater_2" ),
            array("choice" => "wpbm-woo-cart" ,"subtitle" => "fa-shopping-cart", "title" => "Cart", "id" => "customizer_repeater_3" ),
            array("choice" => "wpbm-woo-search" ,"subtitle" => "fa-search", "title" => "Search", "id" => "customizer_repeater_4" ),
        ) ) );
        /*This returns a json so we have to decode it*/

        $customizer_repeater_wpbm_decoded = json_decode($customizer_repeater_wpbm);
        $wpbm_woo_search = false;
        $wpbm_post_search = false;
        $wpbm_link_target = get_option( 'wpbottommenu_target' ) ? 'target=_blank' : '';
        foreach($customizer_repeater_wpbm_decoded as $repeater_item){

            if($repeater_item->choice == "wpbm-woo-search" or $repeater_item->choice == "wpbm-post-search"):?>
                <a href="javascript:void(0);" title="<?php echo esc_attr( $repeater_item->title ); ?>" class="wp-bottom-menu-item wp-bottom-menu-search-form-trigger">
            <?php else: ?>
                <?php 
                    $wpbm_item_url = $wpbm_item_active = '';
                    switch($repeater_item->choice){
                        case "wpbm-homepage":
                            $wpbm_item_url = esc_url( home_url() );
                            if ( is_front_page() ){
                                $wpbm_item_active = 'active';
                            }
                        break;
                        case "wpbm-woo-cart":
                            if ( class_exists( 'WooCommerce' ) ) {
								$wpbm_item_url = esc_url( wc_get_page_permalink( 'cart' ) );
							} else {
								$wpbm_item_url = '#';
							}   
                        break;
                        case "wpbm-woo-account":
                            if ( class_exists( 'WooCommerce' ) ) {
								$wpbm_item_url = esc_url( wc_get_page_permalink( 'myaccount' ) );
							} else {
								$wpbm_item_url = '#';
							}  
                        break;
                        default:
                            $wpbm_item_url = esc_url( $repeater_item->link );
                    }

                    if ( url_to_postid($wpbm_item_url) === get_the_ID() ){
                        $wpbm_item_active = 'active';
                    }
                    
                ?>
                <a href="<?php echo $wpbm_item_url; ?>" class="wp-bottom-menu-item <?php echo esc_attr( $wpbm_item_active ); ?>" <?php echo esc_attr( $wpbm_link_target ); ?>>
            <?php endif; ?>
                    
                    <div class="wp-bottom-menu-icon-wrapper">
                        <?php if( get_option( 'wpbottommenu_show_cart_count', false ) ): ?>
                            <?php if ( class_exists( 'WooCommerce' ) && $repeater_item->choice == "wpbm-woo-cart" ) : ?>
                                <div class="wp-bottom-menu-cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if( get_option( 'wpbottommenu_iconset', 'fontawesome' ) == 'fontawesome' ): ?>
                            <i class="wp-bottom-menu-item-icons fa <?php echo esc_attr( $repeater_item->subtitle ); ?>"></i>
                        <?php elseif( get_option( 'wpbottommenu_iconset', 'fontawesome' ) == 'fontawesome2' ): ?>
                            <i class="wp-bottom-menu-item-icons <?php echo esc_attr( $repeater_item->subtitle ); ?>"></i>
                        <?php else: ?>
                        <?php echo html_entity_decode( $repeater_item->subtitle ); ?>
                        <?php endif; ?>
                    </div>
                    <?php if( !get_option( 'wpbottommenu_disable_title', false ) ): ?>
                        <?php if( get_option( 'wpbottommenu_show_cart_total', false ) && $repeater_item->choice == "wpbm-woo-cart" && class_exists( 'WooCommerce' ) ): ?>
                                <span class="wp-bottom-menu-cart-total"><?php WC()->cart->get_cart_total(); ?></span>
                            <?php else: ?>
                                <span><?php echo $repeater_item->title; ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                </a>
            <?php

            if ( $repeater_item->choice == "wpbm-woo-search" && !$wpbm_woo_search )
                $wpbm_woo_search = true;

            if ( $repeater_item->choice == "wpbm-post-search" && !$wpbm_post_search )
                $wpbm_post_search = true;
            
        }
        ?>
    </div>
    
    <?php if ( $wpbm_woo_search || $wpbm_post_search ): ?>
        <div class="wp-bottom-menu-search-form-wrapper" id="wp-bottom-menu-search-form-wrapper">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>" class="wp-bottom-menu-search-form">
            <i class="fa fa-search"></i>
            <input type="hidden" name="post_type" value="<?php if( $wpbm_woo_search && class_exists( 'WooCommerce' ) ) echo esc_attr("product"); else echo esc_attr("post"); ?>" />
            <input type="search" class="search-field" placeholder="<?php if( get_option( 'wpbottommenu_placeholder_text', 'Search' ) ) echo get_option( 'wpbottommenu_placeholder_text', 'Search' ); else echo esc_attr_x( 'Search', 'wp-bottom-menu' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </form>
        </div>
    <?php endif;
        
    } 

    function display_condition(){

        $condition = new \WPBottomMenu_Condition();
        return $condition->get_condition();
        
    }

    // woocommerce cart fragment
    function wp_bottom_menu_add_to_cart_fragment( $fragments ) {
        $fragments['div.wp-bottom-menu-cart-count'] = '<div class="wp-bottom-menu-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>'; 
        $fragments['span.wp-bottom-menu-cart-total'] = '<span class="wp-bottom-menu-cart-total">' . WC()->cart->get_cart_total() . '</span>';
        return $fragments;
    }

    // plugin action links
    function wp_bottom_menu_action_links( $links_array, $plugin_file_name ){
        if( strpos( $plugin_file_name, basename(__FILE__) ) ) {
            array_unshift( $links_array, '<a href="' . admin_url( 'customize.php?autofocus[panel]=wpbottommenu_panel' ) . '">Settings</a>' );
        }
        return $links_array;
    }
    
} // class
WPBottomMenu::instance();


function wp_bottom_menu_plugin_activate() { 
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'wp_bottom_menu_plugin_activate' );

function wp_bottom_menu_plugin_deactivate() {
	/* If you want all settings to be deleted when the plugin is deactive, activate this field. 

    delete_option(' customizer_repeater_wpbm' );
    delete_option( 'wpbottommenu_display_px' );
    delete_option( 'wpbottommenu_display_always' );
    delete_option( 'wpbottommenu_fontsize' );
    delete_option( 'wpbottommenu_iconsize' );
    delete_option( 'wpbottommenu_textcolor' );
    delete_option( 'wpbottommenu_htextcolor' );
    delete_option( 'wpbottommenu_iconcolor' );
    delete_option( 'wpbottommenu_hiconcolor' );
    delete_option( 'wpbottommenu_bgcolor' );
    delete_option( 'wpbottommenu_zindex' );
    delete_option( 'wpbottommenu_disable_title' );
    delete_option( 'wpbottommenu_iconset' );
    delete_option( 'wpbottommenu_placeholder_text' );
    delete_option( 'wpbottommenu_show_cart_count' );
    delete_option( 'wpbottommenu_show_cart_total' );
    delete_option( 'wpbottommenu_cart_count_bgcolor' );
    delete_option( 'wpbottommenu_hide_pages' );
    delete_option( 'wpbottommenu_wrapper_padding' );
	*/
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wp_bottom_menu_plugin_deactivate' );