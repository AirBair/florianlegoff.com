<?php


  class Error_404 extends CI_Controller

 {

 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		$data['titre'] = 'Erreur 404 | Florian LE GOFF';
 		$this->load->view('404', $data);
 	}
 }
