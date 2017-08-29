<?php

class Pollutant_Model extends My_Model
{

    public $table = 'tbl_pollutant';
    public $id = '', $area_id = '',$co='',$dust='',$datetime='';

    public function rules($id)
    {
        $array = array();

        return $array;
    }

    public function __construct()
    {
        parent::__construct();
       
    }

    
}