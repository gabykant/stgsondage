<?php

class Survey extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("question_model");
    }
    
    public function index() {
        $data['type_label'] = 'input';
        $this->load->view("public/survey", $data);
    }
    
    public function question() {
        $id = json_decode(file_get_contents('php://input'))->question_id;
        $result = $this->question_model->getQuestionByIdJson($id);
        echo json_encode($result);
    }
}

?>