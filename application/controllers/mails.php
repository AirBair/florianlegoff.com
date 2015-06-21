<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mails extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
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
        $this->load->view('admin/mails_admin', $data);
          
    }

    public function delete($mail = null)
    {
     	if( !$this->session->userdata('logged') ):
            redirect('admin/connexion');exit;
        endif;

        if( $this->input->is_ajax_request() ) // Si c'est une reqûête AJAX
		{
			if($this->admin_model->delMail($mail))
			{
				$response = array(
            		'success' => true
            	);
			}
        	else
        	{
        		$response = array(
        			'error' => true
        		);
        	}

			echo json_encode($response);exit;
		}
		else
		{
			if($this->admin_model->delMail($mail))
            	$this->session->set_flashdata('error', true);
        	else
        		$this->session->set_flashdata('error', true);

        	redirect('mails');exit;
		}
        

    }

}