<?php

class Category_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get() {
        $result = array();
        $r = $this->db->get("category");
        if($r->num_rows()>=1) {
            foreach ($r->result_array() as $r2) {
                $result[] = $r2;
            }
        }
        return $result;
    }
    
    function add($array) {
        $this->db->insert("category", $array);
        if($this->db->affected_rows()) {
            return TRUE;
        }
        return FALSE;
    }
}
?>
