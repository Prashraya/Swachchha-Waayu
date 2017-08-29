<?php
class Page extends My_Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'common');
        $this->load->model('site_model', 'site');
        $this->load->model('pollutant_model', 'pollutant');
    }

    public function index() {
        $url = $this->uri->segment_array();
        $slug = segment(1);
        if ($slug == 'data') {
            $this->data['site'] = $this->site->get('', ['status' => 'Active']);
            $this->data['addJs'] = array(
                'assets/front/js/graph.js'
            );
            $this->data['body'] = 'frontend/include/graph';
        } 
        $this->render();
    }

}?>