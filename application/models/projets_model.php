<?php  

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Projets_model extends CI_Model
{
	
	public function getAll()
	{
		return $this->db->select('*')
						->from('projets')
						->get()
						->result();
	}

	public function getService($service)
	{
		$req = $this->db->select('*')
						->from('services')
						->where('nom', $service)
						->get();
		if($req->num_rows > 0)
		{
			return $req->row();
		}
	}

}