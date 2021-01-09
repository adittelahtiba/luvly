<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index($i = 0, $menu = 0)
    {
        if ($i < 0) $i = 0;
        $data['control'] = $this->db->query("select id, server,name,verified,image, concat_ws(', ',name,date_format(date,'%d/%c/%Y'),date_format(time,'%k.%i'),result,note) as control
         from control limit " . $i . ",9")->result_array();
        $data['menu'] = $menu;
        $data['i'] = $i;
        $data['batas'] = $this->db->count_all_results('control');
        $data['judul'] = 'Control';
        $this->load->view('template/header', $data);
        $this->load->view('control/index', $data);
        $this->load->view('template/footer');
    }

    public function user($i = 0, $menu = 0)
    {
        if ($i < 0) $i = 0;
        $data['control'] = $this->db->query("select id, server,name,verified,image, concat_ws(', ',name,date_format(date,'%d/%c/%Y'),date_format(time,'%k.%i'),result,note) as control
         from control limit " . $i . ",9")->result_array();
        $data['menu'] = $menu;
        $data['i'] = $i;
        $data['batas'] = $this->db->count_all_results('control');
        $data['judul'] = 'Control';
        $this->load->view('template/headeruser', $data);
        $this->load->view('control/index', $data);
        $this->load->view('template/footer');
    }

    public function addserverX()
    {
        $this->form_validation->set_rules('server', 'Server', 'trim|required');
        if ($this->form_validation->run() == false) {
            redirect('setting/addserver');
        } else {
            $this->db->query("insert into control(server) values
             ('" . $_POST['server'] . "')");
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Server has been added
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            $this->index(0, 1);
        }
    }

    public function tambahData()
    {
        $upload = $_FILES['image']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '604800';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('image');
            $image = $this->upload->data('file_name');
        }
        $this->db->query("UPDATE control SET 
        date = '" . $_POST['date'] . "',
         time = '" . $_POST['time'] . "',
          name = '" . $_POST['nama'] . "',
           result = '" . $_POST['result'] . "',
           image = '" . $image . "',
            note = '" . $_POST['note'] . "' WHERE id ='" . $_POST['id'] . "' order by server");
        $fugo['one'] = $this->db->query("select server from control where id='" . $_POST['id'] . "'")->row_array();
        $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
                Server "' . $fugo['one']['server'] . '" has been edited</div>');
        redirect('control/user');
    }

    public function hapus($id)
    {
        $n['n'] = $this->db->query("SELECT server FROM control WHERE id ='" . $id . "'")->row_array();
        $this->db->query("DELETE FROM control WHERE id ='" . $id . "'");
        //var_dump($n['n']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             "' . $n['n']['server'] . '" have been deleted
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
        redirect('control/index/0/2');
    }

    public function editserver($id)
    {
        $data['editserver'] = $this->db->query("select* FROM control WHERE id ='" . $id . "'")->row_array();
        $data['judul'] = 'Setting';
        $this->load->view('template/header', $data);
        $this->load->view('control/editserver', $data);
        $this->load->view('template/footer');
    }

    public function verified($id)
    {
        $this->db->set('verified', 'Y');
        $this->db->where('id', $id);
        $this->db->update('control');
        $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
        This server has been Verified
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('control');
    }

    public function unverified($id)
    {
        $this->db->set('verified', 'T');
        $this->db->where('id', $id);
        $this->db->update('control');
        $this->session->set_flashdata('message', '<div class=" alert alert-warning" role="alert">
        This server has been Unverified
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('control');
    }
}
