<?php

class Competences extends CI_Controller
{
	public function index()
	{
		$this->french();
	}

	public function french()
	{
		$data['titre'] = 'Compétences | Florian LE GOFF';
		$this->load->view('competences/competences', $data);
	}
}