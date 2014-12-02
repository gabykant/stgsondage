<?php

class Register extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("role_model");
        $this->load->model("question_model");
        $this->load->model("status_model");
    }
    
    public function index() {
        $register_view["unique"] = TRUE;
        if($this->input->post()) {
            //$g = $this->db->get_where("roles", array("name" => "user"))->result_array; echo var_dump($g); exit(0);
            $role_id = $this->role_model->getIdByRoleName("user"); 
            $array = array(
                "email" => $this->input->post("email"),
                "pin" => $this->input->post("password"),
                "user_id" => 0,
                "role_id" => $role_id["id"]
            );
            //$login = new Login();
            
            $this->load->library("form_validation");
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules("password", "Password", "required");
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("required", "The field %s must not be empty");
            }else {
                // A user clicks on the registration button
                // Check if the user input Email is unique.
                $check = $this->auth_model->isUnique($this->input->post("email"));
                if($check) {
                    $register_view["unique"] = FALSE;
                    // redirect the user to the error page and display the error message.
                } else {
                    $queryregister = $this->auth_model->register($array);
                    if($queryregister) {
                        // Force user to login
                        //$login->index($array["email"]);
                        $this->auth_model->loginTemplate($array['email'], $array['pin']);
                        // Get the first question and update the status table for this new user.
                        // if there is no question then update with the value 1
                        $this->status_model->add(
                                array(
                                    "user_id" => $this->session->userdata("user_id"),
                                    "question_id" => $this->question_model->getFirstQuestionId()));
                        $role = $this->session->userdata("user_role");
                        if($role == "admin") { redirect ("index.php/admin/dashboard"); }
                        else { redirect ("index.php/public/home");}
                    }
                }
            }
        }
        $data_view["content"] = $this->load->view("register", $register_view, TRUE);
        $this->load->view("template", $data_view);
    }
}
?>
