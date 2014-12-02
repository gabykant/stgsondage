<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("auth_model");
    }
    public function index() {
        
        // Is connected ?
        if($this->isLoggedIn()) {
            if($this->session->userdata("role") === "admin") redirect("index.php/admin/dashboard");
            else redirect("index.php/public/home");
        }
        
        $error_login["login_error"] = NULL;
        if($this->input->post()) {
            $this->load->library("form_validation");
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pin', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("required", "The field %s must not be empty");
            }else {
                if($this->auth_model->loginTemplate($this->input->post("email"), $this->input->post("pin")) === TRUE) {
                    // Login OK. Redirect to the dashboard.
                    $profile = $this->session->userdata("user_role");
                    if($profile === "admin")
                        redirect("index.php/admin/dashboard");
                    //Else redirect to public controller
                    redirect("index.php/public/home");
                }
                $error_login["login_error"] = "Login/Mot de passe incorrect";
            }
        }
        $data["content"] = $this->load->view("home", $error_login, TRUE);
        $this->load->view('template', $data);
    }
    
    public function logout() {
        $userSession = array(
            "loggedIn" => "no",
            "email_address" => "",
            "user_displayNames" => "",
            "user_role" => ""
        );
        $this->session->set_userdata($userSession);
        redirect("index.php/login");
    }
    
    public function isLoggedIn() {
        if($this->session->userdata("loggedIn") === "yes") return TRUE;
        return FALSE;
    }
}
?>
