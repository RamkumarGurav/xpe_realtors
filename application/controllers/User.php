<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');


include_once('Main.php');
class User extends Main
{

  public function __construct()
  {
    parent::__construct();

    //models
    $this->load->model('Common_model');
    $this->load->model('User_model');


    //headers
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");

  }





  public function index()
  {

    $this->data['meta_title'] = _project_name_ . "| Home";
    $this->data['meta_description'] = _project_name_ . "| Home";
    $this->data['meta_keywords'] = _project_name_ . "| Home";
    $this->data['meta_others'] = "";



    $search['limit'] = 10;
    $search['is_display'] = 1;
    $search['record_status'] = 1;

    // $search['search_for'] = "count";

    $this->data['property_data'] = $this->User_model->get_property_data(
      $search
    );


    $this->data['property_data_carousel'] = array_slice($this->data['property_data'], 0, 10);



    // $this->data['direct_css'] = array(
    //   'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    //   'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
    //   'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',

    // );//

    // $this->data['direct_js'] = array(
    //   'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js',
    //   'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js',
    //   "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js",

    // );//, 'js/all-scripts.js'
    // $this->data['js'] = array("js/home.js", );//, 'js/all-scripts.js'


    parent::get_header('header', $this->data);
    $this->load->view('home', $this->data);
    parent::get_footer('footer', $this->data);
  }



