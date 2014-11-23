<?php  

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{
	public $table = 'mailPerso';

	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->select('*')
						->from($this->table)
						->order_by('id', 'desc')
						->get()
						->result();
		
	}

	public function count($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->table);
	}

	public function identification()
	{
		$req = $this->db->select('*')
						->from('mdpAdmin')
						->get()
						->result();

		foreach ($req as $mdp)
		{
			return $mdp->mdp;
		}
		
	}


}