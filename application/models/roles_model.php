<?php

class Roles_Model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function getRoleNameById($id) {
        $query=$this->db->get_where("roles", array("id"=>$id));
        if($query->num_rows() == 1) return $query["name"];
        return NULL;
    }
    function getIdByRoleName($name) {
        $query=$this->db->get_where("roles", array("name"=>$name));
        if($query->num_rows() == 1) return $query->row_array(1);
        return 0;
    }
}

?>
