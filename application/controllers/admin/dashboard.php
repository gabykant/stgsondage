<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("question_model");
        $this->load->model("category_model");
        $this->load->library("pagination");
    }
    
    public function index() {
        $data["content"] = "fk";
        $this->load->view("admin/index", $data);
    }
    
    public function users() {
        $this->load->view("admin/users/users_view");
    }
    
    public function AddQuestionnaire() {
        if($this->input->post()) {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("qfr", "", "required");
            $this->form_validation->set_rules("qen", "", "required");
            if($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("The field % must not be empty");
            }else {
                $array = array(
                    "isvisible" => "no",
                    "category_id" => $this->input->post("category")
                );
                $question_id = $this->question_model->add($array);      
                if($question_id != NULL) {
                    $array_question_lang = array(
                        array(
                            "question_id" => $question_id,
                            "lang_id" => 1,
                            "label" => $this->input->post("qfr")
                        ),
                        array(
                            "question_id" => $question_id,
                            "lang_id" => 2,
                            "label" => $this->input->post("qen")
                        )
                    );
                    $question_lang = $this->question_lang_model->add($array_question_lang);
                }
            }
        }
        $data = array();
        $data["array"] = $this->category_model->get();
        $this->load->view("admin/questionnaires/add_questionnaire", $data);
    }
   
    public function questionnaire() {
        $array = array();
        $array["total_rows"] = $this->question_model->total_record();
        $array["per_page"] = 2;
        $array["uri_segment"] = 4;
        $choice = $array["total_rows"] / $array["per_page"];
        $array["num_links"] = round($choice);
        $this->pagination->initialize($array);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        try {
            // Catch any error and save to log file
            $data['questions'] = $this->question_model->getAllQuestions($array["per_page"], $page);
            $data['link'] = $this->pagination->create_links();
        } catch (Exception $e) {
            
        }
        $this->load->view("admin/questionnaires/view_questionnaires", $data);
    }
}

?>
