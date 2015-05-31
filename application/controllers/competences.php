<?php

class Competences extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titre' => 'Compétences | Florian LE GOFF',
			'description' => 'Compétences en programmation et gestion de projets - Florian LE GOFF.',
			'categories' => $this->admin_model->getCategorieSkill()
		);

		$this->load->view('competences', $data);
	}
}