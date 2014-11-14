<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legals extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['titre'] = 'Mentions Légales | Florian LE GOFF';
		$this->load->view('legals', $data);
	}
}
