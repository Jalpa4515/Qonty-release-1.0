<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Farmart
 */

if ( ! function_exists( 'farmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function farmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on farmart, use a find and replace
		 * to change  'farmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'farmart', get_template_directory() . '/lang' );

		// Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','video' ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_editor_style( 'css/editor-style.css' );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'align-full' );

		add_image_size( 'farmart-post-full', 1170, 500, true );
		add_image_size( 'farmart-blog-default', 1170, 739, true );
		add_image_size( 'farmart-blog-small', 600, 378, true );
		add_image_size( 'farmart-blog-small-2', 1170, 405, true );
		add_image_size( 'farmart-blog-listing', 1170, 737, true );
		add_image_size( 'farmart-blog-grid', 600, 379, true );
		add_image_size( 'farmart-blog-elementor', 370, 235, true );

		add_image_size( 'farmart-dokan-banner', 270, 250, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'farmart' ),
			'socials' => esc_html__( 'Social Menu', 'farmart' ),
			'mobile' => esc_html__( 'Mobile Menu', 'farmart' ),
			'footer' => esc_html__( 'Footer Menu', 'farmart' ),
		) );

	}
endif;
add_action( 'after_setup_theme', 'farmart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function farmart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'farmart_content_width', 640 );
}

add_action( 'after_setup_theme', 'farmart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function farmart_widgets_init() {
	// Register primary sidebar
	$sidebars = array(
		'blog-sidebar'          => esc_html__( 'Blog Sidebar', 'farmart' ),
		'topbar-left'          	=> esc_html__( 'Topbar Left', 'farmart' ),
		'topbar-right'          => esc_html__( 'Topbar Right', 'farmart' ),
		'topbar-mobile'         => esc_html__( 'Topbar Mobile', 'farmart' ),
		'catalog-sidebar'       => esc_html__( 'Catalog Sidebar', 'farmart' ),
		'product-sidebar'       => esc_html__( 'Single Product Sidebar', 'farmart' ),
		'footer-link'      		=> esc_html__( 'Footer Link', 'farmart' ),
	);

	// Register sidebars
	foreach ( $sidebars as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	if ( intval( farmart_get_option( 'enable_mobile_version' ) ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Single Product Sidebar Mobile', 'farmart' ),
			'id'            => 'product-sidebar-mobile',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	// Register footer sidebars
	for ( $i = 1; $i <= 5; $i ++ ) {
		$sidebars["footer-$i"] = esc_html__( 'Footer', 'farmart' ) . " $i";
	}

	// Register sidebars
	foreach ( $sidebars as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}

add_action( 'widgets_init', 'farmart_widgets_init' );

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/woocommerce.php';

	// Vendor
	require get_template_directory() . '/inc/woocommerce/vendors/vendors.php';
}

/**
 * Custom functions for the theme.
 */
require get_template_directory() . '/inc/functions/search-ajax.php';
require get_template_directory() . '/inc/functions/recently-viewed-product-ajax.php';
require get_template_directory() . '/inc/functions/header.php';
require get_template_directory() . '/inc/functions/footer.php';
require get_template_directory() . '/inc/functions/layout.php';
require get_template_directory() . '/inc/functions/entry.php';
require get_template_directory() . '/inc/functions/comments.php';
require get_template_directory() . '/inc/functions/breadcrumbs.php';
require get_template_directory() . '/inc/functions/page-header.php';
require get_template_directory() . '/inc/functions/shop.php';
require get_template_directory() . '/inc/functions/style.php';
require get_template_directory() . '/inc/functions/icon.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/mobile/theme-options.php';
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Custom functions for the theme by hooking
 */

require get_template_directory() . '/inc/frontend/header.php';
require get_template_directory() . '/inc/frontend/footer.php';
require get_template_directory() . '/inc/frontend/layout.php';
require get_template_directory() . '/inc/frontend/comments.php';
require get_template_directory() . '/inc/frontend/nav.php';
require get_template_directory() . '/inc/frontend/entry.php';
require get_template_directory() . '/inc/frontend/page-header.php';
require get_template_directory() . '/inc/frontend/maintenance.php';

// Mobile
require get_template_directory() . '/inc/libs/mobile_detect.php';
require get_template_directory() . '/inc/mobile/layout.php';

if ( is_admin() ) {
	require get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php';
	require get_template_directory() . '/inc/backend/plugins.php';
	require get_template_directory() . '/inc/backend/meta-boxes.php';
	require get_template_directory() . '/inc/backend/editor.php';
	require get_template_directory() . '/inc/backend/product-cat.php';
}




/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // 3 products per row
	}
}





// For Showing variation prices
add_filter('woocommerce_show_variation_price',      function() { return TRUE;});


// Display the Woocommerce Discount Percentage on the Sale Badge for variable products and single products
add_filter( 'woocommerce_sale_flash', 'display_percentage_on_sale_badge', 20, 3 );
function display_percentage_on_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // This will get all the variation prices and loop throughout them
      $prices = $product->get_variation_prices();

      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

       // This will get all the variation prices and loop throughout them
      $children_ids = $product->get_children();

      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
     // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<span class="onsale">' . esc_html__( 'up to -', 'woocommerce' ) . ' '. $percentage . '</span>'; // If needed then change or remove "up to -" text
}



