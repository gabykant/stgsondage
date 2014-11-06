<?php
class Category extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("category_model");
    }
    
    public function index() {
        $this->load->library("form_validation");
        $list = array();
        if($this->input->post()) {
            $this->form_validation->set_rules("catInput", "Category", "required");
            if($this->form_validation->run() == FALSE) {
                $this->form_validation->set_message("The field %d is required");
            } else {
                $input = $this->input->post("catInput");
                $this->category_model->add(array("name" => $input));
            }
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
    
    public function delete($id) {
        if($this->category_model->delete($id));
        redirect("index.php/admin/category");
    }
}
?>
