<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('cariModel');
    }

    public function index($jurusan = null, $jenjang = null, $wilayah = null, $pendidikan = null, $nama = null)
    {
        if (!isset($_GET['jurusan']) && !isset($_GET['jenjang']) && !isset($_GET['wilayah']) && !isset($_GET['pendidikan']) && !isset($_GET['nama'])) {
            $guru = null;
        } else {
            if (isset($_GET['jurusan'])) {
                $jurusan = $_GET['jurusan'];
            } else {
                $jurusan = null;
            }
            if (isset($_GET['nama'])) {
                $nama = $_GET['nama'];
            } else {
                $nama = null;
            }
            if (isset($_GET['wilayah'])) {
                $wilayah = $_GET['wilayah'];
            } else {
                $wilayah = null;
            }
            if (isset($_GET['pendidikan'])) {
                $pendidikan = $_GET['pendidikan'];
            } else {
                $pendidikan = null;
            }
            if (isset($_GET['jenjang'])) {
                $jenjang = $_GET['jenjang'];
            } else {
                $jenjang = null;
            }
            $guru = $this->cariModel->query($jurusan, $nama, $jenjang, $wilayah, $pendidikan)->result();
        }


        $data = [
            'guru' => $guru,
            'wilayah' => $this->cariModel->getwilayah()->result(),
            'jurusan' => $this->cariModel->getjurusanpdd()->result(),
        ];

        $this->template->load('users/template', 'users/cari', $data);
    }
}
