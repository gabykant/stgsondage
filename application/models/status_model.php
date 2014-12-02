<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function add($array) {
        $query = $this->db->insert("status", $array);
        $status_id = $this->db->insert_id();
        if($query) return $status_id;
        return NULL;
    }
    function getLastQuestionInsertedId($id) {
        $result = 0;
        $query = $this->db->get_where("status", array("user_id"=>$id))->first_row();
        if(count($query) >= 1) {
            $result = $query->question_id;
        }
        return $result;
    }
}

?>
