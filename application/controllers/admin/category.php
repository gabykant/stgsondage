<?php
class Category extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("category_model");
    }
    
    public function index() {
        $list = array();
        if($this->input->post()) {
            $input = $this->input->post("catInput");
            $this->category_model->add(array("name" => $input));
        }
        $list["categories"] = $this->category_model->get();
        $this->load->view("admin/questionnaires/add_category", $list);
    }
    
//    public function index() {
//        $list_ = array();
//        $input = $this->input->post("inputCategory");
//        if($this->category_model->add(array("name" => $input))) {
//            // Get all the category and populate to the view
//            $list = $this->category_model->get();
//            foreach ($list as $e) {
//                $list_[$e["id"]] = $e["name"];
//            }
//        }
//        echo json_encode($list_);
//    }
    
    public function newCategory() {
        
    }
    
    public function delete() {
        
    }
}
?>
