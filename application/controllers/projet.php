<?php

class Projet extends CI_Controller
{
	public function index()
	{
		$this->french();
	}

	public function french()
	{
		$this->load->view('construction');
	}
}