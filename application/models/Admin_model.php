<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public $_config = 'config';
	public $_mails = 'mails';
	public $_projects = 'projects';
	public $_skills_groups = 'skills_groups';
	public $_skills_list = 'skills_list';
	public $_services = 'services';
	public $_cv_groups = 'cv_groups';
	public $_cv_list = 'cv_list';

	/*************************************************************************
								ADMINISTRATION ACCESS
	*************************************************************************/

	public function login($mdp)
	{
		$req = $this->db->select('*')
						->from($this->_config)
						->where('label','admin_password')
						->where('content_french',$mdp)
						->get();

		if($req->num_rows() > 0)
			return true;
	}


	/*************************************************************************
									CONFIG
	*************************************************************************/

	public function readConfig($label = NULL)
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

	public function createConfig($data)
	{
		return $this->db->insert($this->_config, $data);
	}

	public function updateConfig($label, $data)
	{
		return $this->db->where('label', $label)
						->update($this->_config, $data);
	}

	public function deleteConfig($label)
	{
		return $this->db->where('label', $label)
						->delete($this->_config);
	}

	/*************************************************************************
									MAILBOX
	*************************************************************************/

	public function countMails($where = array())
	{
		return (int) $this->db->where($where)->count_all_results($this->_mails);
	}

	public function readMails($id = NULL)
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

	public function createMail($data)
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

	public function readProjects($label = NULL)
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

	public function createProject($data)
	{
		return $this->db->insert($this->_projects, $data);
	}

	public function updateProject($label, $data)
	{
		return $this->db->where('label', $label)
						->update($this->_projects, $data);
	}

	public function deleteProject($label)
	{
		return $this->db->where('label', $label)
						->delete($this->_projects);
	}


	/*************************************************************************
									SKILLS
	*************************************************************************/

	public function countSkills_groups()
	{
		return (int) $this->db->count_all_results($this->_skills_groups);
	}

	public function readSkills_groups($id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
							->from($this->_skills_groups)
							->where('id', $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_skills_groups)
							->order_by('position', 'asc')
							->get()
							->result_array();
		}

		return $req;
	}

	public function createSkills_group($data)
	{
		if($this->db->insert($this->_skills_groups, $data))
			return $this->db->insert_id();
	}

	public function updateSkills_group($id, $data)
	{
		return $this->db->where('id', $id)
						->update($this->_skills_groups, $data);
	}

	public function deleteSkills_group($id)
	{
		return $this->db->where('id', $id)
						->delete($this->_skills_groups);
	}

	public function countSkills()
	{
		return (int) $this->db->count_all_results($this->_skills_list);
	}

	public function readSkills($group, $id = NULL)
	{
		$cols = "$this->_skills_list.id, skills_group, $this->_skills_groups.name_french as skills_group_name_french, $this->_skills_groups.name_english as skills_group_name_english, $this->_skills_list.name_french, $this->_skills_list.name_english, icon, mark, $this->_skills_list.position";
		if(isset($id))
		{
			$req = $this->db->select($cols)
							->from($this->_skills_list)
							->join($this->_skills_groups, "$this->_skills_groups.id = $this->_skills_list.skills_group")
							->where("$this->_skills_list.id", $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select($cols)
							->from($this->_skills_list)
							->join($this->_skills_groups, "$this->_skills_groups.id = $this->_skills_list.skills_group")
							->where('skills_group', $group)
							->order_by("$this->_skills_list.position")
							->get()
							->result_array();
		}

		return $req;
	}

	public function createSkill($data)
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

	public function readServices($id = NULL)
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

	public function createService($data)
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

	public function countCVGroups()
	{
		return (int) $this->db->count_all_results($this->_cv_groups);
	}

	public function readCVGroups($id = NULL)
	{
		if(isset($id))
		{
			$req = $this->db->select('*')
							->from($this->_cv_groups)
							->where('id', $id)
							->get()
							->row_array();
		}
		else
		{
			$req = $this->db->select('*')
							->from($this->_cv_groups)
							->order_by('position', 'asc')
							->get()
							->result_array();
		}

		return $req;
	}

	public function countCVItems()
	{
		return (int) $this->db->count_all_results($this->_cv_list);
	}

	public function readCVItems($group, $id = NULL)
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

	public function createCVItem($data)
	{
		if($this->db->insert($this->_cv_list, $data))
			return $this->db->insert_id();
	}

	public function updateCVItem($id, $data)
	{
		return $this->db->where('id', $id)
						->update($this->_cv_list, $data);
	}

	public function deleteCVItem($id)
	{
		return $this->db->where('id', $id)
						->delete($this->_cv_list);
	}

}
