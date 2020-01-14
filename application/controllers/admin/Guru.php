<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guruModel');

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
            'title' => "Guru",
            'guru' => $this->guruModel->getdata()->result(),
        ];

        $this->template->load('template', 'admin/guru', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => "Detail Guru",
            'guru' => $this->guruModel->getdatabyid($id),
            'wilayah' => $this->db->get('wilayah')->result(),
        ];

        $this->template->load('template', 'admin/guru_edit', $data);
    }

    public function update()
    {

        if (!empty($_FILES["nilai"]["name"])) {
            $data = $this->input->post('nilai_lama');
            $path = './assets/img/nilai/';
            @unlink($path . $data);

            $config['upload_path'] = './assets/img/nilai';
            $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config['max_size'] = '1000000';
            $this->load->library('upload', $config, 'nilaiupload');
            if (!$this->nilaiupload->do_upload('nilai')) {
                //validasi gagal
                $error = ['error' => $this->upload->display_error()];
                $this->index($error);
            } else {
                $upload_data = $this->nilaiupload->data();
                $nilai = $upload_data['file_name'];
            }
        } else {
            $nilai = $this->input->post('nilai_lama');
        }

        if (!empty($_FILES["ijazah"]["name"])) {
            $data = $this->input->post('ijazah_lama');
            $path = './assets/img/ijazah/';
            @unlink($path . $data);

            $config1['upload_path'] = './assets/img/ijazah';
            $config1['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config1['max_size'] = '1000000';
            $this->load->library('upload', $config1, 'ijazahupload');
            if (!$this->ijazahupload->do_upload('ijazah')) {
                //validasi gagal
                $error = ['error' => $this->upload->display_error()];
                $this->index($error);
            } else {
                $upload_data = $this->ijazahupload->data();
                $ijazah = $upload_data['file_name'];
            }
        } else {
            if ($this->input->post('pddterakhir') == "Sedang Kuliah") {
                $data = $this->input->post('ijazah_lama');
                $path = './assets/img/ijazah/';
                @unlink($path . $data);
                $ijazah = null;
            } else {
                $ijazah = $this->input->post('ijazah_lama');
            }
        }

        if (!empty($_FILES["foto"]["name"])) {
            $data = $this->input->post('foto_lama');
            $path = './assets/img/foto/';
            @unlink($path . $data);

            $config2['upload_path'] = './assets/img/foto';
            $config2['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config2['max_size'] = '1000000';
            $this->load->library('upload', $config2, 'fotoupload');
            if (!$this->fotoupload->do_upload('foto')) {
                //validasi gagal
                $error = ['error' => $this->upload->display_error()];
                $this->index($error);
            } else {
                $upload_data = $this->fotoupload->data();
                $foto = $upload_data['file_name'];
            }
        } else {
            $foto = $this->input->post('foto_lama');
        }

        $data = [
            'nm_guru' => htmlspecialchars($this->input->post('nama', true)),
            'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'jenjang' => htmlspecialchars($this->input->post('jenjang', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'pddterakhir' => htmlspecialchars($this->input->post('pddterakhir', true)),
            'jurusanpdd' => htmlspecialchars($this->input->post('jurusanpdd', true)),
            'ijazah' => $ijazah,
            'nilai' => $nilai,
            'foto' => $foto,
            'verifikasi' => htmlspecialchars($this->input->post('verifikasi', true)),
            'id_wilayah' => htmlspecialchars($this->input->post('wilayah', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('guru', $data);

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('admin/guru');
    }

    public function delete($id)
    {
        $cek = $this->db->get_where('permintaan', ['id_guru' => $id])->row();

        if ($cek != null) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
                    toastr.error('Data tidak dapat dihapus');
                    toastr.error('Data telah memiliki permintaan');
					});
                    </script>");
            redirect('admin/guru');
        } else {
            $getdata = $this->db->get_where('guru', array('id' => $id))->row();

            $path = './assets/img/nilai/';
            @unlink($path . $getdata->nilai);

            $path = './assets/img/ijazah/';
            @unlink($path . $getdata->ijazah);

            $path = './assets/img/foto/';
            @unlink($path . $getdata->foto);

            $this->db->where('id', $id);
            $this->db->delete('guru');

            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Dihapus');

					});
                    </script>");
            redirect('admin/guru');
        }
    }
}
