<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
     }


     public function index()
     {
          redirect('mails');exit;
     }

     public function connexion()
     {
          if ( $this->session->userdata('logged') ) // Si déja identifié, redirection vers la page principal.
               redirect(site_url('admin'));
          else // Si l'utilisateur n'est pas connecté.
          {
               // Condition de validation du formulaire
               $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

               if( $this->form_validation->run() ) // Si le formulaire de connexion à été envoyé, on le traite
               {
                    // Si la vérification des identifiants est correct, on connecte l'utilisateur
                    if ( $this->admin_model->identification(sha1(md5($this->input->post('password')))) )
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

} // Fin de la classe admin.php