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
		
		$this->api_key = "?X-API-KEY=__key__";		
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
	
		
		$info = $this->client_info($client);
		$data = array( 'X-API-KEY' => $this->api_key,
				      'first_name' => $info['client_contact_fname'],
				      'last_name' => $info['client_contact_lname'],
				      'email' => $info['client_contact_email'],
				      'company' => $info['client_name'],
				      'address' => $info['client_contact_address'],
				      'phone' => $info['client_contact_phone'],
				      'website' => $info['client_site_domain_base'].$info['client_site_domain'].$info['client_site_domain_final']
				      );
				
		$result = rest_helper(
			    $this->api_url."clients/new/",
			    $data, 'POST'
			  );
		
		return $result;
		//THE RETURNED CLIENT ID IS:$client_id = $result->id;
			
	}
	
}//END pancakeapp
?>