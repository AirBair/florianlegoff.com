<?php

class Contact extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->model('admin_model');
          $this->load->helper('date');
     }


	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		// Définition des règles du formulaire.
		//$this->form_validation->set_rules('expediteur', 'Adresse E-mail de l\'expéditeur', 'trim|required|valid_email');

		$nom = htmlentities($this->input->post('nom'));
		$expediteur = $this->input->post('mail');
		$message = nl2br(htmlentities($this->input->post('message')));
          $objet = htmlentities($this->input->post('objet'));

		if (!empty($message))
            {
     
                    // **  I. Envoi de mail  **

                    // Configuration du service de mail
                    $this->load->library('email');
                    $this->email->from($expediteur, $nom);
                    $this->email->to('contact@florianlegoff.com');
                    $this->email->cc('florianlg@a.jupimail.com');
                    $this->email->subject($objet);
                    $this->email->message($message);
                    $this->email->send();
 
 
                    // **  II. Sauvegarde du mail en base de données.  **

                    // Mise en tableau des données à insérer
                    $data = array('nom' => $nom,
                                   'email' => $expediteur,
                                   'objet' => $objet,
                                   'message' => $message,
                                   'date_envoi' => date("Y-m-d H:i:s")
                         );

                    // Envoi en base de données
                    $this->admin_model->saveMail($data);
 
                    // Affichage de la page de confirmation.
                    return $this->load->view('contact_confirmation');
 
            }

		else
		{  
               $data['titre'] = 'Contact | Florian LE GOFF';
			$this->load->view('contact', $data);
		}
	}
}