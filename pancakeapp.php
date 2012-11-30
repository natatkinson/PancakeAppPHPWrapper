<?php
//INCLUDE rest_helper for POST/GET functions
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


/***
*CLIENTS
***/			
	/*** CLIENTS LIST ******************************************************************
	/*## returns lists of all clients in system
	* @access public
	* @return $result A succesful response will be an array of the form
	*	array(
	*			{
	*			'id' => integer client id
	*			'first_name' => string client's first name
	*			'last_name' => string
	*			'title' => string
	*			'email' =>
	*			'company' =>
	*			'address' =>
	*			'phone' =>
	*			'fax' =>
	*			'mobile' =>
	*			'website' =>
	*			'profile' =>
	*			'created' =>
	*			'modified' =>
	*			'unique_id' =>
	*			'passphrase' => kitchen passphrase
	*			'url' => kitchen url
	*			}
	*	)
	*/
	public function client_list(){
		
		$data['X-API-KEY'] = $this->api_key;
				
		$result = rest_helper(
			    $this->api_url."clients/",
			    $data, 'GET'
			  );
		
		return $result['clients'];
			
	}
	
	/*** CLIENT GET ******************************************************************
	/*## returns info on client in system
	* @param int $client_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'id => client id
	*		'message' => message saying client has been created
	*	}
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function client_info($client_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $client_id;
				
		$result = rest_helper(
			    $this->api_url."clients/show/",
			    $data, 'GET'
			  );
		
		return $result;
			
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
	*		'status' => bool true
	*		'id => int client id
	*		'message' => string message saying client has been created (or error message)
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
	
	/*** CLIENT EDIT ******************************************************************
	/*## updates client in the system
	* @param array $client_info contains all information on the client for creation
	*	this array should be in the form
	*	array(
	*		'id' => integer required id of client to update
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
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function client_edit($client_info){
		
		$client_info['X-API-KEY'] = $this->api_key;
		print_r($client_info);
				
		$result = rest_helper(
			    $this->api_url."clients/edit",
			    $client_info, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** CLIENT DELETE ******************************************************************
	/*## deletes client from system
	* @param int required $client_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying client has been deleted (or error meessage)
	*	}
	*/
	public function client_delete($client_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $client_id;
				
		$result = rest_helper(
			    $this->api_url."clients/delete",
			    $data, 'POST'
			  );
		
		return $result;
			
	}

