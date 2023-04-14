<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	

	public function index()
	{
		if($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'valid_email' => 'email invalid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$data['title'] = 'Halaman Login';

		if($this->form_validation->run() == false){

			$this->load->view('template/authheader', $data);
			$this->load->view('Auth/login.php');
			$this->load->view('template/authfooter');
		}else{
			$this->_login();
		}
	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		
		if($user){
			if(password_verify($password, $user['password'])){
				$data = [
					'email' => $user['email']
				];
				$this->session->set_userdata($data);
				redirect('user');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!!
		  </div>');
		  redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!!
		  </div>');
		  redirect('auth');
		}
	}

	public function registrasi()
	{
		if($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length'=>'password to short!'
		]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){
			$data['title'] = 'Halaman Registration';
			$this->load->view('template/authheader', $data);
			$this->load->view('Auth/register.php');
			$this->load->view('template/authfooter');
		}else{
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'create_add' => time()
			]; 

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please Login
		  </div>');
			redirect('auth');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			you have been logged out!
		  </div>');
			redirect('auth');
	}
	
}
