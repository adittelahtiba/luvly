<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// public function index()

	// {
	// 	$data['judul'] = 'Admin Login';
	// 	$this->load->view('template/headerlogin', $data);
	// 	$this->load->view('auth/loginadmin');
	// 	$this->load->view('template/footer');
	// }
	// public function loginuser()

	// {
	// 	$data['judul'] = 'User Login';
	// 	$this->load->view('template/headerloginuser', $data);
	// 	$this->load->view('auth/loginuser');
	// 	$this->load->view('template/footer');
	// }

	public function index()
	{
		$data['judul'] = 'Admin Login';
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('template/headerlogin', $data);
			$this->load->view('auth/login');
			$this->load->view('template/footer');
		} else {
			$this->_login();
		}
	}

	public function userlogin()
	{
		$data['judul'] = 'User Login';
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('template/headerloginuser', $data);
			$this->load->view('auth/userlogin');
			$this->load->view('template/footer');
		} else {
			$this->_userlogin();
		}
	}

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username', true));
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
		if ($admin) {
			if ($admin['password'] == $password) {
				$this->session->set_userdata($admin);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                Wrong password</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            Can not found username!</div>');
			redirect('auth');
		}
	}

	private function _userlogin()
	{
		$nip = htmlspecialchars($this->input->post('nip'));
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['nip' => $nip])->row_array();
		if ($user) {
			if ($user['password'] == $password) {
				$this->session->set_userdata($user);
				redirect('user');
			} else {
				$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                Wrong password</div>');
				redirect('auth/userlogin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            Can not found NIP!</div>');
			redirect('auth/userlogin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
		You have been logged out</div>');
		redirect('auth');
	}

	public function logout2()
	{
		$this->session->unset_userdata('nip');
		$this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
		You have been logged out</div>');
		redirect('auth/userlogin');
	}
}
