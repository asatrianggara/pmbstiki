<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

/*	public function index()
	{
		$this->load->model('datadiri_model');

		
		$data = [
			"current_user" => $this->auth_model->current_user(),
			"user_count" => $this->datadiri_model->count(),
			"jenis_page" => "dashboard"
		];

		$this->load->view('staff/dashboard.php', $data);
	}*/

	public function index()
{
	$this->load->model('datadiri_model');
	$data['current_user'] = $this->auth_model->current_user();
	$data['user'] = $this->datadiri_model->get();
	$data['jenis_page'] =  "dashboard";
	if(count($data['user']) <= 0){
		$this->load->view('staff/user_empty.php', $data);
	} else {
		$this->load->view('staff/user_list.php', $data);
	}
}
}