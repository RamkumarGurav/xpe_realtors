<?php
//require_once(APPPATH.'views/mail/class.smtp.php');
//require_once(APPPATH.'views/mail/class.phpmailer.php');
require_once(APPPATH . 'third_party/mail/class.phpmailer.php');
require(APPPATH . 'third_party/mail/class.smtp.php');




class Common_model extends CI_Model
{


	function __construct()
	{

		$this->load->database();
		date_default_timezone_set("Asia/Kolkata");
		$this->db->query("SET sql_mode = ''");
	}



	/****************************************************************
	 *GENERAL DB OPERATIONS
	 ****************************************************************/




	/**
	 * Function to get names /records from tables without limit and orderby 
	 *
	 * @param array $params Associative array containing:
	 *                      - 'select': Columns to select
	 *                      - 'from': Table to select from
	 *                      - 'where': Condition for the selection
	 * @return array List of results from the query as array of objects
	 */
	//using
	function get_name($params = array())
	{
		// Set the columns to select
		$this->db->select($params['select']);

		// Set the table to select from
		$this->db->from($params['from']);

		// Set the WHERE condition for the selection
		$this->db->where("($params[where])");

		// Execute the query and store the result
		$query_get_list = $this->db->get();

		// Return the result of the query as an array of objects
		return $query_get_list->result();
	}




	/**
	 * Common method for getting array of objects data from Table records
	 * @param array $params An associative array containing the following keys:
	 *                      - 'select': A string specifying the fields to select
	 *                      - 'from': A string specifying the table to select from
	 *                      - 'where': A string specifying the WHERE condition
	 *                      - 'limit': (Optional) An integer specifying the number of records to return
	 *                      - 'order_by': (Optional) A string specifying the ORDER BY clause
	 * @return array The result of the query as an array of objects
	 */
	//using
	function get_data($params = array())
	{



		// Set the SELECT part of the SQL query using the 'select' value from the $params array
		$this->db->select($params['select']);

		// Set the FROM part of the SQL query using the 'from' value from the $params array
		$this->db->from($params['from']);

		// Set the WHERE condition of the SQL query using the 'where' value from the $params array
		$this->db->where("($params[where])");

		// If a 'limit' value is provided in the $params array, set the LIMIT part of the SQL query
		if (!empty($params['limit'])) {
			$this->db->limit($params['limit']);
		}

		// If an 'order_by' value is provided in the $params array, set the ORDER BY part of the SQL query
		if (!empty($params['order_by'])) {
			$this->db->order_by($params['order_by']);
		}

		// Execute the query and store the result in $query_get_list
		$query_get_list = $this->db->get();

		// Return the result of the query as an array of objects
		return $query_get_list->result();

	}






