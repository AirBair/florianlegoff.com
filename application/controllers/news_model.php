<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/************************************************************************************************/
/*
*	News-model
*
*	create($auteur, $date, $contenu)
*	read()
*	update($id, $date, $contenu)
* 	delete($id)
* 	count($where = array())
* 	
*/
/************************************************************************************************/

class News_model extends CI_Model
{
	protected $table = 'news';

/************************************************************************************************/

	/* 
	*	Ajoute une news
	*
	* 	@paramInfos (type='string', name='auteur', description='Auteur de la news')
	*	@paramInfos (type='string', name='date', description='Date de la news')
	*	@paramInfos (type='string', name='contenu', description='Contenu de la news')
	* 	@return (type='bool', description='Le résultat de la requête')
	*/

	public function create($auteur, $date, $contenu)
	{	

		return $this->db->set(array('auteur' => $auteur, 
									'date' => $date,
									'message' => $contenu))
						->set('date_modif', 'NOW()', false)
						->insert($this->table);

	}

/************************************************************************************************/

	/*
	*	Retourne une liste de news
	*
	*	@return (type='objet', description='La liste de news')
	*/

	public function read()
	{
		return $this->db->select('*')
						->from($this->table)
						->order_by('ID', 'desc')
						->get()
						->result();
	}

/************************************************************************************************/

	/*
	*	Edite une news existante
	*
	*	@paramInfos (type='integer', name='id', description='ID de la news à éditer')
	*	@paramInfos (type='string', name='date', description='Date de la news')
	*	@paramInfos (type='string', name='contenu', description='Contenu de la news')
	* 	@return (type='bool', description='Le résultat de la requête')
	*/

	public function update($id, $data)
	{
		$this->db->where('ID', $id);
		$this->db->update($this->table, $data);

		/*$this->db->set('date', $date);
		$this->db->set('message', $contenu);

		//
		$this->db->set('date_modif', 'NOW()', false);

		// Condtion
		$this->db->where('ID', $id);

		// On retourne la requête.
		return $this->db->update($this->table);*/

	}


/************************************************************************************************/

	/* 
	*	Supprimer une news existante
	*
	*	@paramInfos (type='integer', name='id', description='ID de la news')
	* 	@return (type='bool', description='Le résultat de la requête')
	*/

	public function delete($id)
	{
		$this->db->where('ID', $id);
		$this->db->delete($this->table);
	}


/************************************************************************************************/

	/*
	*	Retourne une news précise 
	*
	*	@paramInfos (type='objet' name='id', description='ID de la news demandé')
	*	@return (type='objet', description='Retourne La news demandé')
	*/

	public function news_precise($id)
	{
		return $this->db->select('*')
						->from($this->table)
						->where('ID', $id)
						->get()
						->result();
	}



	/*
	*	Retourne le nombre de news 
	*	
	*	@paramInfos (type='array', name='where', descritpion='Tableau associatif permettant de définir des conditions de recherches')
	*	@return (type='int', description='Nombre de news correspondant à la condition')
	*/
	public function count($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->table);
	}	

}

/* 
*	Fin du fichier model_news.php
*	Location : ./application/models/model_news.php
*/