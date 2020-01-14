<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('akunModel');

        if ($this->session->userdata('aktif') != TRUE) {
            $current_url = current_url();
            $this->session->set_userdata(['current_url' => $current_url]);
            redirect('login');
        }

        if ($this->session->userdata('level') == 'guru') {
            redirect('guru/dashboard');
        } elseif ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') {
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $murid = $this->db->get_where('murid', ['id' => $id]);
        $jumlah = count(array_filter($murid->row_array()));

        $data = [
            'murid' => $murid->row(),
            'jumlahdata' => $jumlah,
            'guru' => $this->akunModel->getguru($id)->result(),
        ];

        $this->template->load('users/template', 'users/akun', $data);
    }

    public function update()
    {
        $data = $this->input->post();
        $this->db->update('murid', $data);
        $this->db->where('id', $this->session->userdata('id'));

        $this->session->set_flashdata(
            'message1',
            "<div class='col-sm-10 col-sm-offset-1'>
                    <div class='alert alert-success' role='alert'>Data Berhasil Tersimpan.</div>
                </div><br>"
        );
        redirect('akun');
    }

    public function password()
    {
        $passlama = md5($this->input->post('passwordlama'));
        $id = $this->session->userdata('id');

        $passasli = $this->db->get_where('murid', ['id', $id])->row('password');

        if ($passlama != $passasli) {
            redirect('auth/logout?s=errors');
        } else {
            $data = ['password' => md5($this->input->post('passwordbaru'))];

            $this->db->update('murid', $data);
            $this->db->where('id', $id);
            $this->session->set_flashdata(
                'message1',
                "<div class='col-sm-10 col-sm-offset-1'>
                    <div class='alert alert-success' role='alert'>Data Berhasil Tersimpan.</div>
                </div><br>"
            );
            redirect('akun');
        }
    }

    public function ulasan()
    {

        $id_ajar = $this->input->post('ajarid');
        $id_permintaan = $this->db->get_where('ajar', ['id' => $id_ajar])->row('id_permintaan');
        $permintaan = $this->db->get_where('permintaan', ['id' => $id_permintaan])->row();
        $date = date("Y-m-d H:i:s");

        $data = [
            'id_ajar' => $id_ajar,
            'id_guru' => $permintaan->id_guru,
            'id_murid' => $this->session->userdata('id'),
            'tgl' => $date,
            'ulasan' => htmlspecialchars($this->input->post('ulasan', true)),
            'rate' => $this->input->post('radio1'),
        ];

        $this->db->insert('review', $data);

        $data1 = [
            'review' => 1,
        ];

        $this->db->where('id', $id_ajar);
        $this->db->update('ajar', $data1);
        $this->session->set_flashdata(
            'message1',
            "<div class='col-sm-10 col-sm-offset-1'>
                    <div class='alert alert-success' role='alert'>Data Berhasil Tersimpan.</div>
                </div><br>"
        );
        redirect('akun');
    }
}
