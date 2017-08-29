<?php

class Adminlog extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model', 'common');
        $this->data['module_name'] = 'Activity Log';
        $this->data['show_add_link'] = false;
        $this->data['show_sort_link'] = false;
        $this->header['page_name']	= $this->router->fetch_class();
    }

    public function index()
    {
        $this->data['sub_module_name'] = 'Activity Log List';
        $this->data['body'] = BACKENDFOLDER.'/adminlog/_list';
        $this->render();
    }

    public function get_admin_logs()
    {
        $columns = ['id', 'user_name', 'ip', 'url', 'created_on'];
        $this->load->model('user_model', 'user');
        $pageSize = $_GET['iDisplayLength'];
        $offset = $_GET['iDisplayStart'];
        $order_col = $_GET['iSortCol_0'];
        $order = $_GET['sSortDir_0'];

        $total = $this->common->query("SELECT COUNT(*) as totalRows FROM tbl_activity_log");

        if(isset($searchQuery)) {
            $where = 'where cid like "%'.$searchQuery.'%"';
        }

        $query = "select
                    al.*,
                    (select name from tbl_user u where u.id = al.user_id) as user_name
                    from `tbl_admin_log` al
                    order by " . $columns[$order_col] . " " . $order."
                    limit $offset, $pageSize";
        $res = $this->common->query($query);

        $output = array(
            "sEcho"                => intval($_GET['sEcho']),
            "iTotalRecords"        => $total[0]->totalRows,
            "iTotalDisplayRecords" => $total[0]->totalRows,
            "aaData"               => array(),
        );

        $count = $offset + 1;
        if($res) {
            foreach($res as $row) {
                $resData[] = array(
                    $count,
                    $row->user_name ? $row->user_name : 'Anonymous',
                    date('Y/m/d    h:i:a',$row->logged_in_time),
                    $row->logged_out_time ? date('Y/m/d    h:i:a',$row->logged_out_time) : 'No logged out',
                );
                $count++;
            }
            $output['aaData'] = $resData;
        }
        echo json_encode($output);
    }

    

}