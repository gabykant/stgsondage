<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function add($array) {
        $query = $this->db->insert("question", $array);
        $question_id = $this->db->insert_id();
        if($query) return $question_id;
        return NULL;
    }
    
    function getQuestions() {
        return $this->db->get("question")->result_array();
    }
        
    function getAllQuestions($limit, $offset) {
        $results = array();
        $this->db->limit($limit, $offset);
        $query = $this->db->get('question');
        if($query->num_rows() >= 1) {
            foreach ($query->result_array() as $r) {
                $results[] = $r;
            }
        }
        return $results;
    }
    
    function total_record() {
        return $this->db->count_all('question');
    }
    
    function getQuestionById($id) {
        $query = $this->db->get_where("question", array("id" => $id));
        if($query->num_rows() == 1) {
            return $query;
        }
        return NULL;
    }
}

?>