  function search_results()
  {


    $this->data['meta_title'] = "Search Results" . _project_name_;
    $this->data['meta_description'] = "Search Results" . _project_name_;
    $this->data['meta_keywords'] = "Search Results" . _project_name_;
    $this->data['meta_others'] = "";






    $search = array();
    $search_keyword = '';
    $field_name = '';
    $field_value = '';

    $start_date = '';
    $end_date = '';


    $property_type_id = 0;


    $property_sub_type_id = 0;
    $property_age_id = 0;


    $state_id = "";
    $city_id = "";
    $location_id = "";

    $sale_type = "";
    $sale_duration_type = "";
    $start_sale_amount = "";
    $end_sale_amount = "";

    $bhk_type_id = 0;
    $plot_facing_type_id = 0;
    $door_facing_type_id = 0;
    $plot_dimension_sqft = "";
    $built_up_area = "";
    $in_acres = "";
    $in_guntas = "";
    $gated_community_type_id = 0;



    $is_load_more = "";
    $offset = "";
    $limit = "";

    $is_negotiable = "";
    $is_display = 1;
    $record_status = 1;





    if (!empty($_REQUEST['search_keyword']))
      $search_keyword = $_REQUEST['search_keyword'];
    else if (!empty($search_keyword))
      $search_keyword = $search_keyword;




    if (!empty($_REQUEST['field_name']))
      $field_name = $_REQUEST['field_name'];
    else if (!empty($field_name))
      $field_name = $field_name;
    if (!empty($_REQUEST['field_value']))
      $field_value = $_REQUEST['field_value'];
    else if (!empty($field_value))
      $field_value = $field_value;



    if (!empty($_REQUEST['start_date']))
      $start_date = $_REQUEST['start_date'];
    if (!empty($_REQUEST['end_date']))
      $end_date = $_REQUEST['end_date'];


    if (!empty($_GET['p_type'])) {
      $property_type_id = $_GET['p_type'];
    }

    if (!empty($_REQUEST['property_type_id']))
      $property_type_id = $_REQUEST['property_type_id'];

    if (!empty($_REQUEST['property_sub_type_id']))
      $property_sub_type_id = $_REQUEST['property_sub_type_id'];

    if (!empty($_REQUEST['property_age_id']))
      $property_age_id = $_REQUEST['property_age_id'];



    if (!empty($_REQUEST['state_id']))
      $state_id = $_REQUEST['state_id'];
    if (!empty($_REQUEST['city_id']))
      $city_id = $_REQUEST['city_id'];
    if (!empty($_REQUEST['location_id']))
      $location_id = $_REQUEST['location_id'];





    if (!empty($_REQUEST['sale_type']))
      $sale_type = $_REQUEST['sale_type'];
    if (!empty($_REQUEST['sale_duration_type']))
      $sale_duration_type = $_REQUEST['sale_duration_type'];
    if (!empty($_REQUEST['start_sale_amount']))
      $start_sale_amount = $_REQUEST['start_sale_amount'];
    if (!empty($_REQUEST['end_sale_amount']))
      $end_sale_amount = $_REQUEST['end_sale_amount'];



    if (!empty($_REQUEST['bhk_type_id']))
      $bhk_type_id = $_REQUEST['bhk_type_id'];
    if (!empty($_REQUEST['plot_facing_type_id']))
      $plot_facing_type_id = $_REQUEST['plot_facing_type_id'];
    if (!empty($_REQUEST['door_facing_type_id']))
      $door_facing_type_id = $_REQUEST['door_facing_type_id'];
    if (!empty($_REQUEST['plot_dimension_sqft']))
      $plot_dimension_sqft = $_REQUEST['plot_dimension_sqft'];
    if (!empty($_REQUEST['built_up_area']))
      $built_up_area = $_REQUEST['built_up_area'];
    if (!empty($_REQUEST['in_acres']))
      $in_acres = $_REQUEST['in_acres'];
    if (!empty($_REQUEST['in_guntas']))
      $in_guntas = $_REQUEST['in_guntas'];
    if (!empty($_REQUEST['gated_community_type_id']))
      $gated_community_type_id = $_REQUEST['gated_community_type_id'];



    $offset = 0;
    $limit = 10;

    if (!empty($_REQUEST['is_negotiable']))
      $is_negotiable = $_REQUEST['is_negotiable'];







    $this->data['search_keyword'] = $search_keyword;
    $this->data['field_name'] = $field_name;
    $this->data['field_value'] = $field_value;

    $this->data['start_date'] = $start_date;
    $this->data['end_date'] = $end_date;


    $this->data['property_type_id'] = $property_type_id;
    $this->data['property_sub_type_id'] = $property_sub_type_id;
    $this->data['property_age_id'] = $property_age_id;

    $this->data['state_id'] = $state_id;
    $this->data['city_id'] = $city_id;
    $this->data['location_id'] = $location_id;


    $this->data['sale_type'] = $sale_type;
    $this->data['sale_duration_type'] = $sale_duration_type;
    $this->data['start_sale_amount'] = $start_sale_amount;
    $this->data['end_sale_amount'] = $end_sale_amount;

    $this->data['bhk_type_id'] = $bhk_type_id;
    $this->data['plot_facing_type_id'] = $plot_facing_type_id;
    $this->data['door_facing_type_id'] = $door_facing_type_id;
    $this->data['plot_dimension_sqft'] = $plot_dimension_sqft;
    $this->data['built_up_area'] = $built_up_area;
    $this->data['in_acres'] = $in_acres;
    $this->data['in_guntas'] = $in_guntas;
    $this->data['gated_community_type_id'] = $gated_community_type_id;



    $this->data['offset'] = $offset;
    $this->data['limit'] = $limit;



    $this->data['is_negotiable'] = $is_negotiable;
    $this->data['is_display'] = $is_display;
    $this->data['record_status'] = $record_status;


    $this->session->set_userdata("input_data", $this->data);




    $search['search_keyword'] = $search_keyword;
    $search['field_name'] = $field_name;
    $search['field_value'] = $field_value;

    $search['start_date'] = $start_date;
    $search['end_date'] = $end_date;


    $search['property_type_id'] = $property_type_id;
    $search['property_sub_type_id'] = $property_sub_type_id;
    $search['property_age_id'] = $property_age_id;

    $search['state_id'] = $state_id;
    $search['city_id'] = $city_id;
    $search['location_id'] = $location_id;


    $search['sale_type'] = $sale_type;
    $search['sale_duration_type'] = $sale_duration_type;
    $search['start_sale_amount'] = $start_sale_amount;
    $search['end_sale_amount'] = $end_sale_amount;

    $search['bhk_type_id'] = $bhk_type_id;
    $search['plot_facing_type_id'] = $plot_facing_type_id;
    $search['door_facing_type_id'] = $door_facing_type_id;
    $search['plot_dimension_sqft'] = $plot_dimension_sqft;
    $search['built_up_area'] = $built_up_area;
    $search['in_acres'] = $in_acres;
    $search['in_guntas'] = $in_guntas;
    $search['gated_community_type_id'] = $gated_community_type_id;

    $search['offset'] = $offset;
    $search['limit'] = $limit;


    $search['is_negotiable'] = $is_negotiable;
    $search['is_display'] = 1;
    $search['record_status'] = 1;



    // $search['search_for'] = "count";

    $this->data['property_data'] = $this->User_model->get_property_data(
      $search
    );





    $this->data['state_data'] = $this->Common_model->get_data(array('select' => '*', 'from' => 'state', 'where' => "id > 0 and status = 1 and is_display=1", "order_by" => "name ASC"));
    $this->data['city_data'] = $this->Common_model->get_data(array('select' => '*', 'from' => 'city', 'where' => "id > 0 and status = 1 and is_display=1", "order_by" => "name ASC"));
    $this->data['location_data'] = $this->Common_model->get_data(array('select' => '*', 'from' => 'location', 'where' => "id > 0 and status = 1 and is_display=1", "order_by" => "name ASC"));
    $this->data['property_type_data'] = $this->Common_model->get_data(array('select' => '*', 'from' => 'property_type', 'where' => "id > 0 and status = 1", "order_by" => "name ASC"));




    parent::get_header('header', $this->data);
    $this->load->view('search_results', $this->data);
    parent::get_footer('footer', $this->data);
  }



