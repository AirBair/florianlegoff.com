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
		$data = array(
			'titre' => 'Mentions Légales | Florian LE GOFF',
               'description' => 'Mentions légales du site www.florianlegoff.com',
			'legals' => $this->admin_model->get_legals()
		);
		$this->load->view('legals', $data);
	}

     public function add()
     {
          if(!$this->session->userdata('logged')):
               redirect('services');exit;
          endif;

          $this->form_validation->set_rules('rubrique', 'Rubrique', 'trim|required');
          $this->form_validation->set_rules('informations', 'Informations', 'trim|required');

          if($this->form_validation->run())
          {
               $infos = array(
                    'rubrique' => $this->input->post('rubrique'),
                    'informations' => $this->input->post('informations')
               );

               $this->admin_model->add_legal($infos);

               redirect('legals');exit;
          }
          else
          {
               $data = array(
                    'titre' => 'Ajout de rubrique Service'
               );
               $this->load->view('admin/legals_admin', $data);
          }
     } // Fin de la fonction d'ajout de rubrique légale

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
                    'rubrique' => $this->input->post('rubrique'),
                    'informations' => $this->input->post('informations')
               );

               $this->admin_model->edit_legal($rubrique, $infos);

               redirect('legals');exit;
     	}
     	else
     	{
     		$data = array(
     			'titre' => 'Edition de rubrique Service',
     			'rubrique' => $this->admin_model->get_oneLegal($rubrique)
     		);
     		$this->load->view('admin/legals_admin', $data);
     	}
	} // Fin de la fonction d'édition de rubrique légale
} // Fin de la classe legals.php

