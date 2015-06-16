<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titre' => 'Florian LE GOFF - Developpeur Web Saint-Malo',
			'description' => 'Developpeur Web PHP / SQL / HTML / CSS / jQuery en Freelance. Disponible en Bretagne sur Lannion et Saint-Malo, n\'hésitez pas à me contacter !'
		);
		$this->load->view('profil.php', $data);
	}
} // Fin de la classe profil.php (page d'accueil)