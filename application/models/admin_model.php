<?php  

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	// Déclarations des tables à utiliser.
	private $mail = 'mailPerso';
	private $admin = 'mdpAdmin';
	private $projets = 'projets';
	private $catSkill = 'skillCategories';
	private $skills = 'competences';
	private $services = 'services';

	/*************************************************************************
							IDENTIFICATION ADMINISTRATEUR
	*************************************************************************/

	public function identification()
	{
		$req = $this->db->select('*')
						->from($this->admin)
						->get()
						->result();

		foreach ($req as $mdp)
		{
			return $mdp->mdp;
		}
		
	}

	/*************************************************************************
									BOITE MAIL
	*************************************************************************/

	public function saveMail($data)
	{
		$this->db->insert($this->mail, $data);
	}

	public function readMail()
	{
		return $this->db->select('*')
						->from($this->mail)
						->order_by('id', 'desc')
						->get()
						->result();
		
	}

	public function countMail($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->mail);
	}

	/*************************************************************************
									COMPETENCES
	*************************************************************************/

	public function getCategorieSkill()
	{
		return $this->db->select('*')
						->from($this->catSkill)
						->order_by('id_catSkill', 'asc')
						->get()
						->result();
	}

	public function addSkill($data)
	{
		$this->db->insert($this->skills, $data);
	}

	public function readSkill($categorie)
	{
		$req = $this->db->select('*')
						->from($this->skills)
						->where('cat_skill', $categorie)
						->get();

		if($req->num_rows() > 0)
		{
			return $req->result();
		}
	}

	public function getCompetence($idSkill)
	{
		$req = $this->db->select('*')
						->from($this->skills)
						->where('id_skill', $idSkill)
						->get()
						->result();

		foreach($req as $cpt)
		{
			return $cpt;
		}
	}

	public function modifSkill($skill, $infos)
	{
		$this->db->where('id_skill', $skill);
		$this->db->update($this->skills, $infos);
	}

	/*************************************************************************
									PROJETS
	*************************************************************************/

	public function getAllProjets()
	{
		return $this->db->select('*')
						->from($this->projets)
						->get()
						->result();
	}

	public function getOneProjet($attr)
	{
		$req = $this->db->select('*')
						->from($this->projets)
						->where('attribut_projet', $attr)
						->get();

		if($req->num_rows() > 0)
		{
			return $req->row();
		}
	}

	public function updateProjet($projet, $data)
	{
		$this->db->where('attribut_projet', $projet);
		$this->db->update($this->projets, $data);
	}

	/*************************************************************************
									SERVICES
	*************************************************************************/

	public function getServices()
	{
		$req = $this->db->select('*')
						->from($this->services)
						->get();

		if($req->num_rows > 0)
		{
			return $req->result();
		}
	}

	public function getOneService($service)
	{
		$req = $this->db->select('*')
						->from($this->services)
						->where('nom', $service)
						->get();
		if($req->num_rows > 0)
		{
			return $req->row();
		}
	}

	public function updateService($service, $data)
	{
		$this->db->where('nom', $service);
		$this->db->update($this->services, $data);
	}
}