  function load_more_property()
  {

    $search = array();
    $search_keyword = '';
    $field_name = '';
    $field_value = '';

    $start_date = '';
    $end_date = '';


    $property_type_id = "";


    $property_sub_type_id = "";
    $property_age_id = "";


    $state_id = "";
    $city_id = "";
    $location_id = "";

    $sale_type = "";
    $sale_duration_type = "";
    $start_sale_amount = "";
    $end_sale_amount = "";

    $bhk_type_id = "";
    $plot_facing_type_id = "";
    $door_facing_type_id = "";
    $plot_dimension_sqft = "";
    $built_up_area = "";
    $in_acres = "";
    $in_guntas = "";
    $gated_community_type_id = "";



    $offset = "";
    $limit = "";

    $is_negotiable = "";
    $is_display = 1;
    $record_status = 1;




    if (!empty($_REQUEST['search_keyword']))
      $search_keyword = $_REQUEST['search_keyword'];
    else if (!empty($search_keyword))
      $search_keyword = $search_keyword;


    if (!empty($_REQUEST['field_name']))
      $field_name = $_REQUEST['field_name'];
    else if (!empty($field_name))
      $field_name = $field_name;
    if (!empty($_REQUEST['field_value']))
      $field_value = $_REQUEST['field_value'];
    else if (!empty($field_value))
      $field_value = $field_value;



    if (!empty($_REQUEST['start_date']))
      $start_date = $_REQUEST['start_date'];
    if (!empty($_REQUEST['end_date']))
      $end_date = $_REQUEST['end_date'];


    if (!empty($_REQUEST['p_type'])) {
      $property_type_id = $_REQUEST['p_type'];
    }
    if (!empty($_REQUEST['property_type_id']))
      $property_type_id = $_REQUEST['property_type_id'];
    if (!empty($_REQUEST['property_sub_type_id']))
      $property_sub_type_id = $_REQUEST['property_sub_type_id'];
    if (!empty($_REQUEST['property_age_id']))
      $property_age_id = $_REQUEST['property_age_id'];



    if (!empty($_REQUEST['state_id']))
      $state_id = $_REQUEST['state_id'];
    if (!empty($_REQUEST['city_id']))
      $city_id = $_REQUEST['city_id'];
    if (!empty($_REQUEST['location_id']))
      $location_id = $_REQUEST['location_id'];





    if (!empty($_REQUEST['sale_type']))
      $sale_type = $_REQUEST['sale_type'];
    if (!empty($_REQUEST['sale_duration_type']))
      $sale_duration_type = $_REQUEST['sale_duration_type'];
    if (!empty($_REQUEST['start_sale_amount']))
      $start_sale_amount = $_REQUEST['start_sale_amount'];
    if (!empty($_REQUEST['end_sale_amount']))
      $end_sale_amount = $_REQUEST['end_sale_amount'];



    if (!empty($_REQUEST['bhk_type_id']))
      $bhk_type_id = $_REQUEST['bhk_type_id'];
    if (!empty($_REQUEST['plot_facing_type_id']))
      $plot_facing_type_id = $_REQUEST['plot_facing_type_id'];
    if (!empty($_REQUEST['door_facing_type_id']))
      $door_facing_type_id = $_REQUEST['door_facing_type_id'];
    if (!empty($_REQUEST['plot_dimension_sqft']))
      $plot_dimension_sqft = $_REQUEST['plot_dimension_sqft'];
    if (!empty($_REQUEST['built_up_area']))
      $built_up_area = $_REQUEST['built_up_area'];
    if (!empty($_REQUEST['in_acres']))
      $in_acres = $_REQUEST['in_acres'];
    if (!empty($_REQUEST['in_guntas']))
      $in_guntas = $_REQUEST['in_guntas'];
    if (!empty($_REQUEST['gated_community_type_id']))
      $gated_community_type_id = $_REQUEST['gated_community_type_id'];





    $limit = 10;
    if (!empty($_REQUEST['offset']))
      $offset = $_REQUEST['offset'];


    if (!empty($_REQUEST['is_negotiable']))
      $is_negotiable = $_REQUEST['is_negotiable'];








    $this->data['search_keyword'] = $search_keyword;
    $this->data['field_name'] = $field_name;
    $this->data['field_value'] = $field_value;

    $this->data['start_date'] = $start_date;
    $this->data['end_date'] = $end_date;


    $this->data['property_type_id'] = $property_type_id;
    $this->data['property_sub_type_id'] = $property_sub_type_id;
    $this->data['property_age_id'] = $property_age_id;

    $this->data['state_id'] = $state_id;
    $this->data['city_id'] = $city_id;
    $this->data['location_id'] = $location_id;


    $this->data['sale_type'] = $sale_type;
    $this->data['sale_duration_type'] = $sale_duration_type;
    $this->data['start_sale_amount'] = $start_sale_amount;
    $this->data['end_sale_amount'] = $end_sale_amount;

    $this->data['bhk_type_id'] = $bhk_type_id;
    $this->data['plot_facing_type_id'] = $plot_facing_type_id;
    $this->data['door_facing_type_id'] = $door_facing_type_id;
    $this->data['plot_dimension_sqft'] = $plot_dimension_sqft;
    $this->data['built_up_area'] = $built_up_area;
    $this->data['in_acres'] = $in_acres;
    $this->data['in_guntas'] = $in_guntas;
    $this->data['gated_community_type_id'] = $gated_community_type_id;


    $this->data['offset'] = $offset;
    $this->data['limit'] = $limit;


    $this->data['is_negotiable'] = $is_negotiable;

    $search['search_keyword'] = $search_keyword;
    $search['field_name'] = $field_name;
    $search['field_value'] = $field_value;

    $search['start_date'] = $start_date;
    $search['end_date'] = $end_date;


    $search['property_type_id'] = $property_type_id;
    $search['property_sub_type_id'] = $property_sub_type_id;
    $search['property_age_id'] = $property_age_id;

    $search['state_id'] = $state_id;
    $search['city_id'] = $city_id;
    $search['location_id'] = $location_id;


    $search['sale_type'] = $sale_type;
    $search['sale_duration_type'] = $sale_duration_type;
    $search['start_sale_amount'] = $start_sale_amount;
    $search['end_sale_amount'] = $end_sale_amount;

    $search['bhk_type_id'] = $bhk_type_id;
    $search['plot_facing_type_id'] = $plot_facing_type_id;
    $search['door_facing_type_id'] = $door_facing_type_id;
    $search['plot_dimension_sqft'] = $plot_dimension_sqft;
    $search['built_up_area'] = $built_up_area;
    $search['in_acres'] = $in_acres;
    $search['in_guntas'] = $in_guntas;
    $search['gated_community_type_id'] = $gated_community_type_id;

    $search['offset'] = $offset;
    $search['limit'] = $limit;

    $search['is_negotiable'] = $is_negotiable;
    $search['is_display'] = 1;
    $search['record_status'] = 1;




    // $search['search_for'] = "count";

    $this->data['property_data'] = $this->User_model->get_property_data(
      $search
    );




    // if (count($this->data['property_data']) > 0) {
    //   echo json_encode($this->load->view('template/load_more_property', $this->data));
    // } else {
    //   echo 'NO';
    // }

    echo json_encode($this->data['property_data']);
  }

