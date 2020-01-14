<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('homeModel');
    }


    public function index()
    {

        $data = [
            'guru' => $this->homeModel->getguru()->result(),
            'wilayah' => $this->homeModel->getwilayah()->result(),
            'jurusan' => $this->homeModel->getjurusanpdd()->result(),
        ];

        $this->template->load('users/template', 'users/home', $data);
    }

    public function show($id = null)
    {

        if ($this->session->userdata('aktif') != TRUE) {
            $current_url = current_url();
            $this->session->set_userdata(['current_url' => $current_url]);
            redirect('login?s=login');
        } else {

            if ($id != null) {

                $data = [
                    'guru' => $this->homeModel->getgurudetail($id)->row(),
                    'wilayah' => $this->homeModel->getwilayah()->result(),
                    'jurusan' => $this->homeModel->getjurusanpdd()->result(),
                    'review' => $this->homeModel->getreview($id)->result(),
                    'jumlahreview' => $this->homeModel->getreview($id)->num_rows(),
                    'rerata' => $this->homeModel->rerata($id)->row('rerata'),
                ];

                $this->template->load('users/template', 'users/guru', $data);
            } else {
                redirect('');
            }
        }
    }

    public function permintaan()
    {
        $guruid = $this->input->post('guruid');
        $id = $this->session->userdata('id');
        $cekdata = $this->homeModel->cekpermintaan($guruid, $id)->num_rows();

        if ($this->session->userdata('level') != 'murid') {
            $this->session->set_flashdata(
                'message1',
                "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-warning' role='alert'>Silahkan login dengan akun murid.</div>
                </div>"
            );
            redirect('home/show/' . $guruid);
        } elseif ($cekdata >= 1) {
            $this->session->set_flashdata(
                'message1',
                "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-warning' role='alert'>Anda sudah mengirim permintaan sebelumnya, silahkan tunggu konfirmasi dari guru.</div>
                </div>"
            );
            redirect('home/show/' . $guruid);
        } else {

            $date = date("Y-m-d H:i:s");
            $hari = implode(', ', $this->input->post('hari'));

            $data = [
                'id_murid' => $id,
                'id_guru' => $guruid,
                'tgl' => $date,
                'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
                'hari' => $hari,
                'status' => 'Proses'
            ];

            $this->db->insert('permintaan', $data);
            $this->session->set_flashdata(
                'message1',
                "<div class='col-sm-8 col-sm-offset-2'>
                    <div class='alert alert-success' role='alert'>Permintaan berhasil terkirim.</div>
                </div>"
            );
            redirect('home/show/' . $guruid);
        }
    }
}