	function get_dropdown_data($params = array())
	{
		// Extract parameters with default values
		$table_name = isset($params['table_name']) ? $params['table_name'] : '';
		$foreign_column_name = isset($params['foreign_column_name']) ? $params['foreign_column_name'] : '';
		$foreign_column_value = isset($params['foreign_column_value']) ? $params['foreign_column_value'] : '';


		$showable_column_name = isset($params['showable_column_name']) ? $params['showable_column_name'] : "name";

		// Check if table name is provided
		if (empty($table_name)) {
			return false;
		}

		// Start building the query
		$this->db->select('ft.*');
		$this->db->from($table_name . ' as ft');
		$this->db->where('ft.status', 1);
		$this->db->order_by('ft.' . $showable_column_name . ' ASC');

		// Add foreign column value condition if provided
		if (!empty($foreign_column_name) && !empty($foreign_column_value)) {
			$this->db->where('ft.' . $foreign_column_name, $foreign_column_value);
		}

		// Execute the query and return the result
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	function get_data_new($params = array())
	{
		// Set the SELECT part of the SQL query using the 'select' value from the $params array
		$this->db->select($params['select']);

		// Set the FROM part of the SQL query using the 'from' value from the $params array
		$this->db->from($params['from']);

		// Set the WHERE condition of the SQL query using the 'where' value from the $params array
		if (!empty($params['where'])) {
			$this->db->where($params['where']);
		}

		// If a 'limit' value is provided in the $params array, set the LIMIT part of the SQL query
		if (!empty($params['limit'])) {
			$this->db->limit($params['limit']);
		}

		// If an 'order_by' value is provided in the $params array, set the ORDER BY part of the SQL query
		if (!empty($params['order_by'])) {
			$this->db->order_by($params['order_by']);
		}

		// Execute the query and store the result in $query_get_list
		$query_get_list = $this->db->get();

		// Return the result of the query as an array of objects
		return $query_get_list->result();
	}


	/**
	 * Function to add a new record to the database which gives inserted record Id if success otherwise false
	 *
	 * @param array $params Associative array containing:
	 *                      - 'table': Table to insert into
	 *                      - 'data': Data to insert
	 * @return mixed Insert ID if successful, false otherwise
	 */
	//using
	function add_operation($params = array())
	{
		// Check if $params is empty, return false if true
		if (empty($params))
			return false;

		// Insert data into specified table
		$status = $this->db->insert($params['table'], $params['data']);

		// If insert is successful, get the insert ID
		if ($status) {
			$status = $this->db->insert_id();
		}

		// Return the status (insert ID or false)
		return $status;
	}


	/**
	 * Function to update an existing record in the database, if there are no params then it returns -1 if necessary params provided returns true or false based on update operation success and failure
	 * 
	 *
	 * @param array $params Associative array containing:
	 * 											- 'condition': Condition for the update
	 *                      - 'table': Table to update
	 *                      - 'data': Data to update
	 *                      
	 * @return bool True if update is successful, false otherwise
	 */
	//using
	function update_operation($params = array())
	{
		// Check if $params is empty, return -1 if true
		if (empty($params))
			return -1;

		// Set the WHERE condition for the update
		$this->db->where($params['condition']);

		// Update the specified table with the provided data
		$status = $this->db->update($params['table'], $params['data']);

		// Return the status (true if update is successful, false otherwise)
		return $status;
	}


	/**
	 * Function to delete a record from the database 
	 *
	 * @param array $params Associative array containing:
	 *                      - 'table': Table to delete from
	 *                      - 'where': Condition for the delete
	 * @return bool True if delete is successful, false otherwise
	 */
	//using
	function delete_operation($params = array())
	{
		// Set the WHERE condition for the delete
		$this->db->where($params['where']);

		// Delete the record from the specified table and store the status of the operation
		$status = $this->db->delete($params['table']);

		// Optionally, you can uncomment the next line to print the last executed query for debugging
		// echo $this->db->last_query();

		// Return the status (true if delete is successful, false otherwise)
		return $status;
	}
	/****************************************************************
	 *****************************************************************/




	/****************************************************************
	 * HELPERS			
	 *****************************************************************/

	/**
	 * Method to get client IP address
	 */
	//using
	function get_client_ip()
	{
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if (isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}


	function send_mail($params = array())
	{


		$timezone = new DateTimeZone("Asia/Kolkata");
		$date = new DateTime();
		$date->setTimezone($timezone);

		if (empty($params))
			return false;

		$template = $params['template'];
		$subject = $params['subject'];
		$to = $params['to'];
		$name = $params['name'];
		$to_name = $from_name = "Steel Age Building System";

		$entereddatamaillog['subject'] = $subject;
		$entereddatamaillog['template'] = $template;
		$entereddatamaillog['to'] = $to;
		$entereddatamaillog['added_on'] = date('Y-m-d H:i:s');

		// $from_email = __fromemail__;
		$address = $from_email = "clientnoreply@webdesigncompanybangalore.com";
		$from_name = _project_complete_name_;

		$mail = new PHPMailer();
		$mail->IsSMTP(true); // telling the class to use SMTP
		// sets the prefix to the servier
		//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host = "p3plzcpnl506980.prod.phx3.secureserver.net";      // sets GMAIL as the SMTP server
		$mail->Port = 465;
		// set the SMTP port for the GMAIL server
		$mail->Username = $from_email;  // GMAIL username
		$mail->Password = "Myworld@123#";
		$mail->SetFrom($from_email, $from_name);
		$address = $to;
		//$address =  "vinodh@marswebsolutions.com";
		//$address =  "admissions@pentagon-services.com";
		$mail->AddAddress($address, $from_name);
		$mail->AddReplyTo($to, $from_name);
		$mail->Subject = $subject;
		$mail->MsgHTML($template);
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
		$mail->AddBCC("abhishek.khandelwal@marswebsolution.com", $from_name);
		$mail->isHTML(true);                                  //Set email format to HTML
		//$mail->Body = $mailMessage;


		if (!empty($params['attachment'])) {
			$my_path = '';
			$my_path = _uploaded_files_ . "career_resume/" . $params['attachment'];
			// echo "my_path : $my_path";
			//$mail->AddAttachment($params['attachment']);
			$mail->AddAttachment($my_path);
			//echo "main_img : $main_img </br>";
			//$mail->AddAttachment($my_path);

		}

		if (!$mail->Send()) {

			$error_info = $mail->ErrorInfo;
			$mailMessageStatus = "OOPS !! Mail Delivery Failed. Please Try Again.";
			$message = "mailnotsent";
			$mail_status = 'Not Sent';
			$mailMessageStatus = "OOPS !! Mail Delivery Failed. Please Try Again."; //echo "Message delivery failed...";
			//$error_info=$mail->ErrorInfo;
			$msg = 'psfail';
			$entereddatamaillog['status'] = 2;
			$entereddatamaillog['error_info'] = $error_info;
		} else {

			$insertStatus = $this->add_operation(array('table' => 'enquiry', 'data' => $params['enquiry_input_data']));

			$mailMessageStatus = "sent";
			$message = "mailsent";
			$mail_status = 'Sent';
			$mailMessageStatus = "sent"; //echo "Message successfully sent!";
			$msg = 'psuccess';
			$entereddatamaillog['status'] = 1;
			$entereddatamaillog['error_info'] = '';
		}
		$insertStatus = $this->add_operation(array('table' => 'email_log', 'data' => $entereddatamaillog));

	}


	//using
	function send_mail_api($params = array())
	{
		$attachment1 = '';
		$template = $params['template'];
		$subject = $params['subject'];
		$to = $params['to'];

		//$to = "anubhav.gupta@marswebsolutions.com"; #to remove
		$name = $params['name'];

		if (isset($params['attachment_arr'])) {
			if (!empty($params['attachment_arr']))
				;
			$attachment = $params['attachment_arr'];
		}

		$entereddatamaillog['subject'] = $subject;
		$entereddatamaillog['template'] = $template;
		$entereddatamaillog['to'] = $to;
		$entereddatamaillog['added_on'] = date('Y-m-d H:i:s');

		$from_email = __from_email__;
		$from_name = _project_name_;

		$request = $error_info = "";
		$GATEWAYAPI = 'https://enterprise.webaroo.com/GatewayAPI/rest';
		$post_data['method'] = "EMS_POST_CAMPAIGN";
		$post_data['userid'] = __email_user_id__;
		$post_data['password'] = __email_user_password__;
		$post_data['recipients'] = $to;

		//	$post_data['cc'] = $params['bcc'];
		$post_data['email_id'] = $from_email;

		if (!empty($attachment)) {
			$attachment_count = 0;
			foreach ($attachment as $index => $a) {
				$attachment_count++;
				$filetype = "text/plain";
				$post_data['attachment' . $attachment_count] = new CurlFile($a['file'], $filetype, $a['name']);//$a['file'];
			}
		}

		$post_data['subject'] = $subject;
		//$post_data['content'] = $template;
		$post_data['content'] = urlencode($template);
		$post_data['content_type'] = "text/html";
		$post_data['name'] = $from_name;
		$post_data['v'] = "1.1";
		$post_data['check_duplicate_post'] = "true";
		/*foreach($post_data as $key=>$val) {
																																																																									$request.= $key."=".urlencode($val);
																																																																									$request.= "&";
																																																																									}	*/
		$request = substr($request, 0, strlen($request) - 1);

		/*$ch = curl_init();
																																																																									curl_setopt($ch, CURLOPT_URL, $GATEWAYAPI);
																																																																									curl_setopt($ch, CURLOPT_POST, 1);
																																																																									curl_setopt($ch, CURLOPT_HEADER, 0);
																																																																									curl_setopt($ch, CURLOPT_VERBOSE, 0);
																																																																									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
																																																																									curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
																																																																									if(curl_exec($ch) === false){*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $GATEWAYAPI);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


		$res = curl_exec($ch);
		if ($res === false) {
			$error_info = curl_error($ch);
			$mailMessageStatus = "OOPS !! Mail Delivery Failed. Please Try Again.";
			$message = "mailnotsent";
			$mail_status = 'Not Sent';
			$mailMessageStatus = "OOPS !! Mail Delivery Failed. Please Try Again."; //echo "Message delivery failed...";
			//$error_info=$mail->ErrorInfo;
			$msg = 'psfail';
			$entereddatamaillog['status'] = 2;
			$entereddatamaillog['error_info'] = $error_info;
		} else {
			$error_info = curl_error($ch);
			$mailMessageStatus = "sent";
			$message = "mailsent";
			$mail_status = 'Sent';
			$mailMessageStatus = "sent"; //echo "Message successfully sent!";
			$msg = 'psuccess';
			$entereddatamaillog['status'] = 1;
			$entereddatamaillog['error_info'] = $error_info;
			//$this->set_message('forgot_password_successful');
		}
		$entereddatamaillog['response'] = $res;

		//echo "Mail Status2 ".$mail_status;
		//print_r($res);
		curl_close($ch);
		//echo "Mail Status ".$mail_status;
		//exit;
		$id = $this->add_operation(array('table' => 'email_log', 'data' => $entereddatamaillog));

		return $mail_status;
	}


	//using
	function send_sms($mobile, $template)
	{
		$request = ""; //initialise the request variable
		$param['method'] = "sendMessage";
		$param['send_to'] = $mobile;
		$param['msg'] = $template;
		$param['loginid'] = __sms_user_id__;
		$param['password'] = __sms_user_password__;
		$param['v'] = "1.1";
		$param['msg_type'] = "TEXT"; //Can be "FLASH"/"UNICODE_TEXT"/"BINARY"
		$param['auth_scheme'] = "PLAIN";
		$param['override_dnd'] = "true";
		//Have to URL encode the values
		foreach ($param as $key => $val) {
			$request .= $key . "=" . urlencode($val);
			//we have to urlencode the values
			$request .= "&";
			//append the ampersand (&) sign after each parameter/value pair
		}
		$request = substr($request, 0, strlen($request) - 1);
		//remove final (&) sign from the request
		//echo $request; echo "</br>";
		$GATEWAYAPI = "http://tsms.marswebhosting.com/GatewayAPI/rest?" . $request;
		//echo $GATEWAYAPI; echo "</br>";
		//$ch = curl_init($GATEWAYAPI);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $GATEWAYAPI);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//$curl_scraped_page = curl_exec($ch);
		if (($res = curl_exec($ch)) === false) {

			$error_info = curl_error($ch);
			$smsMessageStatus = "OOPS !! SMS Delivery Failed. Please Try Again.";
			$message = "smsnotsent";
			$sms_status = false;
			$smsMessageStatus = "OOPS !! SMS Delivery Failed. Please Try Again."; //echo "Message delivery failed...";
			$msg = 'psfail';
			$entereddatasmslog['error_info'] = "2";
			$entereddatasmslog['status'] = 2;
			$entereddatasmslog['response'] = $res;
			//echo "response1 </br>";
			//print_r($res);
		} else {
			$smsMessageStatus = "sent";
			$message = "smssent";
			$sms_status = true;
			$smsMessageStatus = "sent"; //echo "Message successfully sent!";
			$msg = 'psuccess';
			$entereddatasmslog['error_info'] = 1;
			$entereddatasmslog['status'] = 1;
			$entereddatasmslog['response'] = $res;
			//echo "response2 </br>";
			//print_r($res);
			//$this->set_message('forgot_password_successful');

		}
		curl_close($ch);
		$entereddatasmslog['template'] = $template;
		$entereddatasmslog['to'] = $mobile;
		$entereddatasmslog['added_on'] = date('Y-m-d H:i:s');
		$entereddatasmslog['response'] = $res;

		$id = $this->add_operation(array('table' => 'sms_log', 'data' => $entereddatasmslog));
		//exit;
	}

	/****************************************************************
																																																																			
																																					****************************************************************/

	/****************************************************************
	 ****************************************************************
	 *****************************************************************/





	function check_screen()
	{
		$tablet_browser = 0;
		$mobile_browser = 0;

		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$tablet_browser++;
		}

		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}

		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}

		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
			'w3c ',
			'acs-',
			'alav',
			'alca',
			'amoi',
			'audi',
			'avan',
			'benq',
			'bird',
			'blac',
			'blaz',
			'brew',
			'cell',
			'cldc',
			'cmd-',
			'dang',
			'doco',
			'eric',
			'hipt',
			'inno',
			'ipaq',
			'java',
			'jigs',
			'kddi',
			'keji',
			'leno',
			'lg-c',
			'lg-d',
			'lg-g',
			'lge-',
			'maui',
			'maxo',
			'midp',
			'mits',
			'mmef',
			'mobi',
			'mot-',
			'moto',
			'mwbp',
			'nec-',
			'newt',
			'noki',
			'palm',
			'pana',
			'pant',
			'phil',
			'play',
			'port',
			'prox',
			'qwap',
			'sage',
			'sams',
			'sany',
			'sch-',
			'sec-',
			'send',
			'seri',
			'sgh-',
			'shar',
			'sie-',
			'siem',
			'smal',
			'smar',
			'sony',
			'sph-',
			'symb',
			't-mo',
			'teli',
			'tim-',
			'tosh',
			'tsm-',
			'upg1',
			'upsi',
			'vk-v',
			'voda',
			'wap-',
			'wapa',
			'wapi',
			'wapp',
			'wapr',
			'webc',
			'winw',
			'winw',
			'xda ',
			'xda-'
		);

