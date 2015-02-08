<?php

class Profil extends CI_Controller
{
	public function index()
	{
		$this->french();
	}

	public function french()
	{
		$data['titre'] = 'Florian LE GOFF - Developpeur Web Saint-Malo';
		$this->load->view('profil/profil_french.php', $data);
	}
}