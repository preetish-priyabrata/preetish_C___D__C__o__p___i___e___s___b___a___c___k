<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
date_default_timezone_set("Asia/Kolkata");
class Userapk extends REST_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('email');
		$this->load->library('upload');
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->model('usermodal','admins');		
	}
	public function login_post(){
		# code...
	}

	

}