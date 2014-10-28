<?php

class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view("admin/users/users_view");
    }
    
}

?>
