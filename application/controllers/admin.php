<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->helper('date');
     }


     public function index()
     {
          redirect('admin/mail');exit;
     }

     public function connexion()
     {
          if ( $this->session->userdata('logged') ) // Si déja identifié, redirection vers la page principal.
               redirect(site_url('admin'));
          else // Si l'utilisateur n'est pas connecté.
          {
               // Condition de validation du formulaire
               $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');

               if( $this->form_validation->run() ) // Si le formulaire de connexion à été envoyé, on le traite
               {
                    // Si la vérification des identifiants est correct, on connecte l'utilisateur
                    if ( sha1(md5($this->input->post('password'))) ==  $this->admin_model->identification())
                    {
                         $data = array('login'=> 'Florian', 'logged'=>true);
                         $this->session->set_userdata($data);
                         redirect(site_url('admin'));

                    }
                    else // Si les identifiants sont incorrects, on affiche l'erreur.
                    {
                         $data['error'] = 'Mauvais mot de passe.';
                         $data['titre'] = 'Connexion Admin | Florian LE GOFF';
                         $this->load->view('admin/identification', $data);  
                    }
               }
               else // Si le formulaire n'as pas été envoyé - Page de connexion
               {
                    $data['titre'] = 'Connexion Admin | Florian LE GOFF';
                    $this->load->view('admin/identification', $data);    
               }
          }
     }

     public function deconnexion()
     {
          $this->session->unset_userdata('login');
          $this->session->unset_userdata('logged');
          $this->session->sess_destroy();
          redirect(site_url());
     }

     public function mail()
     {
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          if ($this->admin_model->countMail() == 0)
               $data['nomail'] = ' Aucun mail';
          else
               $data['mails'] = $this->admin_model->readMail();
     	    
          $data['titre'] = 'Boite Mail | Espace Admin';
          $this->load->view('admin/mailsAdmin', $data);
          
     }

     public function competences($action = null, $idSkill = null)
     {
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;
               
          if ( $action == 'modif' )
          {

               if ( $this->admin_model->getCompetence($idSkill) )
               {
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

                         $data = array(
                              'titre' => 'Modifications compétences | Espace Admin',
                              'categories' => $this->admin_model->getCategorieSkill(),
                              'competence' => $this->admin_model->getCompetence($idSkill),
                              'success' => true
                         );

                         $this->load->view('admin/skillUpdate', $data);
                    }
                    else // Si le formulaire n'est pas rempli
                    {
                         $data = array(
                              'titre' => 'Modifications compétences | Espace Admin',
                              'categories' => $this->admin_model->getCategorieSkill(),
                              'competence' => $this->admin_model->getCompetence($idSkill)
                         );

                         $this->load->view('admin/skillUpdate', $data);
                    }
                         
               }
               else // Si l'id de la compétence n'existe pas
                    echo 'Numero de competence inconnu';
          } // Fin de la fonction modif
          else
          {
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

                    $this->load->view('admin/skillsAdmin', $data);
               }
               else // Si le formulaire n'est pas rempli
               {
                    $data = array(
                         'titre' => 'Compétences | Espace Admin',
                         'categories' => $this->admin_model->getCategorieSkill()
                    );

                    $this->load->view('admin/skillsAdmin', $data);
               }
          } // Fin de l'ajout/affichage des compétences
     } // Fin de la gestion des compétences

     public function projets($projet = null)
     {
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          $this->form_validation->set_rules('titre', 'Titre du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('sousTitre', 'Sous-Titre du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('miniature', 'Miniature du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('logo', 'Logo du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('description', 'Description du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('client', 'Client du projet', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('date', 'Date de réalisation', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('webdesign', 'Webdesigner', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('techno', 'Technologies utilisées', 'trim|reuired|xss_clean');
          $this->form_validation->set_rules('url', 'URL du projet', 'trim|reuired|xss_clean');

          if ($projet != null)
          {
               if( $this->admin_model->getOneprojet($projet) ) // Modification d'un projet
               {
                    $infos = array(
                         'titre_projet' => $this->input->post('titre'),
                         'sousTitre_projet' => $this->input->post('sousTitre'),
                         'miniature_projet' => $this->input->post('miniature'),
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
                    redirect('admin/projets');exit;
               }
               else if ($projet == 'new') // Ajout d'un projet
               {
                    $infos = array(
                         'titre_projet' => $this->input->post('titre'),
                         'sousTitre_projet' => $this->input->post('sousTitre'),
                         'attribut_projet' => $this->input->post('attribut'),
                         'miniature_projet' => $this->input->post('miniature'),
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
                    redirect('admin/projets');exit;
               }
               else // Si l'action ou le numero de projet n'existe pas, redirection vers la page d'administration des projets.
                    redirect('admin/projets');exit;
          }
          else
          {
               $data = array(
                    'projets' => $this->admin_model->getAllProjets(),
                    'nbProjets' => $this->admin_model->countProjets(),
                    'titre' => 'Projets | Espace Admin'
               );
               $this->load->view('admin/projetsAdmin', $data);
          }
     } // Fin de la gestion des projets

     public function services($service = null)
     {
          // Vérification des droits administrateurs
          if( !$this->session->userdata('logged') ):
               redirect('admin/connexion');exit;
          endif;

          $this->form_validation->set_rules('titre', 'Titre du service', 'trim|required|xss_clean');
          $this->form_validation->set_rules('contenu', 'Contenu du service', 'trim|required|xss_clean');

          if($this->admin_model->getOneService($service) && $this->form_validation->run())
          {
               $infos = array(
                    'titre' => $this->input->post('titre'),
                    'contenu' => $this->input->post('contenu')
               );

               $this->admin_model->updateService($service, $infos);
               $this->session->set_flashdata('success', true);
               redirect('admin/services');exit;
          }
          else
          {
               $data = array(
                    'titre' => 'Services | Espace Admin',
                    'services' => $this->admin_model->getServices()
               );

               $this->load->view('admin/servicesAdmin', $data);
          }
     } // Fin de la gestion des services
} // Fin de la classe admin.php