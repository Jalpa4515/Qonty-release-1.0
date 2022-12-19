<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
</div>
    <div class="dots-settings-right-side">
        <div class="dots-seperator">
            <button class="toggleSidebar" title="toogle sidebar">
                <span class="dashicons dashicons-arrow-right-alt2"></span>
            </button>
        </div>
        <div class="dotstore_plugin_sidebar">
            <?php 
$review_url = '';
$plugin_at = '';
$review_url = esc_url( 'https://wordpress.org/plugins/hide-shipping-method-for-woocommerce/#reviews' );
$plugin_at = __( 'WP.org', 'woo-hide-shipping-methods' );
?>
            <?php 
?>
                <div class="dotstore-sidebar-section dotstore-upgrade-to-pro">
                    <div class="dotstore-important-link-heading">
                        <span class="heading-text"><?php 
esc_html_e( 'Upgrade to Hide Shipping Pro', 'woo-hide-shipping-methods' );
?></span>
                    </div>
                    <div class="dotstore-important-link-content">
                        <ul class="dotstore-pro-list">
                            <li><?php 
esc_html_e( 'Conditional Hide Shipping – Select Different Shipping Source', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Conditional Hide Shipping – Advance Rule', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Conditional Hide Shipping – Start Date', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Conditional Hide Shipping – End Date', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Hide specific shipping method when “Free Shipping available.', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Basic Hide Shipping Rule – Cart Subtotal (After Discount) (£)', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Basic Hide Shipping Rule – Cart contains variable product', 'woo-hide-shipping-methods' );
?></li>
                            <li><?php 
esc_html_e( 'Basic Hide Shipping Rule – Cart contains SKU’s product', 'woo-hide-shipping-methods' );
?></li>
                        </ul>
                        <div class="dotstore-pro-button">
                            <a class="button" target="_blank" href="<?php 
echo  esc_url( 'https://bit.ly/2Jmj9gc' ) ;
?>"><?php 
esc_html_e( 'Get Premium Now »', 'woo-hide-shipping-methods' );
?></a>
                        </div>
                    </div>
                </div>
            <?php 
?>
            <div class="dotstore-sidebar-section">
                <div class="content_box">
                    <h3><?php 
esc_html_e( 'Like This Plugin?', 'woo-hide-shipping-methods' );
?></h3>
                    <div class="et-star-rating">
                        <input type="radio" id="5-stars" name="rating" value="5" />
                        <label for="5-stars" class="star"></label>
                        <input type="radio" id="4-stars" name="rating" value="4" />
                        <label for="4-stars" class="star"></label>
                        <input type="radio" id="3-stars" name="rating" value="3" />
                        <label for="3-stars" class="star"></label>
                        <input type="radio" id="2-stars" name="rating" value="2" />
                        <label for="2-stars" class="star"></label>
                        <input type="radio" id="1-star" name="rating" value="1" />
                        <label for="1-star" class="star"></label>
                        <input type="hidden" id="et-review-url" value="<?php 
echo  esc_url( $review_url ) ;
?>">
                    </div>
                    <p><?php 
esc_html_e( 'Your Review is very important to us as it helps us to grow more.', 'woo-hide-shipping-methods' );
?></p>
                </div>
            </div>
            <?php 
?>
            <div class="dotstore-sidebar-section">
                <div class="dotstore-important-link-heading">
                    <span class="dashicons dashicons-image-rotate-right"></span>
                    <span class="heading-text"><?php 
esc_html_e( 'Free vs Pro Feature', 'woo-hide-shipping-methods' );
?></span>
                </div>
                <div class="dotstore-important-link-content">
                    <p><?php 
esc_html_e( 'Here’s an at a glance view of the main differences between Premium and free plugin features.', 'woo-hide-shipping-methods' );
?></p>
                    <a target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/hide-shipping-method-for-woocommerce/' ) ;
?>"><?php 
esc_html_e( 'Click here »', 'woo-hide-shipping-methods' );
?></a>
                </div>
            </div>
            <?php 
?>
            <div class="dotstore-sidebar-section">
                <div class="dotstore-important-link-heading">
                    <span class="dashicons dashicons-star-filled"></span>
                    <span class="heading-text"><?php 
esc_html_e( 'Suggest A Feature', 'woo-hide-shipping-methods' );
?></span>
                </div>
                <div class="dotstore-important-link-content">
                    <p><?php 
esc_html_e( 'Let us know how we can improve the plugin experience.', 'woo-hide-shipping-methods' );
?></p>
                    <p><?php 
esc_html_e( 'Do you have any feedback &amp; feature requests?', 'woo-hide-shipping-methods' );
?></p>
                    <a target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/feature-requests/' ) ;
