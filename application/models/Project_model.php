<?php


class Project_model extends CI_Model{

    public function __construct(){
        // cargar la base de datos
        $this->load->database();
        $this->load->helper('url');      
    }

    // funion para obtener informacion de la base de datos
    public function get_all(){
        $project = $this->db->get('projects')->result();
        return $project;
    }

    // funion para almacenar informacion de la base de datos
    public function store(){
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        ];
        $result = $this->db->insert('projects')->data();
        return $result;
    }
    public function get($id){
        $project = $this->db->get_where('projects',['id'=> $id])
        return $project;
    }

}

?>