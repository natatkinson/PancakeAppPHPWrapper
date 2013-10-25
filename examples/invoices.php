<?php
//INCUDE THE CLASS
include '../pancakeapp.php';
$pancake = new pancakeapp();

	
/* INVOICE LIST */
	$result = $pancake->invoice_list();
	/*
	echo "<pre>";
	print_r($result);
	echo "</pre>";
	*/
		
	//ITERATE THROUGH INVOICES
	foreach($result as $invoice){
		echo "<BR> INVOICE_ID: ".$invoice['id']."<BR>";
	}
	
	exit;
	
	
/* INVOICE INFO */
	$invoice_id = 1;
	$result = $pancake->invoice_info($invoice_id);
	
	var_dump($result);
	
	

/* INVOICE ADD */
	
	$items[0]['name'] = 'Big Stack';
	$items[0]['description'] = 'Year subscription of pancakes';
	$items[0]['rate'] = '16.47';
	$items[0]['quantity'] = 12;
			
	$invoice_data = array(
		'client_id' => 1,
		'type' => 'DETAILED',
		'description' => '',
		'is_recurring' => 1,
		'frequency' => 'y',
		'auto_send' => 1,
		'due_date' => '2013-11-25',
		'items' => $items
	);
					      
	
	$result = $pancake->invoice_add($invoice_data);
	
	var_dump($result);
	exit;
	
	

/* INVOICE EDIT */

			
	$invoice_data = array(
		'id' => 7,
		'client_id' => 3,
		'type' => 'DETAILED',
		'description' => 'new desc',
		'is_recurring' => 1,
		'frequency' => 'y',
		'auto_send' => 1,
		'due_date' => '2013-11-25',
		'is_viewable' => 1,
		'is_paid' => 1,
		'payment_date' => '2013-10-22',
		'send_x_days_before' => '20'
	);
					      
	
	$result = $pancake->invoice_edit($invoice_data);
	
	var_dump($result);
	exit;


/* INVOICE MARK AS PAID */
	
	$result = $pancake->invoice_send(5);
	var_dump($result);
	exit;
	


/* INVOICE DELETE */
	
	$result = $pancake->invoice_delete(2);
	var_dump($result);
	exit;




?>