  function add_input_fields()
  {


    $this->data = $this->session->userdata('input_data');



    $selected_property_type_id = 0;
    if (!empty($_REQUEST['selected_property_type_id'])) {
      $selected_property_type_id = $_REQUEST['selected_property_type_id'];
    }

    // if (!empty($_REQUEST['property_sub_type_id'])) {
    //   $property_sub_type_id = $_REQUEST['property_sub_type_id'];
    // }
    // if (!empty($_REQUEST['bhk_type_id'])) {
    //   $bhk_type_id = $_REQUEST['bhk_type_id'];
    // }
    // if (!empty($_REQUEST['plot_facing_type_id'])) {
    //   $plot_facing_type_id = $_REQUEST['plot_facing_type_id'];
    // }
    // if (!empty($_REQUEST['door_facing_type_id'])) {
    //   $door_facing_type_id = $_REQUEST['door_facing_type_id'];
    // }
    // if (!empty($_REQUEST['gated_community_type_id'])) {
    //   $gated_community_type_id = $_REQUEST['gated_community_type_id'];
    // }

    $this->data['selected_property_type_id'] = $selected_property_type_id;
    // $this->data['property_sub_type_id'] = $property_sub_type_id;
    // $this->data['bhk_type_id'] = $bhk_type_id;
    // $this->data['plot_facing_type_id'] = $plot_facing_type_id;
    // $this->data['door_facing_type_id'] = $door_facing_type_id;
    // $this->data['gated_community_type_id'] = $gated_community_type_id;




    $this->data['property_age_data'] = $this->Common_model->get_data(array(
      'select' => '*',
      'from' => 'property_age',
      'where' => "id > 0 and status = 1",
      "order_by" => "name ASC"
    ));
    $this->data['facing_type_data'] = $this->Common_model->get_data(array(
      'select' => '*',
      'from' => 'facing_type',
      'where' => "id > 0 and status = 1",
      "order_by" => "name ASC"
    ));
    $this->data['bhk_type_data'] = $this->Common_model->get_data(array(
      'select' => '*',
      'from' => 'bhk_type',
      'where' => "id > 0 and status = 1",
      "order_by" => "name ASC"
    ));
    $this->data['gated_community_type_data'] = $this->Common_model->get_data(array('select' => '*', 'from' => 'gated_community_type ', 'where' => "id > 0 and status = 1", "order_by" => "name ASC"));



    $html_data = $this->load->view('template/add_input_fields', $this->data, true);

    echo json_encode(array("html_data" => $html_data));

    die;
  }



