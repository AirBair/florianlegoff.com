<?php

class Competences extends CI_Controller
{
	public function index()
	{
		$this->french();
	}

	public function french()
	{
		$data['titre'] = 'Compétences | Florian LE GOFF';
		$data['categories'] = $this->admin_model->getCategorieSkill();
		$this->load->view('competences', $data);
	}
}