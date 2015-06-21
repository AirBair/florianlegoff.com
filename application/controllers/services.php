<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
               'description' => 'Vous cherchez à réaliser votre site internet ? Je vous propose mes services de développeur web !',
 			'propose' => $this->admin_model->getOneService('propose'),
 			'but' => $this->admin_model->getOneService('but'),
 			'avantages' => $this->admin_model->getOneService('avantages'),
 			'informations' => $this->admin_model->getOneService('informations'),
 			'services' => $this->admin_model->getServices()
 		);

 		$this->load->view('services', $data);
 	}

 	public function edit($rubrique = null)
     {
     	if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->one_rubriqueCv($rubrique) ):
     		redirect('services');exit;
     	endif;


     	$this->form_validation->set_rules('rubrique', 'Rubrique', 'trim|required');
     	$this->form_validation->set_rules('informations', 'Informations', 'trim|required');

     	if($this->form_validation->run())
     	{
               $infos = array(
                    'titre' => $this->input->post('rubrique'),
                    'contenu' => $this->input->post('informations')
               );

               $this->admin_model->updateService($rubrique, $infos);

               redirect('services');exit;
     	}
     	else
     	{
     		$data = array(
     			'titre' => 'Edition de rubrique Service',
     			'rubrique' => $this->admin_model->getOneService($rubrique)
     		);
     		$this->load->view('admin/services_admin', $data);
     	}
     } // Fin de la fonction d'édition de services
 } // Fin de la classe services.php