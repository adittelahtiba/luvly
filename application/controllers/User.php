<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index()

	{
		$data['judul'] = 'Index User';
		$this->load->view('template/headeruser', $data);
		$this->load->view('user/index');
		$this->load->view('template/footer');
	}
	public function profil()

	{
		$data['judul'] = 'Profil User';
		$this->load->view('template/headeruser', $data);
		$this->load->view('user/profil');
		$this->load->view('template/footer');
	}
	public function setting()

	{
		$data['judul'] = 'Change Password';
		$this->load->view('template/headeruser', $data);
		$this->load->view('user/setting');
		$this->load->view('template/footer');
	}
	public function formcontrol()

	{
		$data['judul'] = 'Form Control User';
		$this->load->view('template/headeruser', $data);
		$this->load->view('user/formcontrol');
		$this->load->view('template/footer');
	}

	public function changepass($nip)
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
			$this->db->where('nip', $nip);
			$this->db->update('user');


			$this->session->unset_userdata('nip');
			$this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
		Use your new password</div>');
			redirect('auth/userlogin');
		}
	}
}