// For Displaying percentage save on the product
add_filter( 'woocommerce_get_price_html', 'change_displayed_sale_price_html', 10, 2 );
function change_displayed_sale_price_html( $price, $product ) {
    // Only on sale products on frontend and excluding min/max price on variable products
    if( $product->is_on_sale() && ! is_admin() && ! $product->is_type('variable')){
        // Get product prices
        $regular_price = (float) $product->get_regular_price(); // Regular price
        $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

        // "Saving price" calculation and formatting
        $saving_price = wc_price( $regular_price - $sale_price );

        // "Saving Percentage" calculation and formatting
        $precision = 1; // Max number of decimals
        $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';

        // Append to the formated html price
        $price .= sprintf( __('<p class="saved-sale">You Save: %s <em>(%s)</em></p>', 'woocommerce' ), $saving_price, $saving_percentage );
    }
    return $price;
}

// Adding placeholder in checkout page
add_filter('woocommerce_checkout_fields', 'njengah_override_checkout_fields');
 
function njengah_override_checkout_fields($fields)
 
 {
	$fields['billing']['billing_company']['placeholder'] = 'Company Name';
	$fields['billing']['billing_first_name']['placeholder'] = 'Full Name';
	$fields['shipping']['shipping_first_name']['placeholder'] = 'Full Name';
	$fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
	$fields['shipping']['shipping_company']['placeholder'] = 'Company Name';
	$fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
	$fields['billing']['billing_email']['placeholder'] = 'Email Address ';
	$fields['billing']['billing_phone']['placeholder'] = 'Phone';
	$fields['billing']['billing_postcode']['placeholder'] = 'Pincode';	
	$fields['shipping']['shipping_postcode']['placeholder'] = 'Pincode';
	$fields['billing']['billing_city']['placeholder'] = 'City';
	$fields['shipping']['shipping_city']['placeholder'] = 'City';	
 
return $fields;
}


// AUTO UPDATE CART IN CART PAGE
add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
    if (is_cart()) :
    ?>
    <script>
        jQuery('div.woocommerce').on('change', '.qty', function(){
			jQuery("[name='update_cart']").prop("disabled", false);
            jQuery("[name='update_cart']").trigger("click"); 
        });
    </script>
    <?php
    endif;
}


// RE-ORDERING THE CHECKOUT FIELDS 
function rpf_edit_default_address_fields($fields) {

  /* ------ reordering ------ */
$fields['first_name']['priority'] = 10;
$fields['last_name']['priority'] = 20;
$fields['country']['priority'] = 30;
$fields['address_1']['priority'] = 40;
$fields['address_2']['priority'] = 50;
$fields['postcode']['priority'] = 60;
$fields['city']['priority'] = 70;
$fields['state']['priority'] = 80;
$fields['phone']['priority'] = 90;
$fields['email']['priority'] = 100;
  
  return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'rpf_edit_default_address_fields', 100, 1 );

// REMOVE ADD TO CART NOTIFICATION
// add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message');
// function empty_wc_add_to_cart_message( $message, $products ) { 
//     return ''; 
// };

//  MAKE LAST NAME NOT REQUIRED
function divi_engine_remove_required_fields_checkout( $fields ) {
$fields['billing_last_name']['required'] = false;
return $fields;
}
add_filter( 'woocommerce_billing_fields', 'divi_engine_remove_required_fields_checkout');
function divi_engine_remove_required_fields_checkout_1( $fields ) {
$fields['shipping_last_name']['required'] = false;
return $fields;
}
add_filter( 'woocommerce_shipping_fields', 'divi_engine_remove_required_fields_checkout_1');

// RENAME CHECKOUT FIELDS
add_filter( 'woocommerce_default_address_fields' , 'njengah_rename_state_province', 9999 );
function njengah_rename_state_province( $fields ) {
    $fields['first_name']['label'] = 'Full name';
    return $fields;

}




add_action('wp_footer', 'wpsf_move_sidebar_search', 100);
function wpsf_move_sidebar_search()
{ ?>
  <script>
    (function($) {

      // Only on mobile:
      if ($(window).width() <= 980) {

        // Move sidebar search to top
        $('#sidebar').prependTo('#content-area');

      }

    })(jQuery);
  </script>
<?php
}
