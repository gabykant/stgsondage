<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("question_model");
        $this->load->model("evaluation_model");
        $this->load->model("indice_model");
        $this->load->model("status_model");
    }
    
    public function index() {
        if($this->input->post()) {
            if($this->input->post("btnquestion") === 'next') {
                $array = array(
                    'user_id' => $this->session->userdata("user_id"),
                    'question_id' => $this->session->userdata("question_id"),
                    'value_input' => $this->input->post("value_input"),
                    'eval_date' => date('yyyy-mm-dd H:i:s'));
                $this->addEvaluation($array);
                $this->session->set_userdata(array("question_id" => $this->session->userdata("question_id") + 1 ));
                unset($array['value_input']);
                unset($array['eval_date']);
                $this->status_model->add($array);
            } elseif($this->input->post("btnquestion") === 'previous') {
                $this->session->set_userdata(array("question_id" => $this->session->userdata("question_id") - 1 ));
            }elseif($this->input->post("btnquestion") === 'save') {
                
            }
        }
        $question_id = $this->session->userdata("question_id");
        $e = $this->question($question_id);        
        // Si $e est null alors la requete dont lID vaut question_id n'a pas trouve.
        // On affiche le message de fin de sondage.
        if(count($e)===0) {$this->load->view ("public/survey_end"); return;}
        $data['question'] = $e[0]['label'];
        $data['listoption'] = $this->indice_model->get(1);
        $this->load->view("public/survey", $data);
    }
    
    private function question($id) {
        //$id = json_decode(file_get_contents('php://input'))->question_id;
        $result = $this->question_model->getQuestionByIdJson($id);
        //$this->session->set_userdata(array("question_id" => $id+1 ));
        return $result;
    }
    
    private function addEvaluation($array) {
        $this->evaluation_model->addValue($array);}
    
}

?>