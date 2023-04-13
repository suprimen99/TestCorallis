<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['users'] = $this->db->get_where('users',['email'=> 
		$this->session->userdata('email')])->row_array();
			$data['title'] = 'Dashboard User';
			// $this->load ->view('template/header.php', $data);
			// $this->load ->view('template/topbar.php');
			// $this->load ->view('template/sidebar.php');
			$this->load->view('user/index.php');
			// $this->load ->view('template/footer.php');
	
	}

	
}
