<?php

class Register_model extends CI_Model
{

	private $_table = 'user';

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}



	public function insert_newuser($data)
	{

		$this->db->insert('user',$data);
		
	}




}