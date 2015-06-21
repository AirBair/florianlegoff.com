<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Competences extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titre' => 'Compétences | Florian LE GOFF',
			'description' => 'Mes compétences en programmation et gestion de projets - Florian LE GOFF.',
			'categories' => $this->admin_model->getCategorieSkill()
		);

		$this->load->view('competences', $data);
	}

	public function add()
	{
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          $this->form_validation->set_rules('titreSkill', 'Intitulé de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('logoName', 'Logo de la compétence', 'trim|xss_clean');
          $this->form_validation->set_rules('catSkill', 'Catégorie de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('note', 'Note de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('descriptionSkill', 'Description de la compétence', 'trim|required|xss_clean');

          if ( $this->form_validation->run() )
          {
               $competence = array(
                    'title_skill' => htmlspecialchars($this->input->post('titreSkill')),
                    'logo_skill' => htmlspecialchars($this->input->post('logoName')),
                    'about_skill' => $this->input->post('descriptionSkill'),
                    'note' => $this->input->post('note'),
                    'cat_skill' => htmlspecialchars($this->input->post('catSkill'))
               );

               $lastId = $this->admin_model->addSkill($competence);

               if(!empty($_FILES['logoSkill']['name'])):

                    // On configure les informations d'upload
                    $config = array(
                         'upload_path' => './assets/images/Skills/',
                         'allowed_types' => 'gif|jpg|jpeg|png'
                    );

                    // On upload l'image selon la configuration établie
                    $this->load->library('upload', $config);

                    // Si l'upload de la première image s'est effectué
                    if( $this->upload->do_upload('logoSkill') )
                    {
                         // On affecte la variable en base de données.
                         $data_upload = $this->upload->data();
                         $image = array(
                              'logo_skill' => $data_upload['file_name']
                         );
                         $this->admin_model->modifSkill($lastId, $image);
                    }
                    else
                         echo 'Erreur dans l\'upload de l\'image.';
               endif;

               $data = array(
                    'titre' => 'Compétences | Espace Admin',
                    'categories' => $this->admin_model->getCategorieSkill(),
                    'success' => true
               );

               $this->session->set_flashdata('success', true);
               redirect('competences');exit;
          }
          else // Si le formulaire n'est pas rempli
          {
               $data = array(
                    'titre' => 'Compétences | Espace Admin',
                    'categories' => $this->admin_model->getCategorieSkill()
               );

               $this->load->view('admin/competences_admin', $data);
          }
	} // Fin de la fonction d'ajout de compétences.

	public function edit($idSkill = null)
	{
		// Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

		if ( !$this->admin_model->getCompetence($idSkill) ):
			redirect('competences');exit;
		endif;

          $this->form_validation->set_rules('titreSkill', 'Intitulé de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('logoName', 'Logo de la compétence', 'trim|xss_clean');
          $this->form_validation->set_rules('catSkill', 'Catégorie de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('note', 'Note de la compétence', 'trim|required|xss_clean');
          $this->form_validation->set_rules('descriptionSkill', 'Description de la compétence', 'trim|required|xss_clean');

          if ( $this->form_validation->run() )
          {
               $competence = array(
                    'title_skill' => htmlspecialchars($this->input->post('titreSkill')),
                    'logo_skill' => htmlspecialchars($this->input->post('logoName')),
                    'about_skill' => $this->input->post('descriptionSkill'),
                    'note' => $this->input->post('note'),
                    'cat_skill' => htmlspecialchars($this->input->post('catSkill'))
               );

               $this->admin_model->modifSkill($idSkill, $competence);

               if(!empty($_FILES['logoSkill']['name'])):

                    // On configure les informations d'upload
                    $config = array(
                       'upload_path' => './assets/images/Skills/',
                       'allowed_types' => 'gif|jpg|jpeg|png',
                       'overwrite' => TRUE
                    );

                    // On upload l'image selon la configuration établie
                    $this->load->library('upload', $config);

                    // Si l'upload de la première image s'est effectué
                    if( $this->upload->do_upload('logoSkill') )
                    {
                         // On affecte la variable en base de données.
                         $data_upload = $this->upload->data();
                         $image = array(
                              'logo_skill' => $data_upload['file_name']
                         );
                         $this->admin_model->modifSkill($idSkill, $image);
                    }
                    else
                         echo 'Erreur dans l\'upload de l\'image.';
               endif;

               $this->session->set_flashdata('success', true);
               redirect('competences');exit;
          }
          else // Si le formulaire n'est pas rempli
          {
               $data = array(
                    'titre' => 'Modifications compétences | Espace Admin',
                    'categories' => $this->admin_model->getCategorieSkill(),
                    'competence' => $this->admin_model->getCompetence($idSkill)
               );

               $this->load->view('admin/competences_admin', $data);
          }
	} // Fin de la fonction d'édition de compétence.

     public function delete($idSkill = null)
     {
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          if ( !$this->admin_model->getCompetence($idSkill) ):
               redirect('competences');exit;
          endif;

          if( $this->admin_model->delSkill($idSkill) )
          {
               if($this->input->is_ajax_request())
               {
                    $response['success'] = true;
                    echo json_encode($response);exit;
               }
               else
               {
                    $this->session->set_flashdata('success', true);
                    redirect('competences');exit;
               }
               
          }
          else
               echo 'Erreur à la suppression';

     } // Fin de la fonction de supression de compétences

} // Fin de la classe competences.php