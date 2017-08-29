<?php

class Site_Model extends My_Model
{

    public $table = 'tbl_area';
    public $id = '', $name = '',$latitude='',$longitude='', $slug = '', $status = '';

    public function rules($id)
    {
        $array = array(
            array(
                'field' => 'name',
                'label' => 'Site Name',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'latitude',
                'label' => 'Latitude',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'longitude',
                'label' => 'Longitude',
                'rules' => 'trim|required',
            )

        );

        return $array;
    }

    public function __construct()
    {
        parent::__construct();
        $this->created_timestamp = true;
        $this->updated_timestamp = true;
        $this->created_by = true;
        $this->updated_by = true;
    }

    public function getSitePollutant(){
        $sql = "SELECT s.*,p.`co`,p.`dust`,p.`datetime`
        FROM `tbl_area` s JOIN `tbl_pollutant` p ON p.`area_id` = s.`id`
        WHERE  s.`status` = 'Active' AND p.`datetime` = (SELECT MAX(`datetime`) FROM tbl_pollutant p2 WHERE p2.`area_id` = p.`area_id`) 
        GROUP BY p.`area_id` ORDER BY p.`datetime` DESC";
        $result = $this->query($sql);
        return $result;
    }

    public function getMapData(){
        $sql = "SELECT s.*,p.`co`,p.`dust`,p.`datetime`
        FROM `tbl_area` s JOIN `tbl_pollutant` p ON p.`area_id` = s.`id`
        WHERE  s.`status` = 'Active' AND p.`datetime` = (SELECT MAX(`datetime`) FROM tbl_pollutant p2 WHERE p2.`area_id` = p.`area_id`) 
        GROUP BY p.`area_id` ORDER BY p.`datetime` DESC";
        $result = $this->query($sql);
        return $result;
    }

    public function getLineData($pollutant,$period, $site){
         $sql = "SELECT s.*,p.`co`,p.`dust`,p.`datetime`
        FROM `tbl_area` s JOIN `tbl_pollutant` p ON p.`area_id` = s.`id`
        WHERE  s.`status` = 'Active' AND p.`area_id` = $site";
        $result = $this->query($sql);
        return $result;
    }
    
}