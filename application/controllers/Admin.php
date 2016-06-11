<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if(!$this->session->userdata('logged')):
             redirect('admin/login');exit;
        endif;

        $data = array(
            'freelance_developper' => $this->admin_model->getConfig('freelance_developper'),
            'legals' => array(
				$this->admin_model->getConfig('legals_author'),
				$this->admin_model->getConfig('legals_hosting'),
				$this->admin_model->getConfig('legals_resources'),
				$this->admin_model->getConfig('legals_license')
			),
            'projects' => $this->admin_model->getProjects(),
			'skills_groups' => $this->admin_model->getSkills_groups(),
			'services' => $this->admin_model->getServices(),
            'mails' => $this->admin_model->getMails(),
        );
        $this->load->view('admin_dashboard',$data);
    }

    public function login()
    {
        if($this->session->userdata('logged')):
            redirect(site_url('admin'));exit;
        endif;
        $data = array();
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run())
        {
            if($this->admin_model->login(sha1(md5($this->security->xss_clean($this->input->post('password')))))):
                $data = array('login' => 'Florian', 'logged'=>true);
                $this->session->set_userdata($data);
                redirect('admin');exit;
            else:
                $data['error'] = 'Wrong password.';
            endif;
        }
        $this->load->view('admin_login', $data);
     }

     public function logout()
     {
          $this->session->unset_userdata('login');
          $this->session->unset_userdata('logged');
          $this->session->sess_destroy();
          redirect();exit;
     }
}
