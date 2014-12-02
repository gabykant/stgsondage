<?php 

class Home extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("question_model");
        $this->load->model("status_model");
    }
    
    public function index() {
        // Consult the Evaluation table to know how many question does the user answered.
        // This will give an estimation to calculate the remaining percentage.
        
        // Get the total number of questions.
        $total_question = $this->question_model->total_record();
        $answered = $this->status_model->getLastQuestionInsertedId($this->session->userdata("user_id"));
//        if($answered === 0) $answered = 5;
        $data['percentage'] = ( $answered / $total_question ) * 1;
        
        // Get number of all the question that the user has already answer.
        $this->load->view("public/index", $data);
    }
}

?>
