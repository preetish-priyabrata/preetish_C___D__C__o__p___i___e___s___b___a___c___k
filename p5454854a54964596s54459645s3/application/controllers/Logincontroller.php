<?php
class Logincontroller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('email');

		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		 $this->load->helper('url');
		$this->load->model('user_store', 'user');
		// $this->load->library('file');

	}
	function index() {
		$this->load->view('login/index');
	}
	function check_login() {
		// Array ( [username] => admin [password] => 1234 ) 
		if ($this->input->post('username') && $this->input->post('username') != "" && $this->input->post('password') && $this->input->post('password') != "") {
			$username = trim($this->input->post('username'));
			$password = trim($this->input->post('password'));
			$data = array('email_id' => $username, 'password' => $password, 'status' => 1);
			 $result = $this->user->check_login($data);
			
			if ($result == 1) {
				$data_info = $this->db->get_where('admin_user', $data);
				foreach ($data_info->result() as $key_info) {
					$admin_user = $key_info->name;
					$admin_id = $key_info->user_id;
					$image = $key_info->photo_name;
				}
				$session_data = array(
					'username' => $admin_user,
					'admin_id' => $admin_id,
					'image' => $image,
				);
				// Add user data in session
				$this->session->set_userdata('session', $session_data);
				$this->session->set_flashdata('msg', 'WeLcome To Admin-Dash Board');
				redirect('admin-dashboard');
			} else {
				$this->session->set_flashdata('msg1', 'Non-Authenticate User');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('msg1', 'Invalid Email Id/Password');
			redirect('login');
		}
	}
	function logout() {
		$sess_array = array('username' => '');
		$this->session->unset_userdata('session', $sess_array);
		$this->session->set_flashdata('msg', ' Logout  Success-Fully');
		redirect('login');
	}
}

