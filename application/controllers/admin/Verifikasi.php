<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('verifikasiModel');

        if ($this->session->userdata('aktif') != TRUE) {
            $current_url = current_url();
            $this->session->set_userdata(['current_url' => $current_url]);
            redirect('auth');
        }

        if ($this->session->userdata('level') == 'guru' || $this->session->userdata('level') == 'murid') {
            redirect('home');
        }
    }

    public function index()
    {
        $count = $this->verifikasiModel->count()->row('jumlah');

        $data = [
            'title' => "Verifikasi" . '(' . $count . ' Permintaan)',
            'verifikasi' => $this->verifikasiModel->getdata()->result()
        ];

        $this->template->load('template', 'admin/verifikasi', $data);
    }

    public function detail($id)
    {
        $getdata = $this->db->get_where('verifikasi', array('id' => $id))->row();
        $guruid = $getdata->id_guru;

        $data = [
            'title' => "Detail Guru",
            'status' => $getdata->status,
            'guru' => $this->verifikasiModel->getdatabyid($guruid)->row()
        ];

        $this->template->load('template', 'admin/verifikasi_proses', $data);
    }

    public function process()
    {
        $submit = $this->input->post('submitform');
        $id = $this->input->post('id');
        $date = date("Y-m-d H:i:s");

        $idverif = $this->verifikasiModel->getid($id)->row('id');

        if ($submit == "Tolak") {
            $data = [
                'tgl_update' => $date,
                'status' => 'Tolak',
            ];

            $this->db->where('id', $idverif);
            $this->db->update('verifikasi', $data);

            $data1 = [
                'verifikasi' => "Permintaan Ditolak"
            ];

            $this->db->where('id', $id);
            $this->db->update('guru', $data1);

            $this->session->set_flashdata('message', "<script type='text/javascript'>
            	    $(document).ready(function() {
            		toastr.success('Data berhasil diupdate');

            		});
                    </script>");
            redirect('admin/verifikasi');
        } else if ($submit == "Terima") {

            $data = [
                'tgl_update' => $date,
                'status' => 'Terima',
            ];

            $this->db->where('id', $idverif);
            $this->db->update('verifikasi', $data);

            $data1 = [
                'verifikasi' => "Terverifikasi"
            ];

            $this->db->where('id', $id);
            $this->db->update('guru', $data1);

            $this->session->set_flashdata('message', "<script type='text/javascript'>
            	    $(document).ready(function() {
            		toastr.success('Data berhasil diupdate');

            		});
                    </script>");
            redirect('admin/verifikasi');
        }
    }
}
