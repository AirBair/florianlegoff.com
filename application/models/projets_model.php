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


}