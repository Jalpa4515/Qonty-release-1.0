<?php 
/**
Plugin Name: Tax Report for WooCommerce 
Plugin URI: https://plugins.infosofttech.com/products/woocommerce-tax-report/
Description: Tax Report for WooCommerce Plugin shows Tax summaries and Shipping Tax Summaries, Tax detail report shows each Order wise tax details.
Version: 2.1
Author: Infosoft Consultants
Author URI: http://plugins.infosofttech.com
Plugin URI: https://wordpress.org/plugins/woocommerce-mis-report/
License: A  "Slug" license name e.g. GPL2

Tested up to: 6.0.0
Tested Wordpress Version: 6.0.x
WC requires at least: 3.5
WC tested up to: 6.5.x
Requires at least: 5.7
Requires PHP: 5.6

Text Domain: icwoocommercetax
Domain Path: /languages/

*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( ! class_exists( 'IC_WooCommerce_Tax_Report' ) ) { 
	class IC_WooCommerce_Tax_Report{
		function __construct() {
			include_once("include/ic-woocommerce-tax-report-init.php");
			$obj_init = new IC_WooCommerce_Tax_Report_Init();
		}
	}
	$obj = new  IC_WooCommerce_Tax_Report();
}
?>