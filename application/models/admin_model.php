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
	private $catCv = 'cvCategories';
	private $cv = 'cv';
	private $legals = 'legals';

	/*************************************************************************
							IDENTIFICATION ADMINISTRATEUR
	*************************************************************************/

	// Retourne le mot de passe hashé
	public function identification()
	{
		$req = $this->db->select('*')
						->from($this->admin)
						->get()
						->result();

		if ($req->num_rows() > 0)
		{
			return $req->row();
		}
		
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
		{
			return $req->row();
		}
	}

	// Sauvegarde un mail 
	public function saveMail($data)
	{
		$this->db->insert($this->mail, $data);
	}

	// Supprime un mail
	public function delMail($mail)
	{
		$this->db->where('id', $mail);
		$this->db->delete($this->mail);
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
		{
			return $req->result();
		}
	}

	// Retourne une compétence précise
	public function getCompetence($idSkill)
	{
		$req = $this->db->select('*')
						->from($this->skills)
						->where('id_skill', $idSkill)
						->get()
						->result();

		if($req->num_rows() > 0)
		{
			return $req->row();
		}
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
		$this->db->where('id_skill', $skill);
		$this->db->update($this->skills, $infos);
	}

	// Supprime une compétence
	public function delSkill($skill)
	{
		$this->db->where('id_skill', $skill);
		$this->db->delete($this->skills);

		return true;
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
		return $this->db->select('*')
						->from($this->projets)
						->get()
						->result();
	}

	// Retourne un projet précis
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

	// Ajoute un projet
	public function addProjet($data)
	{
		$this->db->insert($this->projets, $data);
	}

	// Modifie un projet
	public function updateProjet($projet, $data)
	{
		$this->db->where('attribut_projet', $projet);
		$this->db->update($this->projets, $data);
	}

	// Supprime un projet
	public function delProjet($projet)
	{
		$this->db->where('attribut_projet', $projet);
		$this->db->delete($this->projets);
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

		if($req->num_rows > 0)
		{
			return $req->result();
		}
	}

	// Retourne un service précis
	public function getOneService($service)
	{
		$req = $this->db->select('*')
						->from($this->services)
						->where('id', $service)
						->get();
		if($req->num_rows > 0)
		{
			return $req->row();
		}
	}

	// Modifie un service
	public function updateService($service, $data)
	{
		$this->db->where('id', $service);
		$this->db->update($this->services, $data);
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

		if( $req->num_rows() > 0 )
		{
			return $req->result();
		}
	}

	// Retourne toutes les rubriques d'une catégorie du CV
	public function get_rubriquesCv($section)
	{
		$req = $this->db->select('*')
						->from($this->cv)
						->where('section', $section)
						->get();

		if( $req->num_rows() > 0 )
		{
			return $req->result();
		}
	}

	// Retourne une rubrique précise
	public function one_rubriqueCv($id)
	{
		$req = $this->db->select('*')
						->from($this->cv)
						->where('id', $id)
						->get();

		if( $req->num_rows() > 0 )
		{
			return $req->row();
		}		
	}

	// Ajoute une rubrique au CV
	public function add_rubriqueCv($infos)
	{
		$this->db->insert($this->cv, $infos);

		return true;
	}

	// Modifie une rubrique au CV
	public function edit_rubriqueCv($id, $infos)
	{
		$this->db->where('id', $id);
		$this->db->update($this->cv, $infos);

		return true;
	}

	// Supprime une rubrique du CV
	public function delete_rubriqueCv($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->cv);

		return true;
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

		if( $req->num_rows() > 0)
		{
			return $req->result();
		}
	}

	// Retourne une rubrique légale précise
	public function get_oneLegal($rubrique)
	{
		$req = $this->db->select('*')
						->from($this->legals)
						->where('id', $rubrique)
						->get();

		if( $req->num_rows() > 0)
		{
			return $req->row();
		}
	}

	// Ajoute une rubrique légale
	public function add_legal($infos)
	{
		$this->db->insert($this->legals, $infos);
	}

	// Modifie une rubrique légale
	public function edit_legal($id, $infos)
	{
		$this->db->where('id', $id);
		$this->db->update($this->legals, $infos);

		return true;
	}

	// Supprime une rubrique légale
	public function del_legal($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->legals);
	}

} // Fin du modèle admin_model.php