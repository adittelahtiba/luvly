<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()

	{
		$data['judul'] = 'Setting';
		$this->load->view('template/header', $data);
		$this->load->view('setting/index');
		$this->load->view('template/footer');
	}

	public function adduser()

	{
		$data['judul'] = 'Setting';
		$this->load->view('template/header', $data);
		$this->load->view('setting/adduser');
		$this->load->view('template/footer');
	}

	public function addserver()
	{
		$data['judul'] = 'Setting';
		$this->load->view('template/header', $data);
		$this->load->view('setting/addserver');
		$this->load->view('template/footer');
	}
	public function userlisft()

	{
		$data['judul'] = 'Setting';
		$this->load->view('template/header', $data);
		$this->load->view('setting/userlist');
		$this->load->view('template/footer');
	}


	//dddddddddddddddddddddddddddddddddddddddddddddd



	public function addserverX()
	{
		$this->form_validation->set_rules('server', 'Server', 'trim|required|is_unique[control.server]');
		if ($this->form_validation->run() == false) {
			$this->addserver();
		} else {
			$this->db->query("insert into control(server) values
             ('" . $_POST['server'] . "')");
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Server "' . $_POST['server'] . '" have been added
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
			redirect('control/index/0/1');
		}
	}

	public function editserverX()
	{
		$this->form_validation->set_rules('server', 'Server', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('/control/editserver/' . $_POST['id']);
		} else {
			$this->db->query("update control set server =
             '" . $_POST['server'] . "' where id='" . $_POST['id'] . "'");
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Server "' . $_POST['server'] . '" have been edited
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
			redirect('control/index/0/3');
		}
	}

	public function editserver($id)
	{
		$data['judul'] = 'editserver';
		$data['id'] = $id;
		$this->load->view('templates/header', $data);
		$this->load->view('setting/editserver', $data);
		$this->load->view('templates/footer');
	}
	public function editprofile()
	{
		$data['judul'] = 'editprofile';
		$this->load->view('templates/header', $data);
		$this->load->view('setting/editprofile', $data);
		$this->load->view('templates/footer');
	}
	public function deleteuser($nip)
	{
		$us['us'] = $this->db->query("select nama from user where nip='" . $nip . "'")->row_array();
		$this->db->where('nip', $nip);
		$this->db->delete('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User "' . $us['us']['nama'] . '" was successfully deleted
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
		redirect('setting/userlist');
	}


	public function adduserX()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[user.nip]');
		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->adduser();
		} else {
			$this->db->query("insert into user(nip,nama,password) values
             ('" . $_POST['nip'] . "','" . $_POST['nama'] . "','" . $_POST['pass'] . "')");
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             User "' . $_POST['nama'] . '" have been added
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
			redirect('setting/userlist');
		}
	}

	public function userlist($i = 0, $menu = 0)
	{
		$data['judul'] = 'User List';
		if ($i < 0) $i = 0;
		$data['userlist'] = $this->db->query("select *
         from user limit " . $i . ",9")->result_array();
		$data['batas'] = $this->db->count_all_results('user');
		$data['menu'] = $menu;
		$data['i'] = $i;
		$this->load->view('template/header', $data);
		$this->load->view('setting/userlist', $data);
		$this->load->view('template/footer');
	}
}