/***
*INVOICES
***/
	/*** INVOICES LIST ******************************************************************
	/*## returns lists of all invoices in system
	* @param int $client_id returns invoices for specific client
	* @param int $limit limits number of results
	* @param int $start
	* @param string $sort_by (email, id) default id
	* @param string $sort_dir (asc,desc) default asc
	* @access public
	* @return $result A succesful response will be an array of the form
	*	array(
	*			{
	*			'id' => integer invoice id
	*			'unique_id' => string
	*			'client_id' => int
	*			'amount' => string
	*			'due_date' => string
	*			'invoice_number' => string
	*			'notes' =>
	*			'description' =>
	*			'txn_id' =>
	*			'payment_gross' =>
	*			'item_name' =>
	*			'payment_hash' =>
	*			'payment_status' =>
	*			'payment_type' =>
	*			'payment_date' =>
	*			'payer_status' =>
	*			'type' =>
	*			'date_entered' =>
	*			'is_paid' =>
	*			'is_recurring' =>
	*			'frequency' =>
	*			'auto_send' =>
	*			'recur_id' =>
	*			'currency_id' =>
	*			'exchange_rate' => 
	*			'proposal_id' => 
	*			'send_x_days_before' =>
	*			'has_sent_notification' =>
	*			'last_sent' =>
	*			'next_recur_date' =>
	*			'last_viewed' =>
	*			'is_viewable' =>
	*			'project_id' =>
	*			'first_name' =>
	*			'last_name' =>
	*			'email' =>
	*			'company' =>
	*			'phone' => 
	*			'currency_code' => 
	*			'paid' =>
	*			'overdue' =>
	*			}
	*	)
	*/
	public function invoice_list(){
		
		$data['X-API-KEY'] = $this->api_key;
		
		$arg_list = func_get_args();
		
		if($arg_list[0]){$data['client_id'] = $arg_list[0];}
		if($arg_list[1]){$data['limit'] = $arg_list[1];}
		if($arg_list[2]){$data['start'] = $arg_list[2];}
		if($arg_list[3]){$data['sort_by'] = $arg_list[3];}
		if($arg_list[4]){$data['sort_dir'] = $arg_list[4];}
				
				
				
		$result = rest_helper(
			    $this->api_url."invoices/",
			    $data, 'GET'
			  );
		
		return $result['invoices'];
			
	}
	
	/*** INVOICE GET ******************************************************************
	/*## returns info on invoice in system
	* @param int $invoice_id	
	* @access public
	*
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function invoice_info($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/show/",
			    $data, 'GET'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE ADD ******************************************************************
	/*## adds invoice to system
	* @param array $invoice_data contains all information on the invoice for creation
	*	this array should be in the form (if type='DETAILED', include items)
	*	array(
	*		'client_id' => int required
	*		'type' => string required ('SIMPLE', 'DETAILED' or 'ESTIMATE')
	*		'amount' => string required(if type='SIMPLE')
	*		'description' => string
	*		'notes' => string
	*		'is_paid' => int (0 or 1)
	*		'due_date' => string in format: YYYY-MM-DD, tomorrow, next week, etc
	*		'is_recurring' => int (0 or 1)
	*		'frequency' => string ('w','m','y')
	*		'auto_send' => int (0 or 1)
	*		'currency' => string currency code
	*		'items' => array( 
	*			{
	*				'name' => string
	*				'description' => string
	*				'qty' => float
	*				'rate' => string
	*				'tax_id' => int
	*				'total' => string
	*			}
	*		)
	*	)	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool 
	*		'unique_id => string unique invoice id
	*		'message' => strng message saying invoice has been created (or error message)
	*	}
	*/
	public function invoice_add($invoice_data){
		
		$invoice_data['X-API-KEY'] = $this->api_key;
				
		$result = rest_helper(
			    $this->api_url."invoices/new/",
			    $invoice_data, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE DELETE ******************************************************************
	/*## deletes invoice from system
	* @param int required $invoice_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying invoice has been created
	*	}
	*/
	public function invoice_delete($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/delete",
			    $data, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE UPDATE - MARK AS OPEN ******************************************************************
	/*## opens invoice from system
	* @param int required $invoice_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying invoice has been created
	*	}
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function invoice_update_open($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/open",
			    $data, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE UPDATE - MARK AS CLOSED ******************************************************************
	/*## closes invoice
	* @param int required $invoice_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying invoice has been created
	*	}
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function invoice_update_close($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/close",
			    $data, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE UPDATE - MARK AS PAID ******************************************************************
	/*## marks invoice as paid
	* @param int required $invoice_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying invoice has been created
	*	}
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function invoice_update_paid($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/paid",
			    $data, 'POST'
			  );
		
		return $result;
			
	}
	
	/*** INVOICE SEND ******************************************************************
	/*## sends/resend invoice
	* @param int required $invoice_id	
	* @access public
	* @return $result A succesful response will be an object of the form
	*	{
	*		'status' => bool true
	*		'message' => string message saying invoice has been created
	*	}
	* METHOD DOES NOT WORK - ERROR IN PANCAKE API
	*/
	public function invoice_send($invoice_id){
		
		$data['X-API-KEY'] = $this->api_key;
		$data['id'] = $invoice_id;
				
		$result = rest_helper(
			    $this->api_url."invoices/send",
			    $data, 'POST'
			  );
		
		return $result;
			
	}
	
}//END pancakeapp
?>