<?php

class Projets extends CI_Controller
{
	public function index()
	{
		$data['titre'] = 'Projets | Florian LE GOFF';
		$this->load->view('projets/projets', $data);
	}

}