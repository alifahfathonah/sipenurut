<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

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
            'title' => "Wilayah",
            'wilayah' => $this->db->get('wilayah')->result(),
        ];

        $this->template->load('template', 'admin/wilayah', $data);
    }

    public function edit($id)
    {
        $data = $this->db->query("SELECT * FROM Wilayah Where id='$id'")->row();

        echo json_encode($data);

        return json_encode($data);
    }

    public function insert()
    {
        $data = [
            'provinsi' => htmlspecialchars($this->input->post('provinsi')),
            'kota' => htmlspecialchars($this->input->post('kota')),
        ];

        $this->db->insert('wilayah', $data);

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('admin/wilayah');
    }

    public function update()
    {
        $id = $this->input->post('id');

        $data = [
            'provinsi' => htmlspecialchars($this->input->post('provinsi')),
            'kota' => htmlspecialchars($this->input->post('kota')),
        ];

        $this->db->where('id', $id);
        $this->db->update('wilayah', $data);

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Diupdate');

					});
                    </script>");
        redirect('admin/wilayah');
    }

    public function delete($id)
    {
        $cek = $this->db->query("SELECT * FROM guru WHERE id_wilayah = '$id'")->row();

        if ($cek != null) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Data Gagal Terhapus');

					});
                    </script>");
            redirect('admin/wilayah');
        } else {

            $this->db->where('id', $id);
            $this->db->delete('wilayah');

            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Dihapus');

					});
                    </script>");
            redirect('admin/wilayah');
        }
    }
}
