<?php

class My_Front_Controller extends CI_Controller {

    public $template = 'frontend/layout/default';
    public $data = array();
    public $global_config;

    public function __construct() {

        parent::__construct();

        // sanitizing all get and post values
        if ($_GET) {
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        }
        if ($_POST) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }
        // sanitizing all get and post values

    }

   
    public function render() {
        $this->load->view($this->template, $this->data);
    }

    public function renderPartial($view) {
        $this->load->view($view, $this->data);
    }

   

   
}?>