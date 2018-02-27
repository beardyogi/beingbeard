<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Rest extends API_Controller {
  public function index()
	{

	}
  public function addUser(){
      header('Access-Control-Allow-Origin: *');
      $data = array();
      $data = $this->input->post();
      $this->load->helper('date');
      $data['created_on'] = now('Asia/Calcutta');
      $this->load->model('user_model');
      $result = $this->user_model->loginUser($data);
      if($result['status'] == 'true'){
          $data['logged_in'] = 'true';
          $this->session->set_userdata($data);
      }
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($result));
  }

  public function getFeeds(){
    header('Access-Control-Allow-Origin: *');
    $this->load->model('feeds_model');
    $result = $this->feeds_model->getFeeds();
    $this->output
    ->set_content_type('application/json') //set Json header
    ->set_output(json_encode($result));

  }

  public function logoutUser(){
      header('Access-Control-Allow-Origin: *');
      $data = array();
      $data = $this->input->post();
      $this->load->helper('date');
      $data['last_login'] = now('Asia/Calcutta');
      $this->load->model('user_model');
      $result = $this->user_model->logoutUser($data);
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($result));
  }

  public function getProfile(){
      header('Access-Control-Allow-Origin: *');
      $social_id = $this->input->get('social_id', TRUE);
      $this->load->model('user_model');
      $data = $this->user_model->getProfile($social_id);
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($data));
  }


  public function random_string($length) {
      $key = '';
      $keys = array_merge(range(0, 9), range('a', 'z'));

      for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
      }

      return $key;
  }

  public function detectVehicle(){
    $data = $this->input->post();
    $result = array();
    $uploaddir1 = './assets/orig_img/';
    $file_name = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < 20; $i++) {
        $file_name .= $keys[array_rand($keys)];
    }
    $uploadfile = $uploaddir1.$file_name.'.jpg';
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
      $result['orig_img']['status'] = "true";
      $result['orig_img']['msg'] = "uploaded";
      $social_id = $data['social_id'];
      $type = $data['type'];
      $orig_img_url = site_url().'assets/orig_img/'.$file_name.'.jpg';
      $this->load->model('profile_model');
      $result = $this->profile_model->detect($social_id,$type,$orig_img_url);
     } else {
      $result['orig_img']['status'] = "false";
      $result['orig_img']['msg'] = "upload failed";
     }

     $this->output
     ->set_content_type('application/json') //set Json header
     ->set_output(json_encode($result));


  }





}
