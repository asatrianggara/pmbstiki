<?php

class Datadiri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('datadiri_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

/*public function index()
{
	$data['current_user'] = $this->auth_model->current_user();
	$data['datadiri'] = $this->datadiri_model->get_datadiri_byId();
	$data['jenis_page'] =  "datadiri";

		$this->load->view('admin/datadiri_form.php', $data);

}*/

	// public function new()
	// {
	// 	$data['current_user'] = $this->auth_model->current_user();
	// 	$data['jenis_page'] =  "datadiri";
	// 	$this->load->library('form_validation');
	// 	if ($this->input->method() === 'post') {
	// 		// Lakukan validasi sebelum menyimpan ke model
	// 		$rules = $this->datadiri_model->rules();
	// 		$this->form_validation->set_rules($rules);

	// 		if($this->form_validation->run() === FALSE){
	// 			return $this->load->view('admin/datadiri_form.php', $data);
	// 		}

	// 		// generate unique id and slug
	// 		$id = uniqid('', true);
	// 		$slug = url_title($this->input->post('title'), 'dash', TRUE) . '-' . $id;

	// 		$datadiri = [
	// 			'alamat' => $this->input->post('alamat'),
	// 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	// 			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
	// 			'asal_sekolah' => $this->input->post('asal_sekolah'),
	// 			'no_telp' => $this->input->post('no_telp'),
	// 			'draft' => $this->input->post('draft')
	// 		];

	// 		$saved = $this->article_model->insert($article);

	// 		if ($saved) {
	// 			$this->session->set_flashdata('message', 'Article was created');
	// 			return redirect('admin/post');
	// 		}
	// 	}

	// 	$this->load->view('admin/post_new_form.php', $data);
	// }

	public function edit($id = null)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['datadiri'] = $this->datadiri_model->find($id);
		$data['jenis_page'] =  "datadiri";
		$this->load->library('form_validation');

		if (!$data['datadiri'] || !$id) {
			show_404();
		}
		
		if ($this->input->method() === 'post') {
			// lakukan validasi data seblum simpan ke model
			$rules = $this->datadiri_model->rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				return $this->load->view('admin/datadiri_form.php', $data );
			}

			$datadiri = [
				'alamat' => $this->input->post('alamat'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'no_telp' => $this->input->post('no_telp'),
				'draft' => $this->input->post('draft')
			];

			$new_data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
			];

			$new_data['id'] = $data['current_user']->id;
			
			$updated_user = $this->datadiri_model->update_user($new_data);

			$datadiri['id'] = $id;
			
			$updated = $this->datadiri_model->update($datadiri);
			if ($updated || $updated_user) {
				$this->session->set_flashdata('message', 'Datadiri was updated');
				redirect('admin/datadiri/edit/'.$id);
			}
		}

		$this->load->view('admin/datadiri_form.php', $data);
	}

	public function edit_profile()
	{
		$this->load->library('form_validation');
		$this->load->model('profile_model');
		$data['current_user'] = $this->auth_model->current_user();
		$data['jenis_page'] =  "setting";
		if ($this->input->method() === 'post') {
			$rules = $this->datadiri_model->profile_rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				return $this->load->view('admin/datadiri_form.php', $data );
			}

			$new_data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
			];

			$new_data['id'] = $data['current_user']->id;
			
			$updated = $this->datadiri_model->update_user($new_data);
			if ($updated) {
				$this->session->set_flashdata('message', 'Datadiri was updated');
				redirect('admin/datadiri/edit/'.$data['current_user']->id);
			}
		}
		var_dump($data);
		$this->load->view('admin/datadiri_form.php', $data);
	}

	/*public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->article_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Article was deleted');
			redirect('admin/post');
		}
	}*/

	public function upload_avatar()
{
	$this->load->model('datadiri_model');
	$data['current_user'] = $this->auth_model->current_user();
	$data['jenis_page'] =  "datadiri";
	if ($this->input->method() === 'post') {
		// the user id contain dot, so we must remove it
		$file_name = str_replace('.','',$data['current_user']->id);
		$config['upload_path']          = FCPATH.'/upload/avatar/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB
		$config['max_width']            = 1080;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('avatar')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$uploaded_data = $this->upload->data();

			$new_data = [
				'id' => $data['current_user']->id,
				'avatar' => $uploaded_data['file_name'],
			];
	
			if ($this->datadiri_model->update_user($new_data)) {
				$this->session->set_flashdata('message', 'Avatar updated!');
				/*redirect(site_url('admin/datadiri/edit/'.$data['current_user']->id));*/
				redirect(site_url('admin/datadiri/upload_avatar'));
			}
		}
	}

	$this->load->view('admin/setting_upload_avatar.php', $data);
}

	public function remove_avatar()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->model('datadiri_model');
		$data['jenis_page'] =  "datadiri";
		// hapus file
	$file_name = str_replace('.', '', $current_user->id);
	array_map('unlink', glob(FCPATH."/upload/avatar/$file_name.*"));

		// set avatar menjadi null
		$new_data = [
			'id' => $data['current_user']->id,
			'avatar' => null,
		];

		if ($this->datadiri_model->update_user($new_data)) {
			$this->session->set_flashdata('message', 'Avatar dihapus!');
			redirect(site_url('admin/datadiri/edit/'.$data['current_user']->id));
		}
	}


}