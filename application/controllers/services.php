<?php


  class Services extends CI_Controller

 {

 	public function __construct()
 	{
 		parent::__construct();
 	}


 	public function index()
 	{
 		$data = array(
 			'titre' => 'Services | Florian LE GOFF',
 			'propose' => $this->admin_model->getOneService('propose'),
 			'but' => $this->admin_model->getOneService('but'),
 			'avantages' => $this->admin_model->getOneService('avantages'),
 			'informations' => $this->admin_model->getOneService('informations')
 		);

 		$this->load->view('services/services', $data);
 	}
 }