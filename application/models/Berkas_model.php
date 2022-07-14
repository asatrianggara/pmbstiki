<?php

class Berkas_model extends CI_Model
{

	private $_table = 'berkas';

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

	public function createid($berkas)
	{
		return $this->db->insert($this->_table, $berkas);
	}

	public function getberkas_byId($id)
	{
		$query = $this->db->get($this->_table);
		$this->db->where('id', $id);
		return $query->row();
	}

	public function find($id)
	{
		if (!$id) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('id' => $id));
		return $query->row();
	}


public function update_berkas($berkas)
	{
		if (!$berkas['id']) {
			return;
		}
		return $this->db->update($this->_table, $berkas, ['id' => $berkas['id']]);
	}
	

	


}