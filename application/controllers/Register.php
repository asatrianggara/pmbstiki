<?php

class Register extends CI_Controller
{
	public function index()
	{
		show_404();
	}

	public function register()
	{
		 $this->load->helper('form');
		$this->load->model('register_model');
		$this->load->model('datadiri_model');
		$this->load->model('berkas_model');
		$this->load->library('form_validation');

		$rules = $this->register_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message_register_error', 'Register Gagal, pastikan username dan password benar!');
			return $this->load->view('register_form');
		} else {
			$password = $this->input->post('password');
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = [
            	'id' => uniqid('', true), 
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $hashed_password
            ];
            $iddatadiri = [
            	'id_datadiri' => uniqid('', true), 
            	'id' => $data['id']
        	];
        	$idberkas = [
            	'id_berkas' => uniqid('', true), 
            	'id' => $data['id']
        	];

            $this->register_model->insert_newuser($data);
            $this->datadiri_model->createid($iddatadiri);
            $this->berkas_model->createid($idberkas);
            /*var_dump($data);*/

            return $this->load->view('login_form');
        }

		
	}

}