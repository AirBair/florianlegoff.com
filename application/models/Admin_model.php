<?php  

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	// Déclarations des tables à utiliser.
	private $mail = 'mailPerso';
	private $admin = 'mdpAdmin';
	private $profil = 'profil';
	private $projets = 'projets';
	private $catSkill = 'skillCategories';
	private $skills = 'competences';
	private $services = 'services';
	private $catCv = 'cvCategories';
	private $cv = 'cv';
	private $legals = 'legals';

	/*************************************************************************
							IDENTIFICATION ADMINISTRATEUR
	*************************************************************************/

	// Retourne le mot de passe hashé
	public function identification($mdp)
	{
		$req = $this->db->select('*')
						->from($this->admin)
						->where('mdp', $mdp)
						->get();

		if ($req->num_rows() > 0)
			return true;
	}

	/*************************************************************************
									BOITE MAIL
	*************************************************************************/

	// Compte le nombre de mail
	public function countMail($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->mail);
	}

	// Retourne tous les mails
	public function readMail()
	{
		return $this->db->select('*')
						->from($this->mail)
						->order_by('id', 'desc')
						->get()
						->result();
	}

	// Retourne un mail précis
	public function getMail($mail)
	{
		$req = $this->db->select('*')
					 	->from($this->mail)
					 	->where('id', $mail)
					 	->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Sauvegarde un mail 
	public function saveMail($data)
	{
		return $this->db->insert($this->mail, $data);
	}

	// Supprime un mail
	public function delMail($mail)
	{
		return $this->db->where('id', $mail)
						->delete($this->mail);
	}

	/*************************************************************************
									Profil
	*************************************************************************/

	// Retourne une rubrique du profil
	public function getProfil($id)
	{
		$req = $this->db->select('*')
						->from($this->profil)
						->where('id', $id)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Modifie une rubrique du profil
	public function editProfil($id, $infos)
	{
		return $this->db->where('id', $id)
						->update($this->profil, $infos);
	}


	/*************************************************************************
									COMPETENCES
	*************************************************************************/

	// Compte le nombre de compétences
	public function countSkills()
	{
		return (int) $this->db->count_all_results($this->skills);
	}

	// Retourne les catégories des compétences (sans les compétences)
	public function getCategorieSkill()
	{
		return $this->db->select('*')
						->from($this->catSkill)
						->order_by('id_catSkill', 'asc')
						->get()
						->result();
	}

	// Retourne toutes les compétences d'une catégorie
	public function readSkill($categorie)
	{
		$req = $this->db->select('*')
						->from($this->skills)
						->where('cat_skill', $categorie)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne une compétence précise
	public function getCompetence($idSkill)
	{
		$req = $this->db->select('*')
						->from($this->skills)
						->where('id_skill', $idSkill)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Ajoute une compétence
	public function addSkill($data)
	{
		$this->db->insert($this->skills, $data);

		return $this->db->insert_id();
	}

	// Modifie une compétence
	public function modifSkill($skill, $infos)
	{
		return $this->db->where('id_skill', $skill)
						->update($this->skills, $infos);
	}

	// Supprime une compétence
	public function delSkill($skill)
	{
		return $this->db->where('id_skill', $skill)
						->delete($this->skills);
	}

	/*************************************************************************
									PROJETS
	*************************************************************************/
	
	// Compte le nombre de projet
	public function countProjets()
	{
		return (int) $this->db->count_all_results($this->projets);
	}

	// Retourne tous les projets
	public function getAllProjets()
	{
		$req = $this->db->select('*')
						->from($this->projets)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne un projet précis
	public function getOneProjet($attr)
	{
		$req = $this->db->select('*')
						->from($this->projets)
						->where('attribut_projet', $attr)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Ajoute un projet
	public function addProjet($data)
	{
		return $this->db->insert($this->projets, $data);
	}

	// Modifie un projet
	public function updateProjet($projet, $data)
	{
		return $this->db->where('attribut_projet', $projet)
						->update($this->projets, $data);
	}

	// Supprime un projet
	public function delProjet($projet)
	{
		return $this->db->where('attribut_projet', $projet)
						->delete($this->projets);
	}

	/*************************************************************************
									SERVICES
	*************************************************************************/

	// Retourne tous les services
	public function getServices()
	{
		$req = $this->db->select('*')
						->from($this->services)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne un service précis
	public function getOneService($service)
	{
		$req = $this->db->select('*')
						->from($this->services)
						->where('id', $service)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Modifie un service
	public function updateService($service, $data)
	{
		return $this->db->where('id', $service)
						->update($this->services, $data);
	}

	/*************************************************************************
									CV
	*************************************************************************/

	// Retourne les catégories du CV (sans les rubriques des catégories)
	public function get_categoriesCv()
	{
		$req = $this->db->select('*')
						->from($this->catCv)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne toutes les rubriques d'une catégorie du CV
	public function get_rubriquesCv($section)
	{
		$req = $this->db->select('*')
						->from($this->cv)
						->where('section', $section)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne une rubrique précise
	public function one_rubriqueCv($id)
	{
		$req = $this->db->select('*')
						->from($this->cv)
						->where('id', $id)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Ajoute une rubrique au CV
	public function add_rubriqueCv($infos)
	{
		return $this->db->insert($this->cv, $infos);
	}

	// Modifie une rubrique au CV
	public function edit_rubriqueCv($id, $infos)
	{
		return $this->db->where('id', $id)
						->update($this->cv, $infos);

		return true;
	}

	// Supprime une rubrique du CV
	public function delete_rubriqueCv($id)
	{
		return $this->db->where('id', $id)
						->delete($this->cv);
	}


	/*************************************************************************
							Mentions Légales
	*************************************************************************/

	// Retourne toutes les mentions légales
	public function get_legals()
	{
		$req = $this->db->select('*')
						->from($this->legals)
						->get();

		if($req->num_rows() > 0)
			return $req->result();
	}

	// Retourne une rubrique légale précise
	public function get_oneLegal($rubrique)
	{
		$req = $this->db->select('*')
						->from($this->legals)
						->where('id', $rubrique)
						->get();

		if($req->num_rows() > 0)
			return $req->row();
	}

	// Ajoute une rubrique légale
	public function add_legal($infos)
	{
		return $this->db->insert($this->legals, $infos);
	}

	// Modifie une rubrique légale
	public function edit_legal($id, $infos)
	{
		return $this->db->where('id', $id)
						->update($this->legals, $infos);
	}

	// Supprime une rubrique légale
	public function del_legal($id)
	{
		return $this->db->where('id', $id)
						->delete($this->legals);
	}

} // Fin du modèle admin_model.php