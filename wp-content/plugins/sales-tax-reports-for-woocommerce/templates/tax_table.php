<style>.custom-wc-report-table { border: 1px solid #ccc; } .custom-wc-report-table tr:nth-child(odd){ background-color: white; } </style>
<table class="custom-wc-report-table wc-state-tax-report-table" style="width: 100%; border: 1px solid #ccc; ">
    <tbody>
        <tr class="exportable">
            <td>State</td>
            <td>Order ID</td>
            <td>Order Date</td>
            <td>Order Total</td>
            <td>Shipping Charged</td>
            <td>Shipping Tax</td>
            <td>Tax Rate</td>
            <td>Tax</td>
            <td>SubTotal (no tax &amp; no ship)</td>
        </tr>
        <?php foreach($rows as $row) : ?>
        <tr class="exportable">
            <td><?php echo $row['state'] ; ?></td>
            <td><?php echo $row['order_id'] ; ?></td>
            <td><?php echo $row['date'] ; ?></td>
            <td><?php echo $row['total'] ; ?></td>
            <td><?php echo $row['shipping'] ; ?></td>
            <td><?php echo $row['shipping_tax'] ; ?></td>
            <td><?php echo $row['tax_rate'] ; ?></td>
            <td><?php echo $row['tax'] ; ?></td>
            <td><?php echo $row['cart_value'] ; ?></td>
        </tr>
        <?php endforeach ; ?>
        <tr>
            <td colspan="8" style="text-align:left;">
                <b>TOTALS</b>
            </td>
        </tr>
        <tr> 
            <td></td>
            <td></td>
            <td></td> 
            <td>
                <?php echo wc_price($totalWithTaxShip) ; ?>
            </td> 
            <td></td> 
            <td></td> 
            <td></td> 
            <td>
                <?php echo wc_price($totalTaxCollected) ; ?>
            </td> 
            <td>
                <?php echo wc_price($totalNoTaxNoShip) ; ?>
            </td>
        </tr>
    </tbody>
</table>
<?php if( count( $tax_rate_array ) > 0 ) : ?>

<h3>Tax Rate Totals</h3>
<table class="custom-wc-report-table">
    <tbody>
        <tr>
            <td>Tax Rate Code</td>
            <td>Tax Rate Total</td>
            <td>District Sales Total (no tax & no ship)</td>
        </tr>
        <?php foreach( $tax_rate_array as $tax_code => $tax_rate ) : ?>
        <tr>
            <td><?php print preg_replace( '/-/', ' ', $tax_code ) ; ?></td>
            <td><?php print wc_price( $tax_rate['rate_total'] ) ; ?></td>
            <td><?php print wc_price( $tax_rate['sales_total'] ) ; ?></td>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>
<?php endif ; ?>
