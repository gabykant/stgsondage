<?php

class Role_Model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function getRoleNameById($id) {
        $query=$this->db->get_where("role", array("id"=>$id));
        if($query->num_rows() == 1) return $query["name"];
        return NULL;
    }
    function getIdByRoleName($name) {
        $query=$this->db->get_where("role", array("name"=>$name));
        if($query->num_rows() == 1) return $query->row_array(1);
        return 0;
    }
}

?>
