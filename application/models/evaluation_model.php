<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluation_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function addValue($array) {
        // Check if the user_id and the question_id already exists
        $array2 = array(
                    "user_id" => $array['user_id'],
                    "question_id" => $array['question_id']
                );
        $query_exist = $this->db->get_where("evaluation", $array2, 1);
        if($query_exist->num_rows() === 0) {
            $query = $this->db->insert("evaluation", $array);
            $evaluation_id = $this->db->insert_id();
            if($query) return $evaluation_id;
        } else {
            // In this case, make an update of the inserted data.
            $this->db->where($array2);
            $this->db->update("evaluation", array("value_input" => $array['value_input']));
        }
        return NULL;
    }
    
}

?>
