<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('loginModel');

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
    }

    public function index()
    {
        if (isset($_GET['s'])) {
            if ($_GET['s'] == 'error') {
                $this->session->set_flashdata('message1',  "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-danger' role='alert'>Password lama salah.</div>
                </div>");
            } elseif ($_GET['s'] == 'login') {
                $this->session->set_flashdata('message1',  "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-warning' role='alert'>Silahkan login untuk melanjutkan</div>
                </div>");
            }
        }

        $this->template->load('users/template', 'users/login');
    }

    public function auth()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek_murid = $this->loginModel->auth_murid($username, $password);

        if ($cek_murid->num_rows() > 0) {
            $data = $cek_murid->row_array();

            $data_session = array(
                'id' => $data['id'],
                'nama' => $data['nm_murid'],
                'foto' => 'default.png',
                'level' => 'murid',
                'aktif' => TRUE,
            );

            $this->session->set_userdata($data_session);
            if ($this->session->userdata('current_url') != null) {
                redirect($this->session->userdata('current_url'));
            } else {
                redirect('home');
            }
        } else {
            $cek_guru = $this->loginModel->auth_guru($username, $password);
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
                $this->session->set_flashdata(
                    'message1',
                    "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-warning' role='alert'>Username/Email atau Password Salah!</div>
                </div>"
                );
                redirect('login');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'is_unique[murid.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message1',  "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-warning' role='alert'>Email sudah digunakan!</div>
                </div>");
            $this->index();
        } else {
            $data = [
                'nm_murid' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'password' => md5($this->input->post('password')),
            ];

            $this->db->insert('murid', $data);

            $this->session->set_flashdata('message1',  "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-success' role='alert'>Berhasil registrasi, Silahkan login untuk melanjutkan.</div>
                </div>");
            redirect('login');
        }
    }
}
