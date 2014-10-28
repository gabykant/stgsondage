<?php

class Question_Lang_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function add($array) {
        $query = $this->db->insert_batch("question_lang", $array);
        if($query) {
            return TRUE;
        }
        return FALSE;
    }
    function getAllQuestionWithLang() {
        $query = $this->db->get("question_lang");
        return $query;
    }
    function getQuestionByLang() {}
    function getQuestionLangById($id) {}
}

?>
