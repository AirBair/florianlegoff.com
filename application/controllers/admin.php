<?php

class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->model('admin_model');
          $this->load->helper('date');
     }


     public function index()
     {
          redirect('admin/mail');exit;
     }

     public function connexion()
     {
          // Si l'utilisateur est déja connecté, on le redirige vers la page principal.
          if ( $this->session->userdata('logged') )
          {
               redirect(site_url('admin'));
          }

          // Si l'utilisateur n'est pas connecté.
          else
          {
               $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');

               // Si le formulaire de connexion à été envoyé, on le traite
               if( $this->form_validation->run() )
               {
                    // Si la vérification des identifiants est correct, on connecte l'utilisateur
                    if ( sha1(md5($this->input->post('password'))) ==  $this->admin_model->identification())
                    {
                         $data = array('login'=> 'Florian', 'logged'=>true);
                         $this->session->set_userdata($data);
                         redirect(site_url('admin'));

                    }

                    // Si les identifiants sont incorrects, on affcihe l'erreur.
                    else
                    {
                         $data['error'] = 'Mauvais mot de passe.';
                         $data['titre'] = 'Connexion Admin | Florian LE GOFF';
                         $this->load->view('admin/identification', $data);  
                    }
               }

               // Si le formulaire n'as pas été envoyé - Page de base.
               else
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
          if( $this->session->userdata('logged') )
          {
               if ($this->admin_model->countMail() == 0)
               {
                    $data['nomail'] = ' Aucun mail';
               }
               else
               {
                    $data['mails'] = $this->admin_model->readMail();
               }
     	    
               $data['titre'] = 'Boite Mail | Espace Admin';
     	    $this->load->view('admin/mailsAdmin', $data);
          }

          else
          {
               redirect('admin/connexion');exit;
          }
     }

     public function competences($action = null, $idSkill = null)
     {
          if( $this->session->userdata('logged') )
          {
               if ( $action == 'modif' )
               {

                    if ( $this->admin_model->getCompetence($idSkill) )
                    {
                         $this->form_validation->set_rules('titreSkill', 'Intitulé de la compétence', 'trim|required|xss_clean');
                         $this->form_validation->set_rules('logoSkill', 'Logo de la compétence', 'trim|required|xss_clean');
                         $this->form_validation->set_rules('catSkill', 'Catégorie de la compétence', 'trim|required|xss_clean');
                         $this->form_validation->set_rules('descriptionSkill', 'Description de la compétence', 'trim|required|xss_clean');

                         if ( $this->form_validation->run() )
                         {
                              $competence = array(
                                   'title_skill' => htmlspecialchars($this->input->post('titreSkill')),
                                   'logo_skill' => htmlspecialchars($this->input->post('logoSkill')),
                                   'about_skill' => $this->input->post('descriptionSkill'),
                                   'cat_skill' => htmlspecialchars($this->input->post('catSkill'))
                              );

                              $this->admin_model->modifSkill($idSkill, $competence);

                              $data = array(
                                   'titre' => 'Modifications compétences | Espace Admin',
                                   'categories' => $this->admin_model->getCategorieSkill(),
                                   'competence' => $this->admin_model->getCompetence($idSkill),
                                   'success' => true
                              );

                              $this->load->view('admin/skillUpdate', $data);
                         }
                         else
                         {
                              $data = array(
                                   'titre' => 'Modifications compétences | Espace Admin',
                                   'categories' => $this->admin_model->getCategorieSkill(),
                                   'competence' => $this->admin_model->getCompetence($idSkill)
                              );

                              $this->load->view('admin/skillUpdate', $data);
                         }
                         
                    }
                    else
                    {
                         echo 'Numero de competence inconnu';
                    }
               }
               else
               {
                    $this->form_validation->set_rules('titreSkill', 'Intitulé de la compétence', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('logoSkill', 'Logo de la compétence', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('catSkill', 'Catégorie de la compétence', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('descriptionSkill', 'Description de la compétence', 'trim|required|xss_clean');

                    if ( $this->form_validation->run() )
                    {
                         $competence = array(
                              'title_skill' => htmlspecialchars($this->input->post('titreSkill')),
                              'logo_skill' => htmlspecialchars($this->input->post('logoSkill')),
                              'about_skill' => $this->input->post('descriptionSkill'),
                              'cat_skill' => htmlspecialchars($this->input->post('catSkill'))
                         );

                         $this->admin_model->addSkill($competence);

                         $data = array(
                              'titre' => 'Compétences | Espace Admin',
                              'categories' => $this->admin_model->getCategorieSkill(),
                              'success' => true
                         );

                         $this->load->view('admin/skillsAdmin', $data);
                    }
                    else
                    {
                         $data = array(
                              'titre' => 'Compétences | Espace Admin',
                              'categories' => $this->admin_model->getCategorieSkill()
                         );

                         $this->load->view('admin/skillsAdmin', $data);
                    }
               }
          }
          else
          {
               redirect('admin/connexion');exit;
          }
     }

     public function projets($projet = null)
     {
          if( $this->session->userdata('logged') )
          {
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
                    if( $this->admin_model->getOneprojet($projet) )
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
                    else if ($projet == 'new')
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
                    else
                    {
                         redirect('admin/projets');exit;
                    }
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
               
          }
          else
          {
               redirect('admin/connexion');exit;
          }
     }

     public function services($service = null)
     {
          if( $this->session->userdata('logged') )
          {
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
               
          }
          else
          {
               redirect('admin/connexion');exit;
          }
     }

     public function cloud()
     {
          if( $this->session->userdata('logged') )
          {
               if( !empty($_FILES['fichier']) )
               {
                    
                    $config['upload_path'] = './assets/documents/upload/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|mp4|txt|pdf|odt|odp|ods|zip|rar|htm|html|css|js';
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if( $this->upload->do_upload('fichier') )
                    {
                         $data['success'] = true;
                    }
                    else
                    {
                         $data['error'] = true;
                    }

                    $data['titre'] = 'Mon Cloud | Florian LE GOFF';
                    $this->load->view('admin/cloud', $data);
               }
               else
               {

                    $data = array(
                         'titre' => 'Mon Cloud | Florian LE GOFF'
                    );

                    $this->load->view('admin/cloud', $data);
               }
          }
          else
          {
               redirect('admin/connexion');exit;
          }
     }


}