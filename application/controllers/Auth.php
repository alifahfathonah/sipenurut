<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('authModel');
    }

    public function index()
    {
        if ($this->session->userdata('aktif') == TRUE) {
            if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('level') == 'guru') {
                redirect('guru/dashboard');
            } else {
                redirect('home');
            }
        }

        if (isset($_GET['s'])) {
            if ($_GET['s'] == 'error') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Password lama salah');

					});
                    </script>");
            }
        }

        $this->load->view('login');
    }

    public function register()
    {

        if ($this->session->userdata('aktif') == TRUE) {
            if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('admin/dashboard');
            } else if ($this->session->userdata('level') == 'guru') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                redirect('home');
            }
        }

        $this->load->view('register');
    }

    public function reg()
    {

        if ($this->session->userdata('aktif') == TRUE) {
            if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('admin/dashboard');
            } else if ($this->session->userdata('level') == 'guru') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                redirect('home');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'is_unique[guru.username]|is_unique[admin.username]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Username telah digunakan');

					});
                    </script>");
            redirect('auth/register');
        } else {
            $data = [
                'nm_guru' => htmlspecialchars($this->input->post('nama')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => md5($this->input->post('password')),
                'verifikasi' => "Belum Terverifikasi",
            ];

            $this->db->insert('guru', $data);

            $id = $this->db->insert_id();

            $data_session = [
                'id' => $id,
                'nama' => $data['nm_guru'],
                'foto' => 'default.png',
                'level' => 'guru',
                'aktif' => TRUE,
            ];
            $this->session->set_userdata($data_session);
            redirect('guru/dashboard');
        }
    }

    public function execute()
    {

        if ($this->session->userdata('aktif') == TRUE) {
            if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('admin/dashboard');
            } else if ($this->session->userdata('level') == 'guru') {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.info('Anda Sudah Login');

					});
                    </script>");
                redirect('guru/dashboard');
            } else {
                redirect('home');
            }
        }

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek_admin = $this->authModel->auth_admin($username, $password);

        if ($cek_admin->num_rows() > 0) {
            $data = $cek_admin->row_array();

            if ($data['superadmin'] == true) {
                $level = 'superadmin';
            } else {
                $level = 'admin';
            }

            $data_session = array(
                'id' => $data['id'],
                'nama' => $data['nm_admin'],
                'foto' => 'default.png',
                'level' => $level,
                'aktif' => TRUE,
            );

            $this->session->set_userdata($data_session);
            if ($this->session->userdata('current_url') != null) {
                redirect($this->session->userdata('current_url'));
            } else {
                redirect('admin/dashboard');
            }
        } else {
            $cek_guru = $this->authModel->auth_guru($username, $password);
            if ($cek_guru->num_rows() > 0) {
                $data = $cek_guru->row_array();

                if ($data['foto'] == null) {
                    $foto = 'default.png';
                } else {
                    $foto = $data['foto'];
                }

                $data_session = array(
                    'id' => $data['id'],
                    'nama' => $data['nm_guru'],
                    'foto' => $foto,
                    'level' => 'guru',
                    'aktif' => TRUE
                );
                $this->session->set_userdata($data_session);

                if ($this->session->userdata('current_url') != null) {
                    redirect($this->session->userdata('current_url'));
                } else {
                    redirect('guru/dashboard');
                }
            } else {
                $this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Username atau Password salah');

					});
                    </script>");
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        if (isset($_GET['s'])) {
            if ($_GET['s'] == 'error') {
                redirect('auth?s=error');
            } else if ($_GET['s'] == 'errors') {
                redirect('login?s=error');
            }
        } else {
            redirect('home');
        }
    }
}
