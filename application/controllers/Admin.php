<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()

	{
		$data['judul'] = 'Profil Admin';
		$this->load->view('template/header', $data);
		$this->load->view('admin/index');
		$this->load->view('template/footer');
	}


	public function loginadmin()

	{
		$data['judul'] = 'Admin Login';
		$this->load->view('template/headerlogin', $data);
		$this->load->view('admin/loginadmin');
		$this->load->view('template/footer');
	}
	public function pagecontrol()

	{
		$data['judul'] = 'Page Control';
		$this->load->view('template/header', $data);
		$this->load->view('admin/pagecontrol');
		$this->load->view('template/footer');
	}
	public function editserver()

	{
		$data['judul'] = 'Edit Server';
		$this->load->view('template/header', $data);
		$this->load->view('admin/editserver');
		$this->load->view('template/footer');
	}
	public function addserver()

	{
		$data['judul'] = 'Add Server';
		$this->load->view('template/header', $data);
		$this->load->view('admin/addserver');
		$this->load->view('template/footer');
	}
	public function setting()

	{
		$data['judul'] = 'Setting';
		$this->load->view('template/header', $data);
		$this->load->view('admin/setting');
		$this->load->view('template/footer');
	}
	public function history()

	{
		$data['judul'] = 'History';
		$this->load->view('template/header', $data);
		$this->load->view('admin/history');
		$this->load->view('template/footer');
	}
	public function profil()

	{
		$data['judul'] = 'History';
		$this->load->view('template/header', $data);
		$this->load->view('admin/profil');
		$this->load->view('template/footer');
	}

	public function changepass($username)
	{
		$this->form_validation->set_rules('curentpass', 'Current Password', 'required|trim|matches[password]', [
			'matches' => 'Current Password dont matces!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|trim|matches[curentpass]');
		$this->form_validation->set_rules('newpass', 'New Password', 'required|trim|min_length[6]|matches[confirmpass]', [
			'matches' => 'Password dont matces!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required|trim|matches[newpass]');
		if ($this->form_validation->run() == false) {
			$this->setting();
		} else {
			$this->db->set('password', $_POST['confirmpass']);
			$this->db->where('username', $_POST['us']);
			$this->db->update('admin');
			// var_dump($_POST);
			// var_dump($username);
			$this->session->unset_userdata('username');
			$this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
			Use your new password</div>');
			redirect('auth');
		}
	}

	public function tes()
	{
		echo "<button type='button' class='btn btn-secondary' data-container='body' data-toggle='popover' data-placement='top' data-content='apaaaaaaaaaaaaaa'>Tes</button>";
	}
}
