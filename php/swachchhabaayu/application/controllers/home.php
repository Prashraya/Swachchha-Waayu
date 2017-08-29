<?php

class Home extends My_Front_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        
        $this->load->model('common_model', 'common');
        $this->load->model('site_model', 'site');
        $this->load->model('pollutant_model', 'pollutant');
    }

    public function index()
    {	
        $this->data['table'] = $this->site->getSitePollutant();
        $this->data['is_home'] ='yes';
        $this->data['addJs'] = array(
            'assets/front/js/map.js'
        );
        $this->render();
    }

    public function getMapData(){
        $map = $this->site->getMapData();
        echo json_encode($map);exit;
    }

    public function getGraph(){
        $pollutant  = $_POST['pollutant'];
        $period     = $_POST['period'];
        $year       = $_POST['year'];
        $site       = $_POST['site'];

        $linedata = $this->site->getLineData($pollutant,$period, $site);
        $res[] = array('Time','CO');
        foreach ($linedata as $key => $value) {
            $res[] = array($value->datetime ,$value->co);
        }

        echo json_encode($res, JSON_NUMERIC_CHECK);exit;

    }

}