<?php

class Lang_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getLangById($id) {
        return $this->db->get_where("lang", array("id" => $id));
    }
    function getLangIdByIsoCode($iso) {
        $query = $this->db->get_where("lang", array("isocode" => $iso));
        if($query->num_rows() == 1) 
            return $query->row_array(1);
        return 0;
    }
    function getAllLang() {
        return $this->db->get("lang");
    }
}

?>
