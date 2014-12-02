<?php


  class Services extends CI_Controller

 {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('projets_model');
 	}


 	public function index()
 	{
 		$data = array(
 			'titre' => 'Services | Florian LE GOFF',
 			'propose' => $this->projets_model->getService('propose'),
 			'but' => $this->projets_model->getService('but'),
 			'avantages' => $this->projets_model->getService('avantages'),
 			'informations' => $this->projets_model->getService('informations')
 		);

 		$this->load->view('services/services', $data);
 	}
 }