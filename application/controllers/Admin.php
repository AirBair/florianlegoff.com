<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
    }

    public function index()
    {
        if(!$this->session->userdata('logged')):
             redirect('admin/login');exit;
        endif;

        $data = array(
            'configs' => $this->admin_model->readConfig(),
            'projects' => $this->admin_model->readProjects(),
			'skills_groups' => $this->admin_model->readSkills_groups(),
			'services' => $this->admin_model->readServices(),
            'mails' => $this->admin_model->readMails(),
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

    public function readRowJSON($table, $id)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        $table = $this->security->xss_clean($table);
        $id = $this->security->xss_clean($id);

        switch ($table):
            case $this->admin_model->_config:
                $response = $this->admin_model->readConfig($id);
                break;
            case $this->admin_model->_projects:
                $response = $this->admin_model->readProjects($id);
                break;
            case $this->admin_model->_skills_groups:
                $response = $this->admin_model->readSkills_groups($id);
                break;
            case $this->admin_model->_skills_list:
                $response = $this->admin_model->readSkills(0, $id);
                break;
            case $this->admin_model->_services:
                $response = $this->admin_model->readServices($id);
                break;
            case $this->admin_model->_mails:
                $response = $this->admin_model->readMails($id);
                break;
            default:
                $response['error'] = 'Wrong table name given.';
                break;
        endswitch;

        echo json_encode($response);exit;
    }

    public function config($action, $label = NULL)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        if(isset($label)):
            $label = $this->security->xss_clean($label);
        endif;

        if($action == 'add' || $action =='edit'):

            if($action == 'add'):
                $this->form_validation->set_rules('config_label', 'Label', 'trim|required|is_unique['.$this->admin_model->_config.'.label]');
            endif;
            $this->form_validation->set_rules('config_title_french', 'French Title', 'trim|required');
            $this->form_validation->set_rules('config_title_english', 'English Title', 'trim|required');
            $this->form_validation->set_rules('config_content_french', 'French Content', 'trim|required');
            $this->form_validation->set_rules('config_content_english', 'English Content', 'trim|required');

            if($this->form_validation->run())
            {
                $fields = $this->security->xss_clean($this->input->post());
    			$data = array(
    				'title_french' => $fields['config_title_french'],
    				'title_english' => $fields['config_title_english'],
    				'content_french' => nl2br($fields['config_content_french']),
    				'content_english' => nl2br($fields['config_content_english'])
    			);

                if($action == 'add')
                {
                    $data['label'] = strtolower($fields['config_label']);
                    if($this->admin_model->createConfig($data))
                        $response['success'] = true;
                }
                else
                {
                    if($this->admin_model->updateConfig($label, $data))
                        $response['success'] = true;
                }
            }
            else
            {
                $response['validation_errors'] = validation_errors();
            }
        endif;

        if($action == 'delete'):
            if($this->admin_model->deleteConfig($label))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function projects($action, $label = NULL)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        if(isset($label)):
            $label = $this->security->xss_clean($label);
        endif;

        if($action == 'add' || $action =='edit'):

            if($action == 'add'):
                $this->form_validation->set_rules('projects_label', 'Label', 'trim|required|is_unique['.$this->admin_model->_projects.'.label]');
            endif;
            $this->form_validation->set_rules('projects_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('projects_subtitle_french', 'French SubTitle', 'trim|required');
            $this->form_validation->set_rules('projects_subtitle_english', 'English SubTitle', 'trim|required');
            $this->form_validation->set_rules('projects_description_french', 'French Description', 'trim|required');
            $this->form_validation->set_rules('projects_description_english', 'English Description', 'trim|required');
            $this->form_validation->set_rules('projects_customer', 'Customer', 'trim|required');
            $this->form_validation->set_rules('projects_webdesign', 'WebDesign', 'trim|required');
            $this->form_validation->set_rules('projects_date_realisation', 'Date Realisation', 'trim|required|regex_match[/[0-9]{4}-[0-9]{2}-[0-9]{2}/]');
            $this->form_validation->set_rules('projects_techno', 'Techno', 'trim|required');
            $this->form_validation->set_rules('projects_url', 'URL', 'trim|required');
            $this->form_validation->set_rules('projects_position', 'Position', 'trim|required|integer');

            if($this->form_validation->run())
            {
                $fields = $this->security->xss_clean($this->input->post());
    			$data = array(
                    'title' => $fields['projects_title'],
    				'subtitle_french' => $fields['projects_subtitle_french'],
    				'subtitle_english' => $fields['projects_subtitle_english'],
    				'description_french' => nl2br($fields['projects_description_french']),
    				'description_english' => nl2br($fields['projects_description_english']),
                    'customer' => $fields['projects_customer'],
                    'webdesign' => $fields['projects_webdesign'],
                    'date_realisation' => $fields['projects_date_realisation'],
                    'techno' => $fields['projects_techno'],
                    'url' => $fields['projects_url'],
                    'position' => $fields['projects_position']
    			);

                if($action == 'add')
                {
                    $data['label'] = strtolower($fields['projects_label']);
                    if($this->admin_model->createProject($data))
                        $response['success'] = true;
                }
                else
                {
                    if($this->admin_model->updateProject($label, $data))
                        $response['success'] = true;
                }
            }
            else
            {
                $response['validation_errors'] = validation_errors();
            }
        endif;

        if($action == 'delete'):
            if($this->admin_model->deleteProject($label))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function skills_groups($action, $id = NULL)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        if(isset($id)):
            $id = $this->security->xss_clean($id);
        endif;

        if($action == 'add' || $action =='edit'):

            $this->form_validation->set_rules('skills_groups_name_french', 'French Name', 'trim|required');
            $this->form_validation->set_rules('skills_groups_name_english', 'English Name', 'trim|required');
            $this->form_validation->set_rules('skills_groups_position', 'Position', 'trim|required|integer');

            if($this->form_validation->run())
            {
                $fields = $this->security->xss_clean($this->input->post());
                $data = array(
                    'name_french' => $fields['skills_groups_name_french'],
                    'name_english' => $fields['skills_groups_name_english'],
                    'position' => $fields['skills_groups_position']
                );

                if($action == 'add')
                {
                    if($this->admin_model->createSkills_group($data))
                        $response['success'] = true;
                }
                else
                {
                    if($this->admin_model->updateSkills_group($id, $data))
                        $response['success'] = true;
                }
            }
            else
            {
                $response['validation_errors'] = validation_errors();
            }
        endif;

        if($action == 'delete'):
            if($this->admin_model->deleteSkills_group($id))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function skills_list($action, $id = NULL)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        if(isset($id)):
            $id = $this->security->xss_clean($id);
        endif;

        if($action == 'add' || $action =='edit'):

            $this->form_validation->set_rules('skills_skills_group', 'Skills Group', 'trim|required|integer');
            $this->form_validation->set_rules('skills_name_french', 'French Name', 'trim|required');
            $this->form_validation->set_rules('skills_name_english', 'English Name', 'trim|required');
            $this->form_validation->set_rules('skills_icon', 'Icon', 'trim|required');
            $this->form_validation->set_rules('skills_mark', 'Mark', 'trim|required|integer');
            $this->form_validation->set_rules('skills_position', 'Position', 'trim|required|integer');

            if($this->form_validation->run())
            {
                $fields = $this->security->xss_clean($this->input->post());
                $data = array(
                    'skills_group' => $fields['skills_skills_group'],
                    'name_french' => $fields['skills_name_french'],
                    'name_english' => $fields['skills_name_english'],
                    'icon' => $fields['skills_icon'],
                    'mark' => $fields['skills_mark'],
                    'position' => $fields['skills_position']
                );

                if($action == 'add')
                {
                    if($this->admin_model->createSkill($data))
                        $response['success'] = true;
                }
                else
                {
                    if($this->admin_model->updateSkill($id, $data))
                        $response['success'] = true;
                }
            }
            else
            {
                $response['validation_errors'] = validation_errors();
            }
        endif;

        if($action == 'delete'):
            if($this->admin_model->deleteSkill($id))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function services($action, $id = NULL)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        if(isset($id)):
            $id = $this->security->xss_clean($id);
        endif;

        if($action == 'add' || $action =='edit'):

            $this->form_validation->set_rules('services_name_french', 'French Name', 'trim|required');
            $this->form_validation->set_rules('services_name_english', 'English Name', 'trim|required');
            $this->form_validation->set_rules('services_icon', 'Icon', 'trim|required');
            $this->form_validation->set_rules('services_content_french', 'French Content', 'trim|required');
            $this->form_validation->set_rules('services_content_english', 'English Content', 'trim|required');
            $this->form_validation->set_rules('services_position', 'Position', 'trim|required|integer');

            if($this->form_validation->run())
            {
                $fields = $this->security->xss_clean($this->input->post());
                $data = array(
                    'name_french' => $fields['services_name_french'],
                    'name_english' => $fields['services_name_english'],
                    'icon' => $fields['services_icon'],
                    'content_french' => $fields['services_content_french'],
                    'content_english' => $fields['services_content_english'],
                    'position' => $fields['services_position']
                );

                if($action == 'add')
                {
                    if($this->admin_model->createService($data))
                        $response['success'] = true;
                }
                else
                {
                    if($this->admin_model->updateService($id, $data))
                        $response['success'] = true;
                }
            }
            else
            {
                $response['validation_errors'] = validation_errors();
            }
        endif;

        if($action == 'delete'):
            if($this->admin_model->deleteService($id))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function mails($action, $id)
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        if(!$this->input->is_ajax_request()):
            echo "This function accept only AJAX requests";exit;
        endif;

        $id = $this->security->xss_clean($id);

        if($action == 'delete'):
            if($this->admin_model->deleteMail($id))
                $response['success'] = true;
        endif;


        if(!isset($response))
            $response['error'] = 'An Error occured in PHP Script.';

        echo json_encode($response);exit;
    }

    public function file_upload()
    {
        if(!$this->session->userdata('logged')):
            redirect('admin/login');exit;
        endif;

        $this->form_validation->set_rules('upload_path', 'Upload Path', 'trim|required');
        $this->form_validation->set_rules('upload_name', 'Upload Name', 'trim|required');

        if($this->form_validation->run()):
            $fields = $this->security->xss_clean($this->input->post());

            $config = array(
                'upload_path' => './assets/'.$fields['upload_path'],
                'allowed_types' => 'svg|png|jpg|gif',
                'file_name' => $fields['upload_name'],
                'file_ext_tolower' => true,
                'overwrite' => true
            );

            $this->load->library('upload', $config);

            if(!is_dir($config['upload_path']))
                    mkdir($config['upload_path'],0777,true);

            if($this->upload->do_upload('upload_file'))
                $this->session->set_flashdata('upload_success', '<p class="alert alert-success">The File '.$fields['upload_name'].' has been uploaded on '.$fields['upload_path'].' !</p>');
            else
                $this->session->set_flashdata('upload_error', '<p class="alert alert-danger">An error as occured during the upload of the file '.$fields['upload_name'].' on '.$fields['upload_path'].' !</p>');
        else:
            $this->session->set_flashdata('upload_error', validation_errors());
        endif;

        redirect('admin#admin_file_upload');
    }
}
