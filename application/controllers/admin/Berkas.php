<?php

class Berkas extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if (!$this->auth_model->current_user()) {
			redirect('auth/login');
		}
	}

/*	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['jenis_page'] =  "berkas";
		$this->load->view('admin/berkas_form', $data);
	}*/

		public function upload_berkas()
{
	$this->load->model('berkas_model');
	$data['current_user'] = $this->auth_model->current_user();
	$data['berkas'] = $this->berkas_model->find($data['current_user']->id);
/*	$data['namafile'] = str_replace('.','',$data['current_user']->id) . '-ijazah';*/
	$data['jenis_page'] =  "berkas";
	$jenis_file =  $this->input->post('jenis_file');
	$data['isi_draft'] = $this->input->post('draft');






	/*if($data['isi_draft'] == NULL){

	$data['drafts'] = $data['berkas']->draft;

	}else{
	$data['drafts'] = "false";
	}*/


	if ($this->input->method() === 'post') {
		// the user id contain dot, so we must remove it
		$file_name = str_replace('.','',$data['current_user']->id);
		$config['upload_path']          = FCPATH.'/upload/berkas/';
		$config['allowed_types']        = 'pdf|jpg|jpeg|png';
		$config['file_name']            = $file_name . '-' .$jenis_file;
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB
		$config['max_width']            = 2480;
		$config['max_height']           = 3508;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($jenis_file)) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$uploaded_data = $this->upload->data();


			
			$new_data = [
				'id' => $data['current_user']->id,
				$jenis_file => $uploaded_data['file_name'],
			];


	
			if ($this->berkas_model->update_berkas($new_data)) {
				$this->session->set_flashdata('message', 'Berkas updated!');
				/*redirect(site_url('admin/datadiri/edit/'.$data['current_user']->id));*/
				redirect(site_url('admin/berkas/upload_berkas'));
			}
		}
	}
	$this->load->view('admin/berkas_form.php', $data);
}

	public function simpan_draft()
	{

	$this->load->model('berkas_model');
	$data['current_user'] = $this->auth_model->current_user();
	$data['berkas'] = $this->berkas_model->find($data['current_user']->id);
/*	$data['namafile'] = str_replace('.','',$data['current_user']->id) . '-ijazah';*/
	$data['jenis_page'] =  "berkas";


	if ($this->input->method() === 'post') {

		$new_data = [
				'id' => $data['current_user']->id,
				'draft' => "false",
			];

		if ($this->berkas_model->update_berkas($new_data)) {
				$this->session->set_flashdata('message', 'Berkas updated!');
				/*redirect(site_url('admin/datadiri/edit/'.$data['current_user']->id));*/
				redirect(site_url('admin/berkas/upload_berkas'));
		}

	}
	$this->load->view('admin/berkas_form.php', $data);
	}

	public function remove_berkas()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->model('berkas_model');
		$data['jenis_page'] =  "berkas";
		// hapus file
	$file_name = str_replace('.', '', $current_user->id);
	array_map('unlink', glob(FCPATH."/upload/berkas/$file_name.*"));


		//ambil value dari button untuk jenis file yang di hapus
		$index = $this->input->post('jenis_file');

		// set berkas menjadi null
		$new_data = [
			'id' => $data['current_user']->id,
			$index => null,
		];

		if ($this->berkas_model->update_berkas($new_data)) {
			$this->session->set_flashdata('message', 'Berkas dihapus!');
			redirect(site_url('admin/berkas/'));
		}
	}

}