		if (in_array($mobile_ua, $mobile_agents)) {
			$mobile_browser++;
		}

		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
			$mobile_browser++;
			//Check for tablets on opera mini alternative headers
			$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
				$tablet_browser++;
			}
		}

		if ($tablet_browser > 0) {
			// do something for tablet devices
			//print 'is tablet';
			return 'ismobile';
		} else if ($mobile_browser > 0) {
			// do something for mobile devices
			//print 'is mobile';
			return 'ismobile';
		} else {
			// do something for everything else
			//print 'is desktop';
			return 'isdesktop';
		}
	}










	function random_password($password_length = 8, $type = 'both')
	{
		if ($type == 'number')
			$alphabet = '1234567890';
		else if ($type == 'alphabet')
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		else
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$password = array();
		$alpha_length = strlen($alphabet) - 1;
		for ($i = 0; $i < $password_length; $i++) {
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password);
	}


	function get_max_position($id, $table_name, $where)
	{
		//$sql_get_maxID = $this->db->select_max($id,'max_id');

		$sql_get_maxID = $this->db->select_max($id, 'max_id');

		if ($table_name == 'product_image_position') {
			$sql_get_maxID = $this->db->where('product_id', $where);
			$query_get_maxID = $this->db->get($this->product_image_table_name);
		}

		if ($table_name == 'category_position') {
			$sql_get_maxID = $this->db->where('super_category_id', $where);
			$query_get_maxID = $this->db->get($this->category_table_name);
		}

		if ($table_name == 'attribute_position') {
			$sql_get_maxID = $this->db->where('product_attribute_id', $where);
			$query_get_maxID = $this->db->get($this->product_attribute_value_table_name);
		}
		//echo $this->db->last_query();
		if ($table_name == 'running_line_position') {
			$sql_get_maxID = $this->db->where('running_line_id', $where);
			$query_get_maxID = $this->db->get($this->running_line_table_name);
		}


		$row_get_maxID = $query_get_maxID->row();
		//$row_get_maxID = $query_get_maxID[0];
		$maxid = $row_get_maxID->max_id;
		if ($maxid == "")
			$maxid = 1;
		else
			$maxid = $maxid + 1;
		return $maxid;
	}











	///CURRENTLY NOT USING METHODS
	/****************************************************************
	 *SPECIFIC DB TABLE DATA OPERATIONS
	 *****************************************************************/


	/**
	 * Function to retrieve country data from the database
	 *
	 * @param array $params Optional parameters
	 * @return mixed Array containing country data if found, otherwise false
	 */
	//not using
	function get_country($params = array())
	{
		// Select specific columns from the 'country' table
		$this->db
			->select('c.id, c.country_name, c.country_short_name, c.country_code')
			->from('country as c')
			->where('status', 1); // Filter by status = 1 (assuming 1 represents active)

		// Execute the query
		$result = $this->db->get();

		// Check if there are rows returned
		if ($result->num_rows() > 0) {
			// If rows are found, retrieve the result as an array of objects
			$result = $result->result();
			// Optionally, you can remove the following line as it does not modify the result
			$result = $result;



			// Return the result
			return $result;
		} else {
			// If no rows are found, return false
			return false;
		}
	}
	/****************************************************************
	 ****************************************************************/

}

?>