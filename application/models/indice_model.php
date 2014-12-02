<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indice_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function get($id) {
        return $this->db->get_where("indice", array("lang_id" => $id))->result_array();
    }
}
?>
