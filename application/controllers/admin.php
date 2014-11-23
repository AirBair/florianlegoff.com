<?php

class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->model('contact_model');
          $this->load->helper('date');
     }


     public function index()
     {
          $this->mail();
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
                    if ( sha1(md5($this->input->post('password'))) ==  $this->contact_model->identification())
                    {
                         $data = array('login'=> 'Florian', 'logged'=>true);
                         $this->session->set_userdata($data);
                         redirect(site_url('admin'));

                    }

                    // Si les identifiants sont incorrects, on affcihe l'erreur.
                    else
                    {
                         $data['error'] = 'Mauvais mot de passe.';
                         $data['titre'] = 'Connexion';
                         $this->load->view('admin/identification', $data);  
                    }
               }

               // Si le formulaire n'as pas été envoyé - Page de base.
               else
               {
                    $data['titre'] = 'Connexion';
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
               if ($this->contact_model->count() == 0)
               {
                    $data['nomail'] = ' Aucun mail';
               }
               else
               {
                    $data['mails'] = $this->contact_model->read();
               }
     	    

     	    $this->load->view('admin/mail', $data);
          }

          else
          {
               $this->connexion();
          }
     }

}