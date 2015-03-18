<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legals extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'titre' => 'Mentions Légales | Florian LE GOFF',
			'legals' => $this->admin_model->get_legals()
		);
		$this->load->view('legals', $data);
	}

	public function edit($rubrique = null)
	{
		if(!$this->session->userdata('logged') || $rubrique == null || !$this->admin_model->one_rubriqueCv($rubrique) ):
     		redirect('services');exit;
     	endif;

     	$this->form_validation->set_rules('rubrique', 'Rubrique', 'trim|required');
     	$this->form_validation->set_rules('informations', 'Informations', 'trim|required');

     	if($this->form_validation->run())
     	{
               $infos = array(
                    'rubrique' => $this->input->post('rubrique'),
                    'informations' => $this->input->post('informations')
               );

               $this->admin_model->edit_legal($rubrique, $infos);

               redirect('legals');exit;
     	}
     	else
     	{
     		$data = array(
     			'titre' => 'Edition de rubrique Service',
     			'rubrique' => $this->admin_model->get_oneLegal($rubrique)
     		);
     		$this->load->view('admin/legalsUpdate', $data);
     	}
	}
}

