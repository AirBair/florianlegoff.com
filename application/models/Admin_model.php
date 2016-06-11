<?php

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	private $_config = 'config';
	private $_mails = 'mails';
	private $_projects = 'projects';
	private $_skills_groups = 'skills_groups';
	private $_skills_list = 'skills_list';
	private $_services = 'services';
	private $_cv_groups = 'cv_groups';
	private $_cv_list = 'cv_list';


	/*************************************************************************
								ADMINISTRATION ACCESS
	*************************************************************************/

	public function login($mdp)
	{
		$req = $this->db->select('*')
						->from($this->_config)
						->where('label','admin_password')
						->where('content_fr',$mdp)
						->get();

		if($req->num_rows() > 0)
			return true;
	}


	/*************************************************************************
									CONFIG
	*************************************************************************/

	public function getConfig($label = NULL)
	{
		if(isset($label))
		{
			$req = $this->db->select('*')
						->from($this->_config)
						->where('label', $label)
						->get()
						->row_array();
		}
		else
		{
			$req = $this->db->select('*')
						->from($this->_config)
						->where('label !=', 'admin_password') // All except the admin password.
						->get()
						->result_array();
		}

		return $req;
	}

	public function editConfig($label, $data)
	{
		return $this->db->where('label', $label)
						->update($this->_config, $data);
	}


	/*************************************************************************
									MAILBOX
	*************************************************************************/

	public function countMails($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->_mails);
	}

	public function getMails($id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
						 	->from($this->_mails)
						 	->where('id', $id)
						 	->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_mails)
							->order_by('id', 'desc')
							->get()
							->result_array();
		}

		return $req;
	}

	public function addMail($data)
	{
		return $this->db->insert($this->_mails, $data);
	}

	public function deleteMail($mail)
	{
		return $this->db->where('id', $mail)
						->delete($this->_mails);
	}

	/*************************************************************************
									PROJECTS
	*************************************************************************/

	public function countProjects()
	{
		return (int) $this->db->count_all_results($this->_projects);
	}

	public function getProjects($label = NULL)
	{
		if(isset($label))
		{
			$req = $this->db->select('*')
							->from($this->_projects)
							->where('label', $label)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_projects)
							->order_by('position','asc')
							->get()
							->result_array();
		}

		return $req;
	}

	public function addProject($data)
	{
		return $this->db->insert($this->_projects, $data);
	}

	public function updateProject($label, $data)
	{
		return $this->db->where('label', $label)
						->update($this->_projects, $data);
	}

	public function deleteProjet($label)
	{
		return $this->db->where('label', $label)
						->delete($this->_projects);
	}


	/*************************************************************************
									COMPETENCES
	*************************************************************************/

	public function countSkills()
	{
		return (int) $this->db->count_all_results($this->_skills_list);
	}

	public function getSkills_groups()
	{
		return $this->db->select('*')
						->from($this->_skills_groups)
						->order_by('position', 'asc')
						->get()
						->result_array();
	}

	public function getSkills($group, $id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
							->from($this->_skills_list)
							->where('id', $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_skills_list)
							->where('skills_group', $group)
							->order_by('position')
							->get()
							->result_array();
		}

		return $req;
	}

	public function addSkill($data)
	{
		if($this->db->insert($this->_skills_list, $data))
			return $this->db->insert_id();
	}

	public function updateSkill($id, $data)
	{
		return $this->db->where('id', $id)
						->update($this->_skills_list, $data);
	}

	public function deleteSkill($id)
	{
		return $this->db->where('id', $id)
						->delete($this->_skills_list);
	}


	/*************************************************************************
									SERVICES
	*************************************************************************/

	public function countServices()
	{
		return (int) $this->db->count_all_results($this->_skills_list);
	}

	public function getServices($id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
							->from($this->_services)
							->where('id', $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_services)
							->order_by('position')
							->get()
							->result_array();
		}

		return $req;
	}

	public function addService($data)
	{
		if($this->db->insert($this->_services, $data))
			return $this->db->insert_id();
	}

	public function updateService($id, $data)
	{
		return $this->db->where('id', $id)
						->update($this->_services, $data);
	}

	public function deleteService($id)
	{
		return $this->db->where('id', $id)
						->delete($this->_services);
	}


	/*************************************************************************
									CV
	*************************************************************************/

	public function countItems()
	{
		return (int) $this->db->count_all_results($this->_cv_list);
	}

	public function getCV_groups()
	{
		return $this->db->select('*')
						->from($this->_cv_groups)
						->order_by('position', 'asc')
						->get()
						->result_array();
	}

	public function getItems($group, $id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
							->from($this->_cv_list)
							->where('id', $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_cv_list)
							->where('cv_group', $group)
							->order_by('position')
							->get()
							->result_array();
		}

		return $req;
	}

	public function addItem($data)
	{
		if($this->db->insert($this->_cv_list, $data))
			return $this->db->insert_id();
	}

	public function updateItem($id, $data)
	{
		return $this->db->where('id', $id)
						->update($this->_cv_list, $data);
	}

	public function deleteItem($id)
	{
		return $this->db->where('id', $id)
						->delete($this->_cv_list);
	}

} // End admin_model.php
