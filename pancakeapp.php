<?php
//INCLUDE rest_helper for POST functions
include "rest_helper.php";

/*********************************************************************
/*## PANCAKEAPE API*/
//http://support.pancakeapp.com/api_endpoints/

class pancakeapp {

	public function __construct(){
		
		/**************************************/
		/* SET YOUR API KEY AND API URL BELOW */
		/**************************************/
		
		$this->api_key = "__key__";		
		$this->api_url = "http://www.__pancake_install__/api_1/";

	}
		
	/*** CLIENT ADD ******************************************************************
	/*## adds client to system
	* @param array $client_info contains all information on the client for creation
	*	this array should be in the form
	*	array(
	*		'first_name' => string required client first name
	*		'last_name' => string required client last name
	*		'email' => string required client email address
	*		'title' => string title of client (Mr., Mrs., Dr., Coach etc...)
	*		'company' => string client's company name
	*		'address' => string client physical address
	*		'phone' => string client phone number
	*		'fax' => string client fax number
	*		'mobile' => string client mobile phone number
	*		'website' => string client website url
	*		'profile' => string client notes
	*		'passphrase' => string client passphrase to kitchen area	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => true
	*		'id => client id
	*		'message' => message saying client has been created
	*	}
	*/
	public function client_add($client_info){
		
		$client_info['X-API-KEY'] = $this->api_key;
				
		$result = rest_helper(
			    $this->api_url."clients/new/",
			    $client_info, 'POST'
			  );
		
		return $result;
			
	}
	
}//END pancakeapp
?>