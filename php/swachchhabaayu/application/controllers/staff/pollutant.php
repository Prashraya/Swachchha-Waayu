<?php

class Pollutant extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pollutant_model', 'pollutant');
        $this->load->model('site_model', 'site');
        $this->data['module_name'] = 'Pollutant Manager';
        $this->data['show_add_link'] = false;
        $this->data['show_sort_link'] = false;
        $this->data['controller'] = $this;
        $this->header['page_name']	= $this->router->fetch_class();
    }

    public function index()
    {
        $this->data['sub_module_name'] = 'Pollutant List';
        $this->data['pollutant'] = $this->pollutant->get();
        $this->data['body'] = BACKENDFOLDER . '/pollutant/_list';
        $this->render();
    }

    public function getSite($id){
        $site = $this->site->get('1', ['id' => $id]);
        return $site->name;
    }

}