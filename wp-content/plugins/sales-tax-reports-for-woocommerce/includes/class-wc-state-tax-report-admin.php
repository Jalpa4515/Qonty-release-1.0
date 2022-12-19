<?php
/**
 *
 * The WC_State_Tax_Report_Admin class has functions for displying admin reports the plugin.
 *
 * @package WC_State_Tax_Report
 * @since 1.0.0
 */

/**
 * WC_State_Tax_Report_Admin class.
 */
class WC_State_Tax_Report_Admin {
    
    
    /**
     * Singleton class instance.
     *
     * @var WC_State_Tax_Report_Admin
     */
    private static $instance;

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_init', array( &$this, 'init') );
        add_filter( 'woocommerce_admin_reports', array( &$this, 'admin_add_report_orders_tab' ) );
    }
    
	/**
	 * init
	 */
    public function init() {
        wp_enqueue_script('jquery-ui-datepicker');

        wp_enqueue_script( 'state-tax-plugin-admin', WC_STATE_TAX_REPORT_ASSETS_URL . "js/admin.js" ) ;

        add_action( 'admin_footer', array( &$this, 'add_datepicker' ), 10 ) ;
    }
    
	/**
	 * add report tab
	 */
    public function admin_add_report_orders_tab( $reports ) { 
 
        $array = array(
            'sales_by_state' => array(
                'title' => 'Sales by State',
                'description' => '',
                'hide_title' => 1,
                'callback' => array( &$this, 'yearly_sales_by_state')
            )
        );
        
        if( isset( $reports['orders'] ) && is_array($reports['orders']['reports']) ) {
            $reports['orders']['reports'] = array_merge($reports['orders']['reports'], $array);
        }
        else {
            $reports['orders']['reports'] = $array ;
        }
        
        return $reports; 
    }
    
	/**
	 * year sales
	 */
    public function yearly_sales_by_state() {

        $current_year = date("Y") ; 
        $totalWithTaxShip = 0 ; 
        $totalCartValue = 0 ;
        $totalTaxCollected = 0 ;
        $totalNoTaxNoShip = 0 ;

        // db query
        $date_query = false ;
        $from_date = false ;
        $to_date = false ;
        
        if(isset($_GET['fromDate']) || isset($_GET['toDate'])) {
            $date_query = array( array('inclusive' => true) ) ;
            if(isset($_GET['fromDate'])) {
                $from_date = sanitize_text_field($_GET['fromDate']) ;
                if($this->validate_date($from_date)) {
                    $date_query[0]['after'] = $from_date ;
                }
            }
            
            if(isset($_GET['toDate'])) {
                $to_date = sanitize_text_field($_GET['toDate']) ;
                if($this->validate_date($to_date)) {
                    $date_query[0]['before'] = $to_date ;
                }
            }
            
            if($from_date == false && $to_date == false) {
                $date_query = false ;
            }
        }
        
        $args = [
            'post_type' => 'shop_order',
            'posts_per_page' => '-1',
            'post_status' => ['wc-completed', 'wc-processing']
        ];
        
        if($date_query) {
            $args['date_query'] = $date_query ;
        }
        else {
            $args['year'] = $current_year ;
        }
        
        $my_query = new WP_Query($args);
        $orders = $my_query->posts;
        $selected_state = ( isset($_GET['state']) ? sanitize_text_field($_GET['state']) : '' ) ;
        
        // report form
        $states = woocommerce_form_field('state', array(
                    'type'       => 'state',
                    'return'     => true,
                    'country'    => 'US',
                    'placeholder'    => __('Select a State')
                    ), esc_html($selected_state)
                );
        
        $form = '<form method="GET">' ;
        
        foreach($_GET as $key => $val) {
            $form .= '<input type="hidden" name="' . esc_html($key) . '" value="' . esc_html($val) . '" />';
        }
        
        $form .= '<p><input name="fromDate" id="fromDate" type="text" value="' . esc_html($from_date) . '" placeholder="Order Date From" /></p>' ;
        $form .= '<p><input name="toDate" id="toDate" type="text" value="' . esc_html($to_date) . '" placeholder="Order Date To" /></p>' ;
        $form .= $states ;
        $form .= '<input type="submit" class="button" value="FILTER" />' ;
        
        $form .= '</form>' ;
        
        echo '<p>' . $form . '</p>' ;
        
        // start report table
        $rows = array() ;
        $tax_rate_array = array() ;
        
        // loop every order in the query
        foreach ($orders as $order => $value) {

            // get order datas
            $order_id = $value->ID;
            $order = wc_get_order($order_id);
            $order_data = $order->get_data();
            $cart_value = number_format( (float) $order->get_total() - $order->get_total_tax() - $order->get_total_shipping() - $order->get_shipping_tax(), wc_get_price_decimals(), '.', '' );
            
            //get order tax rate
            $tax_rates = $order->get_items('tax') ;
            $tax_rate_code = 'NONE (0%)' ;
            
            if( is_array( $tax_rates ) ) {
                $rate_data = end( $tax_rates ) ;
                
                if($rate_data) {
                    $data = $rate_data->get_data() ;
                    $tax_rate_code = $data['rate_code'] . ' (' . $data['rate_percent'] . '%)' ;
                }
            }
            
            $tax_rate_key = preg_replace('/ /', '-', $tax_rate_code) ;
            $tax_rate_array[$tax_rate_key]['rate_total'] += $order->get_total_tax() ;
            $tax_rate_array[$tax_rate_key]['sales_total'] += $cart_value ;
            
            // If Order is United States
            if ( $order_data['shipping']['country'] === 'US' ) { 

                // if state filter
                if($_GET['state']){ 

                    // if state filter match
                    if ( $order_data['shipping']['state'] === $_GET['state'] ) {
                        
                        $rows[] = array(
                            'state' => $order_data['shipping']['state'],
                            'order_id' => $order_id,
                            'date' => date('Y-m-d g:ia', strtotime($order->order_date)),
                            'total' => $order->get_total(),
                            'shipping' => $order->get_shipping_total(),
                            'shipping_tax' => $order->get_shipping_tax(),
                            'tax_rate' => $tax_rate_code,
                            'tax' => $order->get_total_tax(),
                            'cart_value' => $cart_value
                        ) ;
                        
                        // tally total order values
                        $totalWithTaxShip += $order->get_total();
                        $totalNoTaxNoShip += $cart_value;
                        $totalTaxCollected += $order->get_total_tax();
                    }
                    
                } else {
                  // all states report
                   $rows[] = array(
                        'state' => $order_data['shipping']['state'],
                        'order_id' => $order_id,
                        'date' => date('Y-m-d g:ia', strtotime($order->order_date)),
                        'total' => $order->get_total(),
                        'shipping' => $order->get_shipping_total(),
                        'shipping_tax' => $order->get_shipping_tax(),
                        'tax_rate' => $tax_rate_code,
                        'tax' => $order->get_total_tax(),
                        'cart_value' => $cart_value
                    ) ;

                    // tally total order values
                    $totalWithTaxShip += $order->get_total();
                    $totalNoTaxNoShip += $cart_value;
                    $totalTaxCollected += $order->get_total_tax();
                }
            } 
        }
        
        include WC_STATE_TAX_REPORT_TEMPLATES . 'tax_table.php' ;
        
        // show some summaries
        echo "<h3>Total Sales by State</h3>";
        echo "Total Sales incl Tax/Ship: " . wc_price($totalWithTaxShip) . "</br>";
        echo "Total Sales NO  Tax/Ship: " . wc_price($totalNoTaxNoShip) . "</br>";

        echo '<p><a href="#" class="button download-sales-tax-report">Download CSV</a></p>' ;
    }
    
    /**
	 * Add settings link on plugin page.
	 *
	 * @param array $links An array of existing links for the plugin.
	 * @return array The new array of links
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=wc_state_tax_report_settings">Settings</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}
    
    /**
	 * Add link to admin menu
	 */
	public function add_page_to_menu() {
		global $wc_state_tax_report_hook ;
		$wc_state_tax_report_hook = 'wc_state_tax_report' ;

		add_menu_page(
			'State Taxes',
			'State Taxes',
			'manage_options',
			$wc_state_tax_report_hook,
			array( &$this, 'render_page' ),
			//MYSTYLE_ASSETS_URL . '/images/mystyle-icon.png',
			'56'
		);

		add_submenu_page(
			$wc_state_tax_report_hook,
			'Reports',
			'Reports',
			'manage_options',
			$wc_state_tax_report_hook,
			array( &$this, 'render_page' ),
			99
		);

	}
    
    public function add_datepicker(){ 
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#fromDate').datepicker({
                    dateFormat : 'yy-mm-dd'
                });
                jQuery('#toDate').datepicker({
                    dateFormat : 'yy-mm-dd'
                });
            });
        </script>
        <?php
    }
    
    public function validate_date($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    
    public function render_page() {
        // placeholder, unused for now
    }
    
    /**
     * Gets the singleton instance.
     *
     * @return WC_State_Tax_Report_Admin Returns the singleton instance of
     * this class.
     */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
}