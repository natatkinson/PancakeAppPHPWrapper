<?php
//INCUDE THE CLASS
include '../pancakeapp.php';
$pancake = new pancakeapp();


/* CREATE CLIENT */
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
?>