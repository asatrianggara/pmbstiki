<?php

class Datadiri_model extends CI_Model
{

	private $_table = 'datadiri';
	private $_table2 = 'user';

	public function rules()
	{
		return [
			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required|max_length[128]'
			]
		];
	}

	public function profile_rules()
	{
		return [
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|max_length[32]'
			],
		];
	}

	public function createid($datadiri)
	{
		return $this->db->insert($this->_table, $datadiri);
	}

	public function getdatadiri_byId($id)
	{
		$query = $this->db->get($this->_table);
		$this->db->where('id', $id);
		return $query->result();
	}

	/*public function get()
	{



		$query = $this->db->get($this->_table);
		return $query->result();
	}*/

	function get(){
      $this->db->select('*');
      $this->db->from('datadiri');
      $this->db->join('user','user.id = datadiri.id');      
      $query = $this->db->get();
      return $query->result();
   }


	public function find($id)
	{
		if (!$id) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('id' => $id));
		return $query->row();
	}


	public function update($datadiri)
	{
		if (!$datadiri['id']) {
			return;
		}
		return $this->db->update($this->_table, $datadiri, ['id' => $datadiri['id']]);
	}

	public function update_user($datadiri)
	{
		if (!$datadiri['id']) {
			return;
		}
		return $this->db->update($this->_table2, $datadiri, ['id' => $datadiri['id']]);
	}



	public function count(){
	return $this->db->count_all($this->_table);
	}


	


}