


<?php
//Amy Cathey WEB-182 8-1b

$type = filter_input(INPUT_POST, 'type');

$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');

$customer_type = strtoupper($type);




switch ($customer_type) {


case 'R':

         if ($invoice_subtotal < 100) {
            $discount_percent = .0;

} 
    else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) { 
            $discount_percent = .1;
} 
    else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500) { 
            $discount_percent = .25;   
} 
    else if ($invoice_subtotal >= 500) { 
            $discount_percent = .3;
}
    break;

case 'C':
 
 
         if ($invoice_subtotal > 0) {
 
             $discount_percent = .2;

}
    break;

case 'T':
         if ($invoice_subtotal < 500) {
            $discount_percent = .4;
}
    else if ($invoice_subtotal >= 500) {
            $discount_percent = .5;    
}  
    break;
default:
	 $discount_percent = .1;
    break;
}
         

    $discount_amount = $invoice_subtotal * $discount_percent;
    $invoice_total = $invoice_subtotal - $discount_amount;
    $percent = number_format (($discount_percent * 100));
         
    $discount = number_format($discount_amount, 2);
    $total = number_format($invoice_total, 2);
    include 'invoice_total.php';

?>