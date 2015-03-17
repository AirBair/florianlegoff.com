<?php

class Cv extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->model('admin_model');
     }

     public function index()
     {
     	$data = array(
               'titre' => 'CV Florian LE GOFF',
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
               $this->load->view('admin/cvAdd', $data);
          }
     }

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
     		$this->load->view('admin/cvUpdate', $data);
     	}
     }

     public function delete($rubrique = null)
     {
          if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->one_rubriqueCv($rubrique) ):
               redirect('cv');exit;
          endif;

          $this->admin_model->delete_rubriqueCv($rubrique);
          redirect('cv');exit;
     }


}