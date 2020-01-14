<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('permintaanModel');

        if ($this->session->userdata('aktif') != TRUE) {
            $current_url = current_url();
            $this->session->set_userdata(['current_url' => $current_url]);
            redirect('login');
        }

        if ($this->session->userdata('level') == 'guru') {
            redirect('guru/dashboard');
        } elseif ($this->session->userdata('level') == 'admin'  || $this->session->userdata('level') == 'superadmin') {
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'permintaan' => $this->permintaanModel->getdata($id)->result(),
        ];

        $this->template->load('users/template', 'users/permintaan', $data);
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('permintaanid'));
        $this->db->delete('permintaan');

        $this->session->set_flashdata(
            'message1',
            "<div class='col-sm-8 col-sm-offset-2'>
            <div class='alert alert-success' role='alert'>Permintaan berhasil dibatalkan/dihapus.</div>
        </div><br><br>"
        );

        redirect('permintaan');
    }
}
