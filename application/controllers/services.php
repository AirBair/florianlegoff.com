<?php


  class Services extends CI_Controller

 {

 	public function __construct()
 	{
 		parent::__construct();
 	}


 	public function index()
 	{
 		$data['titre'] = 'Services | Florian LE GOFF';
 		$this->load->view('services/services', $data);
 	}
 }