  function property_details($property_slug = "")
  {




    $search['slug_url'] = $property_slug;
    $search['is_display'] = 1;
    $search['record_status'] = 1;
    $search['details'] = 1;

    // $search['search_for'] = "count";

    $this->data['property_data'] = $this->User_model->get_property_data(
      $search
    );

    if (!empty(count($this->data['property_data']))) {
      $this->data['property_data'] = $this->data['property_data'][0];

      $this->data['meta_title'] = $this->data['property_data']->name . " | Pe Realtors";
      $this->data['meta_description'] = $this->data['property_data']->meta_description . "- Pe Realtors";
      $this->data['meta_keywords'] = $this->data['property_data']->meta_keyword . " - Pe Realtors";
      $this->data['meta_others'] = "";
    }





    parent::get_header('header', $this->data);
    $this->load->view('property_details', $this->data);
    parent::get_footer('footer', $this->data);
  }


  function host_captcha_validation()
  {
    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }

        // $host='steelagebuildingsystem.com';
        $host = _mainsite_host_;

        if ($page_host != $host) {
          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          echo "<script>location.href='error'</script>";
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        echo "<script>location.href='error'</script>";
        die();
      }

      $request = '';


      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';
          echo "<script>location.href='error'</script>";
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        echo "<script>location.href='error'</script>";
        die();
      }
    }

  }




  function do_enquiry()
  {


    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    $this->host_captcha_validation();



    //exit;
    if (
      !empty($_POST['enq_type']) && !empty($_POST['name_contact_us']) && !empty($_POST['email_contact_us'])
      && !empty($_POST['contact_contact_us']) && !empty($_POST['message_contact_us']) && !empty($_POST['service_contact_us'])
      && !empty($_POST['consent_contact_us'])
      && $_SERVER['REQUEST_METHOD'] == 'POST'
    ) {
      //echo "2";
      if (isset($_POST['message_contact_us']) && !empty($_POST['message_contact_us'])) {
        if (preg_match('/http|www/i', $_POST['message_contact_us'])) {
          echo '<script language="javascript">';
          echo 'alert("Something Went Wrong! Please try again.")';
          echo '</script>';
          echo "<script>location.href='error'</script>";
          die();
        }
      }

      $full_name = '';
      if (isset($_POST['name_contact_us']) && !empty($_POST['name_contact_us'])) {
        $enquiry_input_data['name'] = $full_name = trim($_POST['name_contact_us']);
      }

      $pagelink = '';
      if (isset($_POST['pagelink']) && !empty($_POST['pagelink'])) {
        $pagelink = trim($_POST['pagelink']);
      }

      $email = '';
      if (isset($_POST['email_contact_us']) && !empty($_POST['email_contact_us'])) {
        $enquiry_input_data['email'] = $email = trim($_POST['email_contact_us']);
      }

      $contact = '';
      if (isset($_POST['contact_contact_us']) && !empty($_POST['contact_contact_us'])) {
        $enquiry_input_data['contactno'] = $contact = trim($_POST['contact_contact_us']);
      }

      $service = '';
      if (isset($_POST['service_contact_us']) && !empty($_POST['service_contact_us'])) {
        $enquiry_input_data['service'] = $service = trim($_POST['service_contact_us']);
      }



      $message = '';
      if (isset($_POST['message_contact_us']) && !empty($_POST['message_contact_us'])) {
        $enquiry_input_data['message'] = $message = trim($_POST['message_contact_us']);
      }

      $consent = '';
      if (isset($_POST['consent_contact_us']) && !empty($_POST['consent_contact_us'])) {
        $enquiry_input_data['is_consent'] = $consent = trim($_POST['consent_contact_us']);
      }

      $enquiry_input_data['added_on'] = date("Y-m-d H:i:s");

      $ip_address = $this->Common_model->get_client_ip();
      $date = date('D dS M, Y h:i a');

      $mailMessage = file_get_contents(APPPATH . 'mailer/enquiry.html');
      $mailMessage = preg_replace('/\\\\/', '', $mailMessage); //Strip backslashes
      $mailMessage = str_replace("#enq_date#", stripslashes($date), $mailMessage);
      $mailMessage = str_replace("#name#", stripslashes($full_name), $mailMessage);
      $mailMessage = str_replace("#contact#", stripslashes($contact), $mailMessage);
      $mailMessage = str_replace("#email#", stripslashes($email), $mailMessage);
      $mailMessage = str_replace("#service#", stripslashes($service), $mailMessage);
      $mailMessage = str_replace("#ip_address#", stripslashes($ip_address), $mailMessage);
      $mailMessage = str_replace("#message#", stripslashes($message), $mailMessage);
      $mailMessage = str_replace("#page_url#", stripslashes($pagelink), $mailMessage);
      $mailMessage = str_replace("#mainsite#", MAINSITE, $mailMessage);
      $mailMessage = str_replace("#company_name#", _project_complete_name_, $mailMessage);





      $to_name = $from_name = "Pe Realtors";
      $subject = "New Inquiry From www.perealtors.com";
      if ($_POST['enq_type'] == 'career') {
        $subject = "New Career Contact Inquiry - " . $from_name;
      }
      $address = $from_email = "noreply@perealtors.com";
      $to = "pe@perealtors.com";
      // $to = "ramkumarsgurav@gmail.com";

      $mailStatus = $this->Common_model->send_mail(array(
        "template" => $mailMessage,
        "subject" => $subject,
        "to" => "$to",
        "name" => $to_name,
        "enquiry_input_data" => $enquiry_input_data
      ));



      //exit;
      $_SESSION['is_thank_you_page'] = 1;
      $location = MAINSITE . 'thank-you';

      //header('Location: '.$location);
      //exit;
      echo "<script>location.href='{$location}'</script>";
      die();
    } else {
      $_SESSION['is_error_page'] = 1;
      echo "<script>location.href='error'</script>";
      die();
    }






  }




  function n_digit_random($digits)
  {
    return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
  }


  function ajax_insert_enquiry()
  {
    $page = trim($_POST['page']);

    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    exit;
    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {

          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          REDIRECT(MAINSITE . $page);
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        REDIRECT(MAINSITE . $page);
        die();
      }



      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';
          REDIRECT(MAINSITE . $page);
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        REDIRECT(MAINSITE . $page);
        die();
      }
    }


    $enter_data['name'] = trim($_POST['name']);
    $enter_data['contactno'] = trim($_POST['contactno']);
    $enter_data['email'] = trim($_POST['email']);
    $enter_data['subject'] = trim($_POST['subject']);
    $enter_data['description'] = trim($_POST['description']);
    $enter_data['status'] = 1;

    $enter_data['added_on'] = date("Y-m-d H:i:s");

    $enquiry_result = $insertStatus = $this->Common_model->add_operation(array('table' => 'enquiry', 'data' => $enter_data));

    $response['message'] = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-ban"></i> Something went wrong. Please try again.
    </div>';

    if (!empty($enquiry_result)) {

      // $this->send_email_for_enquiry($enter_data);
      //   $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible">
      // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      // <i class="icon fas fa-check"></i>Thank You.
      // </div>');
      //redirect to thank you page
      REDIRECT(MAINSITE . "/thank-you");
      exit;
    } else {
      //redirect to the same page
      REDIRECT(MAINSITE . $page);
    }

  }




























  public function clients()
  {
    $this->data['meta_title'] = _project_name_ . " - Clients";
    $this->data['meta_description'] = _project_name_ . " - Clients";
    $this->data['meta_keywords'] = _project_name_ . " - Clients";
    $this->data['meta_others'] = "";

    parent::get_header('header', $this->data);
    $this->load->view('clients', $this->data);
    parent::get_footer('footer', $this->data);
  }


  public function about_us()
  {
    $this->data['meta_title'] = _project_name_ . " - About Us";
    $this->data['meta_description'] = _project_name_ . " - About Us";
    $this->data['meta_keywords'] = _project_name_ . " - About Us";
    $this->data['meta_others'] = "";






    parent::get_header('header', $this->data);
    $this->load->view('about_us', $this->data);
    parent::get_footer('footer', $this->data);
  }





  public function contact_us()
  {

    $this->data['meta_title'] = _project_name_ . " - Contact Us";
    $this->data['meta_description'] = _project_name_ . " - Contact Us";
    $this->data['meta_keywords'] = _project_name_ . " - Contact Us";
    $this->data['meta_others'] = "";


    // $this->data['js'] = array('js/custom_parsley.js');//, 'js/all-scripts.js'
    // $this->data['direct_css'] = array('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');//, 'js/all-scripts.js'
    // $this->data['direct_js'] = array('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', );//, 'js/all-scripts.js'

    parent::get_header('header', $this->data);

    $this->load->view('contact_us', $this->data);

    parent::get_footer('footer', $this->data);
  }

  public function thank_you()
  {
    $this->data['meta_title'] = _project_name_ . " - Thank You";
    $this->data['meta_description'] = _project_name_ . " - Thank You";
    $this->data['meta_keywords'] = _project_name_ . " - Thank You";
    $this->data['meta_others'] = "";


    parent::get_header('header', $this->data);
    $this->load->view('thank_you', $this->data);
    parent::get_footer('footer', $this->data);
  }

  public function pageNotFound()
  {
    $this->data['meta_title'] = _project_name_ . " - Page Not Found";
    $this->data['meta_description'] = _project_name_ . " - Page Not Found";
    $this->data['meta_keywords'] = _project_name_ . " - Page Not Found";
    $this->data['meta_others'] = "";

    $this->load->view('pageNotFound', $this->data);
  }

  public function found404()
  {
    $this->data['meta_title'] = _project_name_ . " - 404 found";
    $this->data['meta_description'] = _project_name_ . " - 404 found";
    $this->data['meta_keywords'] = _project_name_ . " - 404 found";
    $this->data['meta_others'] = "";

    parent::get_header('header', $this->data);
    $this->load->view('404found', $this->data);
    parent::get_footer('footer', $this->data);
  }

  public function error()
  {
    $this->data['meta_title'] = _project_name_ . " - Error";
    $this->data['meta_description'] = _project_name_ . " - Error";
    $this->data['meta_keywords'] = _project_name_ . " - Error";
    $this->data['meta_others'] = "";

    parent::get_header('header', $this->data);
    $this->load->view('error', $this->data);
    parent::get_footer('footer', $this->data);
  }












}
