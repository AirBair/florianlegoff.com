<?php

class Projets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'projets' => $this->admin_model->getAllProjets(),
			'nbProjets' => $this->admin_model->countProjets(),
			'titre' => 'Projets | Florian LE GOFF'
		);
		
		$this->load->view('projets/projets', $data);
	}

}