<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dashboardGuruModel');

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
        $gurudata = $this->db->get_where('guru', array('id' => $id))->row();

        if ($gurudata->id_wilayah != null) {
            $wilayah = $this->db->get_where('wilayah', array('id' => $gurudata->id_wilayah))->row();
        } else {
            $wilayah = null;
        }

        $data = [
            'title' => "Dashboard" . " (" . $gurudata->verifikasi . ")",
            'guru' => $gurudata,
            'wilayah' => $wilayah,
            'wilayah1' => $this->db->get('wilayah')->result(),
            'permintaan' => $this->dashboardGuruModel->countpermintaan($id)->row('jumlah'),
            'muridaktif' => $this->dashboardGuruModel->countaktif($id)->row('jumlah'),
            'muridselesai' => $this->dashboardGuruModel->countselesai($id)->row('jumlah'),
        ];

        $this->template->load('template', 'guru/dashboard', $data);
    }

    public function datapribadi()
    {
        if (!empty($_FILES["foto"]["name"])) {

            $config2['upload_path'] = './assets/img/foto';
            $config2['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config2['max_size'] = '1000000';
            $this->load->library('upload', $config2, 'fotoupload');
            if (!$this->fotoupload->do_upload('foto')) {
                //validasi gagal
                $error = $this->fotoupload->display_errors();
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('$error');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                $upload_data = $this->fotoupload->data();
                $foto = $upload_data['file_name'];

                //delete foto lama
                $data = $this->input->post('foto_lama');
                $path = './assets/img/foto/';
                @unlink($path . $data);
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
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'foto' => $foto,
            'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true))
        ];

        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('guru', $data);

        redirect('guru/dashboard/session');
    }

    public function session()
    {
        $id = $this->session->userdata('id');
        $getdata = $this->db->get_where('guru', ['id' => $id])->row_array();

        if ($getdata['foto'] == null) {
            $foto = 'default.png';
        } else {
            $foto = $getdata['foto'];
        }

        $data_session = array(
            'nama' => $getdata['nm_guru'],
            'foto' => $foto,
            'level' => 'guru',
            'aktif' => TRUE
        );
        $this->session->set_userdata($data_session);
        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('guru/dashboard');
    }

    public function datapendidikan()
    {
        if (!empty($_FILES["nilai"]["name"])) {

            $config['upload_path'] = './assets/img/nilai';
            $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config['max_size'] = '1000000';
            $this->load->library('upload', $config, 'nilaiupload');
            if (!$this->nilaiupload->do_upload('nilai')) {
                //validasi gagal
                $error = $this->nilaiupload->display_errors();
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('$error');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                $upload_data = $this->nilaiupload->data();
                $nilai = $upload_data['file_name'];

                $data = $this->input->post('nilai_lama');
                $path = './assets/img/nilai/';
                @unlink($path . $data);
            }
        } else {
            $nilai = $this->input->post('nilai_lama');
        }

        if (!empty($_FILES["ijazah"]["name"])) {

            $config1['upload_path'] = './assets/img/ijazah';
            $config1['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
            $config1['max_size'] = '1000000';
            $this->load->library('upload', $config1, 'ijazahupload');
            if (!$this->ijazahupload->do_upload('ijazah')) {
                //validasi gagal
                $error = $this->ijazahupload->display_errors();
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('$error');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                $upload_data = $this->ijazahupload->data();
                $ijazah = $upload_data['file_name'];

                $data = $this->input->post('ijazah_lama');
                $path = './assets/img/ijazah/';
                @unlink($path . $data);
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

        $data = [
            'pddterakhir' => htmlspecialchars($this->input->post('pddterakhir', true)),
            'jurusanpdd' => htmlspecialchars($this->input->post('jurusanpdd', true)),
            'ijazah' => $ijazah,
            'nilai' => $nilai,
        ];

        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('guru', $data);

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('guru/dashboard');
    }

    public function password()
    {
        $id = $this->session->userdata('id');
        $passwordlama = $this->db->get_where('guru', ['id' => $id])->row('password');
        $passinsert = md5($this->input->post('passlama'));

        if ($passwordlama != $passinsert) {
            redirect('auth/logout?s=error');
        } else {
            $data = [
                'password' => md5($this->input->post('passbaru')),
            ];

            $this->db->where('id', $id);
            $this->db->update('guru', $data);
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
            redirect('guru/dashboard');
        }
    }

    public function lainnya()
    {
        $data = [
            'jenjang' => htmlspecialchars($this->input->post('jenjang', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'id_wilayah' => htmlspecialchars($this->input->post('wilayah', true))
        ];

        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('guru', $data);

        $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
        redirect('guru/dashboard');
    }

    public function verif()
    {
        $id = $this->session->userdata('id');
        $verifikasi = $this->db->get_where('guru', ['id' => $id])->row_array();

        if ($verifikasi['verifikasi'] == "Terverifikasi") {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Sudah Terverifikasi');

					});
                    </script>");
            redirect('guru/dashboard');
        } else {
            $count = count(array_filter($verifikasi));

            if ($count < 17) {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
            	    $(document).ready(function() {
            		toastr.error('Data belum lengkap');

            		});
                    </script>");
                redirect('guru/dashboard');
            } else {

                $id = $this->session->userdata('id');
                $cek = $this->dashboardGuruModel->getlastdata($id)->row('status');

                if ($cek == 'Proses') {
                    $this->session->set_flashdata('message', "<script type='text/javascript'>
            	    $(document).ready(function() {
            		toastr.warning('Permintaan sedang diproses');

            		});
                    </script>");
                    redirect('guru/dashboard');
                } else {

                    $date = date("Y-m-d H:i:s");

                    $data = [
                        'id_guru' => $id,
                        'tgl_update' => $date,
                        'status' => 'Proses',
                    ];

                    $this->db->insert('verifikasi', $data);

                    $this->session->set_flashdata('message', "<script type='text/javascript'>
            	    $(document).ready(function() {
            		toastr.success('Permintaan terkirim');

            		});
                    </script>");
                    redirect('guru/dashboard');
                }
            }
        }
    }
}
