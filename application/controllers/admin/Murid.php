<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('muridModel');

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
        $data = [
            'title' => "Murid",
            'murid' => $this->db->get('murid')->result()
        ];

        $this->template->load('template', 'admin/murid', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => "Detail Guru",
            'murid' => $this->db->get_where('murid', ['id' => $id])->row(),
            'permintaan' => $this->muridModel->getdata($id)->result()
        ];

        $this->template->load('template', 'admin/murid_edit', $data);
    }

    public function update()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('murid', $this->input->post());

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('admin/murid');
    }

    public function delete($id)
    {
        $cek = $this->db->get_where('permintaan', ['id_murid' => $id])->row();

        if ($cek != null) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
                    toastr.error('Data tidak dapat dihapus');
                    toastr.error('Data telah memiliki permintaan');
					});
                    </script>");
            redirect('admin/murid');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('murid');

            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Dihapus');

					});
                    </script>");
            redirect('admin/murid');
        }
    }
}
