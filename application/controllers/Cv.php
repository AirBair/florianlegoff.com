<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cv extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
     	$data = array(
               'titre' => 'CV Florian LE GOFF',
               'description' => 'Mon Curiculum Vitae - Florian LE GOFF',
               'section' => $this->admin_model->get_categoriesCv()
          );
     	$this->load->view('cv', $data);
     }

     public function add()
     {
          if(!$this->session->userdata('logged')):
               redirect('cv');exit;
          endif;


          $this->form_validation->set_rules('rubrique', 'Rubrique', 'trim|required');
          $this->form_validation->set_rules('section', 'Section', 'trim|required');
          $this->form_validation->set_rules('informations', 'Informations', 'trim|required');

          if($this->form_validation->run())
          {
               $infos = array(
                    'section' => $this->input->post('section'),
                    'rubrique' => $this->input->post('rubrique'),
                    'informations' => $this->input->post('informations')
               );

               $this->admin_model->add_rubriqueCv($infos);

               redirect('cv');exit;
          }
          else
          {
               $data = array(
                    'titre' => 'Edition de rubrique CV',
                    'sections' => $this->admin_model->get_categoriesCv()
               );
               $this->load->view('admin/cv_admin', $data);
          }
     } // Fin de la fonction d'ajout de rubrique CV

     public function edit($rubrique = null)
     {
     	if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->one_rubriqueCv($rubrique) ):
     		redirect('cv');exit;
     	endif;


     	$this->form_validation->set_rules('rubrique', 'Rubrique', 'trim|required');
     	$this->form_validation->set_rules('section', 'Section', 'trim|required');
     	$this->form_validation->set_rules('informations', 'Informations', 'trim|required');

     	if($this->form_validation->run())
     	{
               $infos = array(
                    'section' => $this->input->post('section'),
                    'rubrique' => $this->input->post('rubrique'),
                    'informations' => $this->input->post('informations')
               );

               $this->admin_model->edit_rubriqueCv($rubrique, $infos);

               redirect('cv');exit;
     	}
     	else
     	{
     		$data = array(
     			'titre' => 'Edition de rubrique CV',
                    'sections' => $this->admin_model->get_categoriesCv(),
     			'rubrique' => $this->admin_model->one_rubriqueCv($rubrique)
     		);
     		$this->load->view('admin/cv_admin', $data);
     	}
     } // Fin de la fonction d'édition de rubrique CV

     public function delete($rubrique = null)
     {
          if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->one_rubriqueCv($rubrique) ):
               redirect('cv');exit;
          endif;

          if($this->input->is_ajax_request())
          {
               $this->admin_model->delete_rubriqueCv($rubrique);
               $response['success'] = true;
               echo json_encode($response);exit;
          }
          else
          {
               $this->admin_model->delete_rubriqueCv($rubrique);
               redirect('cv');exit;
          }
          
     } // Fin de la fonction de suppression de rubrique CV


}