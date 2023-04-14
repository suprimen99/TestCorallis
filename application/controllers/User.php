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
        	$this->load->view('template/sidebar',$user);
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
        	$this->load->view('template/sidebar', $user);
			$this->load->view('template/topbar',$user);
        	$this->load->view('user/edituser', $data);
       		$this->load->view('template/footer');
		}else{
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2043';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);
					if($this->upload->do_upload('image')){
						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
					}else{
						echo $this->upload->display_errors();
					}
			}
			$this->db->set('username', $username);
			$this->db->where('email', $email);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Your profile has been updated!
		  </div>');
			redirect('User');
		}
	}
			
	public function changePassword()
{
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Change Password';

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');    
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');    
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');    

    if ($this->form_validation->run() == false) {
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/ChangePassword', $data);
        $this->load->view('template/footer');
    } else {
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password!
            </div>');
            redirect('user/changePassword');
        } else {
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New password cannot be the same as current password!
                </div>');
                redirect('user/changePassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('users');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password changed!
                </div>');
                redirect('user/changePassword');
            }
        }
    }
}

}
	

