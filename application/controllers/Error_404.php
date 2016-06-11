<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error_404 extends CI_Controller
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
 		$this->load->view('404');
 	}
}
