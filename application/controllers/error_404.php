<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller
{

 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		$data = array(
 			'titre' => 'Erreur 404 | Florian LE GOFF',
 			'description' => 'Cette page n\'existe pas sur le site mon site ! - Florian LE GOFF'
 		);
 		$this->load->view('404', $data);
 	}
} // Fin de la classe error_404.php
