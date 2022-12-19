=== Cashfree for WooCommerce ===
Contributors: devcashfree
Requires at least: 4.4
Tested up to: 6.0
Requires PHP: 5.6
Stable tag: 4.3.7
Version: 4.3.7
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Tags: wordpress,woocommerce,payment,gateway,cashfree

Official Cashfree Payment Gateway plugin for WooCommerce.

== Description ==

This is the official Cashfree Payment Gateway plugin for WooCommerce. By integrating this plugin with your WooCommerce store you can accept payments via 100+ domestic as well as international payment modes and use advanced features such as instant refunds for online and COD orders, pre-authorization for card payments, instant settlements, and more.

For more information about Cashfree Payments please visit [cashfree.com](https://cashfree.com).

== Installation ==

Please note, this payment gateway requires WooCommerce 3.0 and above.

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of the WooCommerce Cashfree plugin, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type "Cashfree" and click Search Plugins. Once you’ve found our plugin you can install it by simply clicking "Install Now", then "Activate".

= Manual installation =

The manual installation method involves downloading our plugin and uploading it to your web server via your favorite FTP application. The WordPress codex contains [instructions on how to do this here](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation).

== Dependencies ==

1. Wordpress v3.9.2 and later
2. Woocommerce v2.6 and later
3. PHP v5.6.0 and later
4. php-curl extension

== Configuration ==

1. Visit the WooCommerce settings page, and click on the Checkout/Payment Gateways tab.
2. Click on Cashfree to edit the settings. If you do not see Cashfree in the list at the top of the screen make sure you have activated the plugin in the WordPress Plugin Manager.
3. Enable the Payment Method, add in your App Id and Secret Key.
4. Enable Cashfree sanbox if you want to use test mode.

== Changelog ==

= 4.3.7 =
* Update plugin description and add support link.

= 4.3.6 =
* Bugfix for hdfc pay later response while failure
* Add customer name for payment detail for merchant dashboard

= 4.3.5 =
* Bugfix for webhook failed

= 4.3.4 =
* Bugfix for order capture redirection
* Change cashfree default logo size

= 4.3.3 =
* Add description of gateway on checkout page
* Add transaction detail on order notes

= 4.3.2 =
* Tested upto wc 6.0.0
* Bugfix for storing data to cashfree api's

= 4.3.1 =
* Tested upto wc 5.9.3
* Add in context configuration to accept with and without redirecting page.
* Add magic checkout.

= 4.3.0 =
* Tested upto wc 5.9.2
* Accept order without redirecting customer to another page.

= 4.2.2 =
* Tested upto wc 5.3.0
* Bug fix for order update if order paid after checkout time.
* Added refund features in plugin.

= 4.2.1 =
* Updated WooCommerce version
* Tested upto wc 5.0.0
* Bug fixes for duplicate order and redirection issue.

= 1.3 =
* Updated WooCommerce version
* Updated changelog order and readme

= 1.2 = 
* Updated release on Plugins marketplace
* Improved error messaging

= 1.0 =
* First release on Plugins marketplace

== Support ==

Visit [cashfree.com](https://www.cashfree.com/help/hc) for support requests.