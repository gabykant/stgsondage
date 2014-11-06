<?php

class Questionnaire extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("question_model");
        $this->load->model("category_model");
        $this->load->model("question_lang_model");
        $this->load->model("lang_model");
        $this->load->library("pagination");
    }
    
    public function index() {
        $list = array();
        if($this->input->post()) {
            
            $array1 = array(
                "category_id" => $this->input->post("category")
            );
            $question_id = $this->question_model->add($array1);
            $fr = $this->lang_model->getLangIdByIsoCode("fr");
            $en = $this->lang_model->getLangIdByIsoCode("en");
            $array2 = array(
                array(
                    "question_id" => $question_id,
                    "lang_id" => $fr["id"],
                    "label" => $this->input->post("qfr")
                    ),
                array(
                    "question_id" => $question_id,
                    "lang_id" => $en["id"],
                    "label" => $this->input->post("qen")
                )
            );
            $this->question_lang_model->add($array2);
        }
        $list["categories"] = $this->category_model->get();
        
        $this->load->view("admin/questionnaires/add_questionnaire", $list);
    }
    
    public function view_questionnaire() {
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
            $data["questions"] = $this->question_model->getAllQuestions($array["per_page"], $page);
//            foreach ( $questions as $q ) :
//                $category_id = $q["category_id"];
//            endforeach;
            //var_dump($questions);
            $data['link'] = $this->pagination->create_links();
        } catch (Exception $e) {
            
        }
        $this->load->view("admin/questionnaires/view_questionnaires", $data);
    }
    
    public function getAllQuestionnaire() {
        $list = array();
        $list["question"] = $this->question_model->getQuestions();
        $this->load->view("admin/questionnaires/view_questionnaire", $list);
    }
    
    public function getQuestionnaireById() {
        
    }
    
    public function deleteQuestionnaire($id) {
        
    }
    
    public function updateQuestionnaire($id) {
        
    }
}

?>
