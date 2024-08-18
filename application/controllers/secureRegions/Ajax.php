<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once ("Main.php");
class Ajax extends Main
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
		// $this->load->model('secureRegions/Ajax_model');
		$this->load->model('Ajax_model');

		//session data
		$session_auid = $this->data['session_auid'] = $this->session->userdata('session_auid');
		$this->data['session_auname'] = $this->session->userdata('session_auname');
		$this->data['session_auemail'] = $this->session->userdata('session_auemail');
		$this->data['session_aurid'] = $this->session->userdata('session_aurid');
		$this->data['session_company_profile_id'] = $this->session->userdata('session_company_profile_id');



		$this->data['User_auth_obj'] = new User_auth();
		$this->data['user_data'] = $this->data['User_auth_obj']->check_user_status();
		$sess_left_nav = $this->session->flashdata('sess_left_nav');


		if (!empty($sess_left_nav)) {
			$this->session->set_flashdata('sess_left_nav', $sess_left_nav);
			$this->data['page_module_id'] = $sess_left_nav;
		}

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

	function saveTempImage()
	{
		$img = $_POST['image_data'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$img_path = _uploaded_files_ . "/temp/" . time() . ".png";
		file_put_contents($img_path, $data);
		echo json_encode(array("image_path" => $img_path));
	}

	/**
	 * Get HTML of select Dropdown of states and states data json
	 */
	//using
	function get_state()
	{
		// Initialize variables for state_id and country_id with default value '0'
		$state_id = $country_id = '0';

		// Check if 'country_id' is present in the POST request, if so, assign it to $country_id
		if (!empty($_POST['country_id'])) {
			$country_id = $_POST['country_id'];
		}

		// Check if 'state_id' is present in the POST request, if so, assign it to $state_id
		if (!empty($_POST['state_id'])) {
			$state_id = $_POST['state_id'];
		}

		// Query to get state data from the database for the given country_id
		$state_data = $this->Common_model->get_data(
			array(
				'select' => '*',
				'from' => 'state',
				'where' => "country_id = $country_id",
				"order_by" => "name ASC"
			)
		);

		// Initialize the result with the default option
		$result = '<option value="">Select State</option>';

		// Check if there is any state data retrieved
		if (!empty($state_data)) {
			// Loop through each state data
			foreach ($state_data as $r) {
				// Initialize variables for block status and selected option
				$if_block = $selected = '';

				// If the state_id matches the retrieved state_id, mark it as selected
				if ($r->id == $state_id) {
					$selected = "selected";
				}

				// If the state status is not active (status != 1), mark it as blocked
				if ($r->status != 1) {
					$if_block = " [Block]";
				}

				// Append the state option to the result string with the state name and block status if applicable
				$result .= '<option value="' . $r->id . '" ' . $selected . '>' . $r->name . $if_block . '</option>';
			}
		}

		// Return the result as a JSON response with the state options and state data
		echo json_encode(array("state_html" => $result, "state_json" => $state_data));
	}


	/**
	 * Get HTML json of select Dropdown of cities and cities data json
	 */
	//using
	function get_city()
	{
		$state_id = $city_id = '0';
		if (!empty($_POST['city_id'])) {
			$city_id = $_POST['city_id'];
		}
		if (!empty($_POST['state_id'])) {
			$state_id = $_POST['state_id'];
		}

		$city_data = $this->Common_model->get_data(array('select' => '*', 'from' => 'city', 'where' => "state_id = $state_id", "order_by" => "name ASC"));
		$result = '<option value="">Select City</option>';
		if (!empty($city_data)) {
			foreach ($city_data as $r) {
				$if_block = $selected = '';
				if ($r->id == $city_id) {
					$selected = "selected";
				}
				if ($r->status != 1) {
					$if_block = " [Block]";
				}
				$result .= '<option value="' . $r->id . '" ' . $selected . '>' . $r->name . $if_block . '</option>';
			}
		}
		echo json_encode(array("city_html" => $result, "city_json" => $city_data));
	}



	function get_property_sub_type()
	{
		$property_type_id = $property_sub_type_id = '0';
		if (!empty($_POST['property_sub_type_id'])) {
			$property_sub_type_id = $_POST['property_sub_type_id'];
		}
		if (!empty($_POST['property_type_id'])) {
			$property_type_id = $_POST['property_type_id'];
		}

		$property_sub_type_data = $this->Common_model->get_data(
			array(
				'select' => '*',
				'from' => 'property_sub_type',
				'where' => "property_type_id = $property_type_id",
				"order_by" => "name ASC"
			)
		);
		$result = '<option value="">Select Property_sub_type</option>';
		if (!empty($property_sub_type_data)) {
			foreach ($property_sub_type_data as $item) {
				$if_block = $selected = '';
				if ($item->id == $property_sub_type_id) {
					$selected = "selected";
				}
				if ($item->status != 1) {
					$if_block = " [Block]";
				}
				$result .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->name . $if_block . '</option>';
			}
		}
		echo json_encode(array("property_sub_type_html" => $result, "property_sub_type_json" => $property_sub_type_data));
	}



	function get_dropdown()
	{

		$primary_column_name = "";
		$primary_column_value = 0;
		$foreign_column_name = "";
		$foreign_column_value = 0;
		$showable_column_name = "";
		$table_name = "";
		$select_title = "";

		if (!empty($_POST['primary_column_name'])) {
			$primary_column_name = $_POST['primary_column_name'];
		}
		if (!empty($_POST['primary_column_value'])) {
			$primary_column_value = $_POST['primary_column_value'];
		}
		if (!empty($_POST['foreign_column_name'])) {
			$foreign_column_name = $_POST['foreign_column_name'];
		}
		if (!empty($_POST['foreign_column_value'])) {
			$foreign_column_value = $_POST['foreign_column_value'];
		}
		if (!empty($_POST['showable_column_name'])) {
			$showable_column_name = $_POST['showable_column_name'];
		}
		if (!empty($_POST['table_name'])) {
			$table_name = $_POST['table_name'];
		}
		if (!empty($_POST['select_title'])) {
			$select_title = $_POST['select_title'];
		}

		// $dropdown_data = $this->Common_model->get_data(array('select' => '*', 'from' => '' . $table_name . '', 'where' => "$foreign_column_name = $foreign_column_value", "order_by" => '' . $showable_column_name . ' ASC'));

		// $dropdown_data = $this->Common_model->get_data_new(
		// 	array(
		// 		'select' => '*',
		// 		'from' => 'property_sub_type',
		// 		'where' => array($foreign_column_name => $foreign_column_value),
		// 		'order_by' => $showable_column_name . ' ASC'
		// 	)
		// );

		$dropdown_data = $this->Common_model->get_dropdown_data(
			array(
				"table_name" => $table_name,
				"foreign_column_name" => $foreign_column_name,
				"foreign_column_value" => $foreign_column_value,
				"showable_column_name" => $showable_column_name
			)
		);

		$result = '<option value="">' . $select_title . '</option>';
		if (!empty($dropdown_data)) {
			foreach ($dropdown_data as $item) {
				$if_block = $selected = '';
				if ($item->$primary_column_name == $primary_column_value) {
					$selected = "selected";
				}
				if ($item->status != 1) {
					$if_block = " [Block]";
				}
				$result .= '<option value="' . $item->$primary_column_name . '" ' . $selected . '>' . $item->$showable_column_name . $if_block . '</option>';
			}
		}


		echo json_encode(array("dropdown_html" => $result, "dropdown_json" => $dropdown_data));
	}

	function del_employee_file()
	{
		$admin_user_file_id = $_POST['admin_user_file_id'];
		$file_data = $this->Common_model->get_data(array('select' => '*', 'from' => 'admin_user_file', 'where' => "id = $admin_user_file_id"));
		if (!empty($file_data)) {
			$file_data = $file_data[0];
			unlink("assets/uploads/admin_user_file/" . $file_data->file_name);
			$this->Common_model->delete_operation(array('table' => 'admin_user_file', 'where' => "id = $admin_user_file_id"));
		}
	}




	function del_any_file()
	{
		$table_name = $_POST['table_name'];
		$id_column = $_POST['id_column'];
		$id = $_POST['id'];
		$folder_name = $_POST['folder_name'];
		$file_data = $this->Common_model->get_data(array('select' => '*', 'from' => $table_name, 'where' => "$id_column = $id"));
		if (!empty($file_data)) {
			$file_data = $file_data[0];
			unlink("assets/uploads/" . $folder_name . "/" . $file_data->file_name);
			$this->Common_model->delete_operation(array('table' => $table_name, 'where' => "$id_column = $id"));
		}

	}






	function del_any_record()
	{
		$table_name = $_POST['table_name'];
		$id_column = $_POST['id_column'];
		$id = $_POST['id'];
		$file_data = $this->Common_model->get_data(array('select' => '*', 'from' => $table_name, 'where' => "$id_column = $id"));
		if (!empty($file_data)) {
			$file_data = $file_data[0];
			$this->Common_model->delete_operation(array('table' => $table_name, 'where' => "$id_column = $id"));
		}

	}




}
