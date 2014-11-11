<?php

class Description extends CI_Controller
{
	public function index()
	{
		$this->french();
	}

	public function french()
	{
		$this->load->view('description/description');
	}
}