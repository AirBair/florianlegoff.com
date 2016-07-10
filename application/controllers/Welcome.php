<?php

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->language = !isset($_SESSION['lang']) ? 'french' : $_SESSION['lang'];
		$this->config->set_item('language', $this->language);
		$this->lang->load('general', $this->language);
	}

	public function index()
	{
		$data = array(
			'freelance_developper' => $this->admin_model->readConfig('freelance_developper'),
			'curriculum_vitae' => $this->admin_model->readConfig('curriculum_vitae'),
			'projects' => $this->admin_model->readProjects(),
			'skills_groups' => $this->admin_model->readSkills_groups(),
			'services' => $this->admin_model->readServices(),
			'gpg_key' => $this->admin_model->readConfig('gpg_key'),
			'tox_id' => $this->admin_model->readConfig('tox_id'),
			'legals' => array(
				$this->admin_model->readConfig('legals_author'),
				$this->admin_model->readConfig('legals_hosting'),
				$this->admin_model->readConfig('legals_resources'),
				$this->admin_model->readConfig('legals_license')
			)
		);
		$this->load->view('welcome', $data);
	}

	public function lang($lang)
	{
		if($lang == 'en')
			$_SESSION['lang'] = 'english';
		else
			$_SESSION['lang'] = 'french';

		redirect();exit;
	}

	public function send_mail()
	{
		if(!$this->input->is_ajax_request()):
			 redirect();exit;
		endif;

		$this->output->set_content_type('application/json');

		$this->form_validation->set_rules('name', $this->lang->line('contact_name'), 'trim|required');
		$this->form_validation->set_rules('email', $this->lang->line('contact_email'), 'trim|required|valid_email');
		$this->form_validation->set_rules('object', $this->lang->line('contact_object'), 'trim|required');
		$this->form_validation->set_rules('message', $this->lang->line('contact_message'), 'trim|required');

		if($this->form_validation->run())
		{
			 $name = $this->security->xss_clean($this->input->post('name'));
			 $from = $this->security->xss_clean($this->input->post('email'));
			 $object = $this->security->xss_clean($this->input->post('object'));
			 $message = nl2br($this->security->xss_clean($this->input->post('message')));

			 date_default_timezone_set('Europe/Paris');

			 // **  I. Sending Email  **
			 $this->load->library('email');
			 $this->email->from($from, $name);
			 $this->email->to('contact@florianlegoff.com');
			 $this->email->cc('florianlg@cryptolab.net');
			 $this->email->subject($object);
			 $this->email->message($message);
			 $this->email->send();


			 // **  II. Save Mail in DataBase.  **
			 $data = array(
				  'name' => $name,
				  'email' => $from,
				  'object' => $object,
				  'message' => $message,
				  'sending_date' => date("Y-m-d H:i:s")
			 );
			 $this->admin_model->createMail($data);

			echo json_encode("success");exit;
		}
		else
		{
			echo json_encode(validation_errors());exit;
		}
	}

}