?>"><?php 
esc_html_e( 'Submit Request »', 'woo-hide-shipping-methods' );
?></a>
                </div>
            </div>
            <div class="dotstore-sidebar-section">
                <div class="dotstore-important-link-heading">
                    <span class="dashicons dashicons-editor-kitchensink"></span>
                    <span class="heading-text"><?php 
esc_html_e( 'Changelog', 'woo-hide-shipping-methods' );
?></span>
                </div>
                <div class="dotstore-important-link-content">
                    <p><?php 
esc_html_e( 'We improvise our products on a regular basis to deliver the best results to customer satisfaction.', 'woo-hide-shipping-methods' );
?></p>
                    <a target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/hide-shipping-method-for-woocommerce/#tab-update-log' ) ;
?>"><?php 
esc_html_e( 'Visit Here »', 'woo-hide-shipping-methods' );
?></a>
                </div>
            </div>

            <!-- html for popular plugin !-->
            <div class="dotstore-important-link dotstore-sidebar-section">
                <div class="dotstore-important-link-heading">
                    <span class="dashicons dashicons-plugins-checked"></span>
                    <span class="heading-text"><?php 
esc_html_e( 'Our Popular Plugins', 'woo-hide-shipping-methods' );
?></span>
                </div>
                <div class="video-detail important-link">
                    <ul>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/Advanced-Flat-Rate-Shipping-Method.png' ) ;
?>" alt="<?php 
esc_attr_e( 'Flat Rate Shipping Plugin For WooCommerce', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/flat-rate-shipping-plugin-for-woocommerce/" ) ;
?>">
                                <?php 
esc_html_e( 'Flat Rate Shipping Plugin For WooCommerce', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/Conditional-Product-Fees-For-WooCommerce-Checkout.png' ) ;
?>" alt="<?php 
esc_attr_e( 'Conditional Product Fees For WooCommerce Checkout', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/product/woocommerce-extra-fees-plugin/" ) ;
?>">
                                <?php 
esc_html_e( 'Extra Fees Plugin for WooCommerce', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/WooCommerce Conditional Discount Rules For Checkout.png' ) ;
?>" alt="<?php 
esc_attr_e( 'Conditional Discount Rules For WooCommerce Checkout', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/woocommerce-conditional-discount-rules-for-checkout/" ) ;
?>">
                                <?php 
esc_html_e( 'Conditional Discount Rules For WooCommerce Checkout', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/WooCommerce-Blocker-Prevent-Fake-Orders.png' ) ;
?>" alt="<?php 
esc_attr_e( 'WooCommerce Blocker – Prevent Fake Orders', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/woocommerce-anti-fraud" ) ;
?>">
                                <?php 
esc_html_e( 'WooCommerce Anti-Fraud', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/Advanced-Product-Size-Charts-for-WooCommerce.png' ) ;
?>" alt="<?php 
esc_attr_e( 'Product Size Charts Plugin For WooCommerce', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/woocommerce-advanced-product-size-charts/" ) ;
?>">
                                <?php 
esc_html_e( 'Product Size Charts Plugin For WooCommerce', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/wcbm-logo.png' ) ;
?>" alt="<?php 
esc_attr_e( 'WooCommerce Category Banner Management', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/product/woocommerce-category-banner-management/' ) ;
?>">
                                <?php 
esc_html_e( 'WooCommerce Category Banner Management', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        <li>
                            <img class="sidebar_plugin_icone" src="<?php 
echo  esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/popular-plugins/woo-product-att-logo.png' ) ;
?>" alt="<?php 
esc_attr_e( 'Product Attachment For WooCommerce', 'woo-hide-shipping-methods' );
?>">
                            <a target="_blank" href="<?php 
echo  esc_url( "https://www.thedotstore.com/woocommerce-product-attachment/" ) ;
?>">
                                <?php 
esc_html_e( 'Product Attachment For WooCommerce', 'woo-hide-shipping-methods' );
?>
                            </a>
                        </li>
                        </br>
                    </ul>
                </div>
                <div class="view-button">
                    <a class="button button-primary button-large" target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/plugins' ) ;
?>"><?php 
esc_html_e( 'VIEW ALL', 'woo-hide-shipping-methods' );
?></a>
                </div>
            </div>
            <!-- html end for popular plugin !-->
            <div class="dotstore-sidebar-section">
                <div class="dotstore-important-link-heading">
                    <span class="dashicons dashicons-sos"></span>
                    <span class="heading-text"><?php 
esc_html_e( 'Five Star Support', 'woo-hide-shipping-methods' );
?></span>
                </div>
                <div class="dotstore-important-link-content">
                    <p><?php 
esc_html_e( 'Got a question? Get in touch with theDotstore developers. We are happy to help!', 'woo-hide-shipping-methods' );
?> </p>
                    <a target="_blank" href="<?php 
echo  esc_url( 'https://www.thedotstore.com/support/' ) ;
?>"><?php 
esc_html_e( 'Submit a Ticket »', 'woo-hide-shipping-methods' );
?></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
