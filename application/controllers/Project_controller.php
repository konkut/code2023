<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project_controller extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation'); //cargando libreria
        $this->load->library('session'); //cargando libreria
        $this->load->model('Project_model', 'project'); //cargando el modelo
	}

    public function index(){
        $data['projects'] = $this->project->get_all();

        $data['title'] = "Proyecto";

        $this->load->view('project/header.php');
        $this->load->view('project/index.php', $data);
        $this->load->view('project/footer.php');
        
    }
    public function create(){
        $data['title'] = "Create Proyecto";
        $this->load->view('project/header.php');
        $this->load->view('project/index.php', $data);
        $this->load->view('project/footer.php');
            
    }
    public function edit($id){         
        $data['project'] = $this->project->get($id);
        $data['title'] = "Editar Proyecto";
        $this->load->view('project/header.php');
        $this->load->view('project/editar.php', $data);
        $this->load->view('project/footer.php');
        
    }
    public function storage(){
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run()){
            $this->session->set_flashdata('error',validation_errors());
            redirect(base_url('project/create'));
        }
        else{
            $this->project->store();
            $this->session->set_flashdata('success','Save Successfully');
            redirect(base_url('project'));
        }
    }
    public function update($id){
        $data
    }
}
