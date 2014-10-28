<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("auth_model");
    }
    public function index() {
        if($this->input->post()) {
            $this->load->library("form_validation");
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("required", "The field %s must not be empty");
            }else {
                if($this->auth_model->loginTemplate("ksdlkd", "ksdfkl") == TRUE) {
                    // Login OK. Redirect to the dashboard.
                    $profile = $this->session->userdata("role");
                    if($profile == "admin")
                        redirect("admin/dashboard");
                    //Else redirect to public controller
                    redirect("public/public");
                }
                $data["login_error"] = "Login/Mot de passe incorrect";
            }
        }
        $data["content"] = $this->load->view("home");
        $this->load->view('template', $data);
    }
}
?>
