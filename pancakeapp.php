<?php
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
		
				
		$result = $this->rest_helper(
			    "clients/",
			    $data, 'GET'
			  );
		
		return $result;
			
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
		
		$data['id'] = $client_id;
				
		$result = $this->rest_helper(
			    "clients/show/",
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
						
		$result = $this->rest_helper(
			    "clients/new/",
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
	*/
	public function client_edit($client_info){
		
		print_r($client_info);
				
		$result = $this->rest_helper(
			    "clients/edit",
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
		
		$data['id'] = $client_id;
				
		$result = $this->rest_helper(
			    "clients/delete",
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
		

		$arg_list = func_get_args();
		
		if($arg_list[0]){$data['client_id'] = $arg_list[0];}
		if($arg_list[1]){$data['limit'] = $arg_list[1];}
		if($arg_list[2]){$data['start'] = $arg_list[2];}
		if($arg_list[3]){$data['sort_by'] = $arg_list[3];}
		if($arg_list[4]){$data['sort_dir'] = $arg_list[4];}
				
				
				
		$result = $this->rest_helper(
			    "invoices/",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/show/",
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
		
				
		$result = $this->rest_helper(
			    "invoices/new/",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/delete",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/open",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/close",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/paid",
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
		
		$data['id'] = $invoice_id;
				
		$result = $this->rest_helper(
			    "invoices/send",
			    $data, 'POST'
			  );
		
		return $result;
			
	}

	/*** REST HELPER ******************************************************************
	/*## makes connection
	* @param int required $invoice_id	
	* @access public
	* @return api response
	*/
	
	public function rest_helper($uri,$params,$method){ // Setup Request
        
        // Build base Request URL
        $request_url = $this->api_url . $uri;

        // Append query string for parameters
        if ($method == 'GET' && !empty($params)){
            $request_url .= '?' . http_build_query($params);
        }

        echo "<BR>URL: $request_url <BR>";
        
        $curl = curl_init();

        // POST request will be passed as multipart/form-data
        if ($method === 'POST'){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }

        // Add API header
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-API-KEY: ' . $this->api_key));

        // Setup Options for Request. Only 5 seconds allowed for the request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_URL, $request_url);

        // Make Request
        $curl_response = curl_exec($curl);

        $response->url = $request_url;
        $response->status_code = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response->request_time = (float) curl_getinfo($curl, CURLINFO_TOTAL_TIME);

        // Request Failed...
        if ($curl_response === FALSE)
        {
            $this->log_message('error', "Pancake::request() - Curl Error #".curl_errno($curl)." - ".curl_error($curl));
            return $response;
        }

        // Request was made, determine if it was successful or not.
        $response->success = ($response->status_code >= 200 && $response->status_code < 300);
        $response->body = json_decode($curl_response,true);
       // $response->parse();

        // Double Check API Status Response. If it is not set, it will be NULL
        if ($response->status === FALSE)
        {
            $error = ($response->error) ? $response->error : 'Unknown Pancake API Error';
            echo $error;
            $response->success = FALSE;
            return $response;
        }

        // Close the connection and return the result
        curl_close($curl);
        return $response;
    }//END REST HELPER
	
}//END pancakeapp
?>