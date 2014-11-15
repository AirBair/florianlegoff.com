<?php

class Projets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('projets_model');
	}

	public function index()
	{
		$data = array(
			'projets' => $this->projets_model->getAll(),
			'titre' => 'Projets | Florian LE GOFF'
		);
		
		$this->load->view('projets/projets', $data);
	}

}