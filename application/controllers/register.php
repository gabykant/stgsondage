<?php

class Register extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("auth_model");
    }
    
    public function index() {
        if($this->input->post()) {
            //$g = $this->db->get_where("roles", array("name" => "user"))->result_array; echo var_dump($g); exit(0);
            $array = array(
                "email" => $this->input->post("email"),
                "user_id" => 0,
                "role_id" => 0
            );
            //$login = new Login();
            
            $this->load->library("form_validation");
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("required", "The field %s must not be empty");
            }else {
                // A user clicks on the registration button
                // Check if the user input Email is unique.
                $check = $this->auth_model->isUnique($this->input->post("email"));
                if($check) {
                    echo 'fl;dfl;';
                    // redirect the user to the error page and display the error message.
                } else {
                    $queryregister = $this->auth_model->register($array);
                    if($queryregister) {
                        // Force user to login
                        //$login->index($array["email"]);
                    }
                }
            }
        }
        $data_view["content"] = $this->load->view("register");
        $this->load->view("template", $data_view);
    }
}
?>
