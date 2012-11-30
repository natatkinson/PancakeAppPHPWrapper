<?php
//INCUDE THE CLASS
include '../pancakeapp.php';
$pancake = new pancakeapp();
	

/* CLIENT LIST */
	$result = $pancake->client_list();
	
	//ITERATE THROUGH CLIENTS
	foreach($result as $client){
		echo "<BR> CLIENT_ID: ".$client['id']."<BR>";
	}
	
	exit;
	
	
/* CLIENT INFO */
	$client_id = 1;
	$result = $pancake->client_info($client_id);
	
	var_dump($result);
	exit;
	

/* CLIENT ADD */
	$client_info =array('first_name' => 'fname',
			      'last_name' => 'lname',
			      'email' => 'syrup@stacks.com',
			      'company' => 'Big Stacks',
			      'address' => '123 Maple Street',
			      'phone' => '555-5555',
			      'website' => 'http://www.pancakeapp.com'
			      );
	
	$result = $pancake->client_add($client_info);
	
	var_dump($result);
	exit;
	
	

/* CLIENT EDIT */
	$data = array( 
		'id' => 1,
		'first_name' => 'fname_edited',
		'last_name' => 'lastname edited',
		'email' => 'email@updated.ca',
		'company' => 'Bigger Stacks',
		'address' => '1234 Maple Street',
		'phone' => '888-555-5555',
		'website' => 'www.website.ca'
	);
	
	$result = $pancake->client_edit($data);
	
	var_dump($result);
	exit;


/* CLIENT DELETE */
	$result = $pancake->client_delete(2);
	
	var_dump($result);
	exit;
	


?>