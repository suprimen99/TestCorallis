<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datauser');
	}
	
	public function index()
	{
		
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
			 $data['title'] = 'My Profile';
        	$this->load->view('template/header', $data);
        	$this->load->view('template/sidebar');
       		$this->load->view('template/topbar');
        	$this->load->view('user/index', $data);
       		$this->load->view('template/footer');
	// echo 'Selamat datang'. $data['user']['username'];
	}

	public function datauser()
	{

		$data['title'] = 'Data User';
		$data['count'] = $this->db->count_all( 'users' );
		$data['user'] = $this->M_datauser->getalldata();
		$user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header', $data);
        	$this->load->view('template/sidebar');
			$this->load->view('template/topbar',$user);
        	$this->load->view('user/data_user', $data);
       		$this->load->view('template/footer');
	}

	public function Edit()
	{
		$data['title'] = 'Edit User';
		// $data['user'] = $this->M_datauser->getdataid($id);
		$user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
        	$this->load->view('template/sidebar');
			$this->load->view('template/topbar',$user);
        	$this->load->view('user/edituser', $data);
       		$this->load->view('template/footer');
		}else{
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$this->db->set('username', $username);
			$this->db->where('email', $email);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Your profile has been updated!
		  </div>');
			redirect('User');
		}
			
	}
	
}
