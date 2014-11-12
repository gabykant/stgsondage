<?php

class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("auth_model");
    }
    
    public function index() {
        $data["users"] = $this->auth_model->getAllUsers();
        $this->load->view("admin/users/users_view", $data);
    }
    
    public function profile() {
        $id = $this->uri->segment(4);
        $data["user_info"] = $this->auth_model->getUserById($id); 
        //echo $this->auth_model->getUserById($id);
        $this->load->view("admin/users/admin_user_profile", $data);
    }
    
}

?>
