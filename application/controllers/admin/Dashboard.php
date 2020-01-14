<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$id = $this->session->userdata('id');

		$data = [
			'title' => "Dashboard",
			'admin' => $this->db->get_where('admin', ['id' => $id])->row(),
			'dataadmin' => $this->db->get('admin')->result()
		];

		$this->template->load('template', 'admin/dashboard', $data);
	}

	public function edit($id)
	{
		$data = $this->db->query("SELECT * FROM admin WHERE id='$id'")->row();

		echo json_encode($data);

		return json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$idsession = $this->session->userdata('id');
		if ($id == $idsession) {
			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.warning('Data gagal dirubah');
					toastr.warning('Gunakan form Data Pribadi');

					});
                    </script>");
			redirect('admin/dashboard');
		} else {


			$data = [
				'nm_admin' => htmlspecialchars($this->input->post('nama')),
			];

			$this->db->where('id', $id);
			$this->db->update('admin', $data);

			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Diupdate');

					});
                    </script>");
			redirect('admin/dashboard');
		}
	}

	public function updatepribadi()
	{
		$data = [
			'nm_admin' => $this->input->post('nama'),
		];

		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('admin', $data);

		$data_session = array(
			'nama' => $data['nm_admin'],
		);

		$this->session->set_userdata($data_session);

		$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Diupdate');

					});
                    </script>");
		redirect('admin/dashboard');
	}

	public function insert()
	{
		$this->form_validation->set_rules('username', 'Username', 'is_unique[guru.username]|is_unique[admin.username]');

		if ($this->form_validation->run() == FALSE) {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$url = "<?= base_url('admin/dashboard/insert') ?>";

			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Username telah digunakan');
					$('#modal').modal('show');
					$('#nama_id').val('$nama');
					$('#username_id').addClass('is-invalid');
					$('#username_id').val('$username');
					$('#statuserror').val('error');
					});
                    </script>");
			redirect('admin/dashboard');
		} else {
			$data = [
				'nm_admin' => htmlspecialchars($this->input->post('nama')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => md5('admin'),
				'superadmin' => '0'
			];

			$this->db->insert('admin', $data);

			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data berhasil ditambahkan');
					toastr.info('Password Default = admin, silahkan login dan ubah');

					});
					</script>");
			redirect('admin/dashboard');
		}
	}

	public function delete($id)
	{
		if ($id == $this->session->userdata('id')) {
			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.error('Tidak bisa menghapus akun anda sendiri');

					});
                    </script>");
			redirect('admin/dashboard');
		}

		$this->db->where('id', $id);
		$this->db->delete('admin');

		$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Dihapus');

					});
                    </script>");
		redirect('admin/dashboard');
	}

	public function password()
	{
		$id = $this->session->userdata('id');
		$passwordlama = $this->db->get_where('admin', ['id' => $id])->row('password');
		$passinsert = md5($this->input->post('passlama'));

		if ($passwordlama != $passinsert) {
			redirect('auth/logout?s=error');
		} else {
			$data = [
				'password' => md5($this->input->post('passbaru')),
			];

			$this->db->where('id', $id);
			$this->db->update('admin', $data);
			$this->session->set_flashdata('message', "<script type='text/javascript'>
				$(document).ready(function() {
					toastr.success('Data Berhasil Disimpan');

					});
                    </script>");
			redirect('admin/dashboard');
		}
	}
}
