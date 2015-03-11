<?php

class Cv extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
     	$data['titre'] = 'CV Florian LE GOFF';
     	$this->load->view('cv', $data);
     }


}