<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('muridGuruModel');

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

        $data = [
            'title' => "Murid",
            'murid' => $this->muridGuruModel->getdata($id)->result(),
        ];

        $this->template->load('template', 'guru/murid', $data);
    }

    public function detail($id_ajar)
    {
        $id_guru = $this->session->userdata('id');

        $getdata = $this->muridGuruModel->getdetail($id_ajar, $id_guru)->row();

        if ($getdata == null) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Data tidak ditemukan');

					});
                    </script>");
            redirect('guru/murid');
        } else {

            $data = [
                'title' => "Murid",
                'murid' => $getdata,
            ];

            $this->template->load('template', 'guru/detail_murid', $data);
        }
    }

    public function selesai()
    {
        $id_guru = $this->session->userdata('id');

        $id_ajar = $this->input->post('id');

        $getdata = $this->muridGuruModel->getdataajar($id_ajar, $id_guru)->row();

        if ($getdata == null) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Data tidak ditemukan');

					});
                    </script>");
            redirect('guru/murid');
        } else {
            $date = date("Y-m-d");
            $today = new DateTime($date);
            $datestart = new DateTime($getdata->tgl_mulai);

            $selisih = $datestart->diff($today);

            if ($selisih->days < 7) {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Waktu ajar belum ada 1 minggu');

					});
                    </script>");
                redirect('guru/murid');
            } else {
                $data = [
                    'tgl_selesai' => $date,
                    'status' => "Selesai"
                ];

                $this->db->where('id', $id_ajar);
                $this->db->update('ajar', $data);

                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Ajar murid berhasil diselesaikan');

					});
                    </script>");
                redirect('guru/murid');
            }
        }
    }
}
