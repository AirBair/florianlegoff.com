<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titre' => 'Florian LE GOFF - Developpeur Web Saint-Malo',
			'description' => 'Developpeur Web PHP / SQL / HTML / CSS / jQuery en Freelance. Disponible en Bretagne sur Lannion et Saint-Malo, n\'hésitez pas à me contacter !',
			'profil' => $this->admin_model->getProfil(1),
			'service' => $this->admin_model->getProfil(2)
		);
		$this->load->view('profil.php', $data);
	}

	public function edit($rubrique = null)
     {
     	if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->getProfil($rubrique) ):
     		redirect();exit;
     	endif;


     	$this->form_validation->set_rules('informations', 'Informations', 'trim|required');

     	if($this->form_validation->run())
     	{
               $infos['texte'] = $this->input->post('informations');

               $this->admin_model->editProfil($rubrique, $infos);

               redirect();exit;
     	}
     	else
     	{
     		$data = array(
     			'titre' => 'Edition de rubrique Profil',
     			'rubrique' => $this->admin_model->getProfil($rubrique)
     		);
     		$this->load->view('admin/profil_admin', $data);
     	}
     } // Fin de la fonction d'édition du profil

} // Fin de la classe profil.php (page d'accueil)