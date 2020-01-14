<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('permintaanGuruModel');

        if ($this->session->userdata('aktif') != TRUE) {
            $current_url = current_url();
            $this->session->set_userdata(['current_url' => $current_url]);
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'guru') {
            redirect('home');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $count = $this->permintaanGuruModel->count($id)->row('jumlah');

        $data = [
            'title' => "Permintaan (" . "$count" . " Permintaan)",
            'permintaan' => $this->permintaanGuruModel->getdata($id)->result(),
        ];

        $this->template->load('template', 'guru/permintaan', $data);
    }

    public function detail($idpermintaan)
    {
        $id = $this->session->userdata('id');

        $count = $this->permintaanGuruModel->count($id)->row('jumlah');

        $data = [
            'title' => "Permintaan (" . "$count" . " Permintaan)",
            'permintaan' => $this->permintaanGuruModel->getdetail($id, $idpermintaan)->row(),
        ];

        $this->template->load('template', 'guru/permintaan_proses', $data);
    }

    public function action()
    {
        $submit = $this->input->post('submit');
        $idpermintaan = $this->input->post('id');
        $date = date("Y-m-d");

        if ($submit == 'terima') {
            $data = [
                'status' => 'Terima'
            ];

            $this->db->where('id', $idpermintaan);
            $this->db->update('permintaan', $data);

            $data1 = [
                'id_permintaan' => $idpermintaan,
                'tgl_mulai' => $date,
                'status' => 'Aktif'
            ];

            $this->db->insert('ajar', $data1);

            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
            redirect('guru/permintaan');
        } else {
            $data = [
                'status' => 'Tolak'
            ];

            $this->db->where('id', $idpermintaan);
            $this->db->update('permintaan', $data);

            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
            redirect('guru/permintaan');
        }
    }
}
