<?php

class Profile extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view("public/index");
    }
}

?>
