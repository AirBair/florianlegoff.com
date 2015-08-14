<?php

class Projets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'projets' => $this->admin_model->getAllProjets(),
			'nbProjets' => $this->admin_model->countProjets(),
			'titre' => 'Projets | Florian LE GOFF',
			'description' => 'Decouvrez mes projets en détails ! - Florian LE GOFF'
		);
		
		$this->load->view('projets', $data);
	}

	public function add()
	{
		// Vérification des droits administrateurs
        if( !$this->session->userdata('logged') ):
            redirect('admin/connexion');exit;
        endif;

        $this->form_validation->set_rules('titre', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sousTitre', 'Sous-Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('logo', 'Logo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('client', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('webdesign', 'webdesign', 'trim|required|xss_clean');
        $this->form_validation->set_rules('techno', 'techno', 'trim|required|xss_clean');
        $this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prev', 'Projet précédent', 'trim|required|xss_clean');
        $this->form_validation->set_rules('next', 'Projet suivant', 'trim|required|xss_clean');
        $this->form_validation->set_rules('position', 'position', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {
            $infos = array(
                'titre_projet' => $this->input->post('titre'),
                'sousTitre_projet' => $this->input->post('sousTitre'),
                'icone_projet' => $this->input->post('logo'),
                'description_projet' => $this->input->post('description'),
                'client_projet' => $this->input->post('client'),
                'date_projet' => $this->input->post('date'),
                'webdesign_projet' => $this->input->post('webdesign'),
                'technologies_projet' => $this->input->post('techno'),
                'url_projet' => $this->input->post('url'),
                'prev_projet' => $this->input->post('prev'),
                'next_projet' => $this->input->post('next'),
                'position_projet' => $this->input->post('position')
            );

            $this->admin_model->addProjet($infos);
            $this->session->set_flashdata('success', true);
            redirect('projets');exit;
        }
        else
        {
            $data = array(
                'titre' => 'Ajout de projet | Florian LE GOFF'
            );

            $this->load->view('admin/projets_admin', $data);
        }
	} // Fin de la fonction d'ajout de projet

	public function edit($projet = null)
	{
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          if( !$this->admin_model->getOneprojet($projet) ):
               redirect('projets');exit;
          endif;

          $this->form_validation->set_rules('titre', 'Titre', 'trim|required|xss_clean');
          $this->form_validation->set_rules('sousTitre', 'Sous-Titre', 'trim|required|xss_clean');
          $this->form_validation->set_rules('logo', 'Logo', 'trim|required|xss_clean');
          $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
          $this->form_validation->set_rules('client', 'Titre', 'trim|required|xss_clean');
          $this->form_validation->set_rules('date', 'date', 'trim|required|xss_clean');
          $this->form_validation->set_rules('webdesign', 'webdesign', 'trim|required|xss_clean');
          $this->form_validation->set_rules('techno', 'techno', 'trim|required|xss_clean');
          $this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {
            $infos = array(
                'titre_projet' => $this->input->post('titre'),
                'sousTitre_projet' => $this->input->post('sousTitre'),
                'icone_projet' => $this->input->post('logo'),
                'description_projet' => $this->input->post('description'),
                'client_projet' => $this->input->post('client'),
                'date_projet' => $this->input->post('date'),
                'webdesign_projet' => $this->input->post('webdesign'),
                'technologies_projet' => $this->input->post('techno'),
                'url_projet' => $this->input->post('url')
            );

            $this->admin_model->updateProjet($projet, $infos);
            $this->session->set_flashdata('success', true);
            redirect('projets');exit;
        }
        else
        {
        	$data = array(
                'titre' => 'Modification de projet | Florian LE GOFF',
                'projet' => $this->admin_model->getOneprojet($projet)
            );

            $this->load->view('admin/projets_admin', $data);
        }
	} // Fin de l'édition d'un projet

} // Fin de la classe projets.php
