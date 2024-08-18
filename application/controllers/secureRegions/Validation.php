<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once ("Main.php");
class Validation extends Main
{

	function __construct()
	{
		parent::__construct();

		//db
		$this->load->database();

		//libraries
		$this->load->library('session');
		$this->load->library('User_auth');


		//helpers
		$this->load->helper('url');

		//models
		$this->load->model('Common_model');
		$this->load->model('secureRegions/Admin_common_model');
		$this->load->model('secureRegions/Admin_model');

		//session data
		$session_auid = $this->data['session_auid'] = $this->session->userdata('session_auid');
		$this->data['session_auname'] = $this->session->userdata('session_auname');
		$this->data['session_auemail'] = $this->session->userdata('session_auemail');



		$this->data['User_auth_obj'] = new User_auth();
		$this->data['user_data'] = $this->data['User_auth_obj']->check_user_status();

	}

	/****************************************************************
	 *HELPERS
	 ****************************************************************/

	function unset_only()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
	}

	/****************************************************************
	 ****************************************************************/



	/****************************************************************
	 *  RELATED TO COMPANY PROFILE
	 ****************************************************************/
	//using
	// function isDuplicateCompanyUniqueName()
	// {
	// 	$company_unique_name = ''; // Initialize the company unique name variable
	// 	$company_profile_id = 0; // Initialize the company profile ID variable

	// 	// Check if company_unique_name is provided in the POST request
	// 	if (!empty($_POST['company_unique_name'])) {
	// 		$company_unique_name = trim($_POST['company_unique_name']); // Trim any whitespace and assign to variable
	// 	}

	// 	// Check if company_profile_id is provided in the POST request
	// 	if (!empty($_POST['company_profile_id'])) {
	// 		$company_profile_id = trim($_POST['company_profile_id']); // Trim any whitespace and assign to variable
	// 	}

	// 	// Construct the WHERE clause to check for duplicate company unique names
	// 	//The condition company_profile_id != $company_profile_id is used to ensure that the uniqueness check for the company unique name
	// 	// excludes the current record being updated. This is crucial in scenarios where you are editing an existing company profile and
	// 	// need to check if the new unique name you want to use already exists in other records, but you do not want to compare it against 
	// 	//the current record itself.
	// 	$where = "company_unique_name = '$company_unique_name' and company_profile_id != $company_profile_id";

	// 	$boolean_response = false; // Initialize boolean response as false
	// 	$message = "Company Name You Entered Does Not Exist In Database."; // Default message for non-existence
	// 	$numaric_response = 0; // Initialize numeric response as 0

	// 	// Query the database to check if the company unique name exists
	// 	$is_exist = $this->Common_model->get_data(array('select' => '*', 'from' => 'company_profile', 'where' => $where));

	// 	// If the company unique name exists in the database
	// 	if (!empty($is_exist)) {
	// 		$boolean_response = true; // Set boolean response to true
	// 		$message = "Company Name You Entered is Exist In Database. Please try Another."; // Update message for existence
	// 		$numaric_response = 1; // Set numeric response to 1
	// 	}

	// 	// Return the response as a JSON object
	// 	echo json_encode(array("boolean_response" => $boolean_response, "message" => $message, "numaric_response" => $numaric_response));
	// }


	function is_duplicate()
	{
		$target_column_name = '';
		$target_column_value = '';
		$primary_column_name = '';
		$primary_column_value = 0;
		$target_column_name_in_message = "";
		$table_name = "";


		// Check if company_unique_name is provided in the POST request
		if (!empty($_POST['target_column_name_in_message'])) {
			$target_column_name_in_message = trim($_POST['target_column_name_in_message']); // Trim any whitespace and assign to variable
		}
		// Check if company_unique_name is provided in the POST request
		if (!empty($_POST['target_column_name'])) {
			$target_column_name = trim($_POST['target_column_name']); // Trim any whitespace and assign to variable
		}
		if (!empty($_POST['target_column_value'])) {
			$target_column_value = trim($_POST['target_column_value']); // Trim any whitespace and assign to variable
		}

		// Check if company_profile_id is provided in the POST request
		if (!empty($_POST['primary_column_name'])) {
			$primary_column_name = trim($_POST['primary_column_name']); // Trim any whitespace and assign to variable
		}
		if (!empty($_POST['primary_column_value'])) {
			$primary_column_value = trim($_POST['primary_column_value']); // Trim any whitespace and assign to variable
		}

		if (!empty($_POST['table_name'])) {
			$table_name = trim($_POST['table_name']); // Trim any whitespace and assign to variable
		}

		// Construct the WHERE clause to check for duplicate company unique names
		//The condition company_profile_id != $company_profile_id is used to ensure that the uniqueness check for the company unique name
		// excludes the current record being updated. This is crucial in scenarios where you are editing an existing company profile and
		// need to check if the new unique name you want to use already exists in other records, but you do not want to compare it against 
		//the current record itself.
		$where = "$target_column_name = '$target_column_value' and $primary_column_name != $primary_column_value";

		$boolean_response = false; // Initialize boolean response as false
		$message = "$target_column_name_in_message You Entered Does Not Exist In Database."; // Default message for non-existence
		$numaric_response = 0; // Initialize numeric response as 0

		// Query the database to check if the company unique name exists
		$is_exist = $this->Common_model->get_data(array('select' => '*', 'from' => $table_name, 'where' => $where));

		// If the company unique name exists in the database
		if (!empty($is_exist)) {
			$boolean_response = true; // Set boolean response to true
			$message = "$target_column_name_in_message You Entered is Exist In Database. Please try Another."; // Update message for existence
			$numaric_response = 1; // Set numeric response to 1
		}

		// Return the response as a JSON object
		echo json_encode(array("boolean_response" => $boolean_response, "message" => $message, "numaric_response" => $numaric_response));
	}



	// //using
	// function isDuplicateCompanyEmail()
	// {
	// 	$email = ''; // Initialize the email variable as an empty string
	// 	$company_profile_id = 0; // Initialize the company profile ID variable as 0

	// 	// Check if the 'email' field is present in the POST request
	// 	if (!empty($_POST['email'])) {
	// 		$email = trim($_POST['email']); // Trim any whitespace from the email and assign it to the variable
	// 	}

	// 	// Check if the 'company_profile_id' field is present in the POST request
	// 	if (!empty($_POST['company_profile_id'])) {
	// 		$company_profile_id = trim($_POST['company_profile_id']); // Trim any whitespace from the company profile ID and assign it to the variable
	// 	}

	// 	// Construct the WHERE clause to check for duplicate emails, excluding the current record
	// 	$where = "email = '$email' and company_profile_id != $company_profile_id";

	// 	$boolean_response = false; // Initialize the boolean response as false
	// 	$message = "Company Email You Entered Does Not Exist In Database."; // Default message for non-existence
	// 	$numaric_response = 0; // Initialize the numeric response as 0

	// 	// Query the database to check if the email exists in the company_profile table
	// 	$is_exist = $this->Common_model->get_data(array('select' => '*', 'from' => 'company_profile', 'where' => $where));

	// 	// If the email exists in the database
	// 	if (!empty($is_exist)) {
	// 		$boolean_response = true; // Set the boolean response to true
	// 		$message = "Company Email You Entered is Exist In Database. Please try Another."; // Update the message for existence
	// 		$numaric_response = 1; // Set the numeric response to 1
	// 	}

	// 	// Return the response as a JSON object
	// 	echo json_encode(array("boolean_response" => $boolean_response, "message" => $message, "numaric_response" => $numaric_response));
	// }





}
