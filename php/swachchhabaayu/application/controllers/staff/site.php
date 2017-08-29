<?php

class Site extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('site_model', 'site');
        $this->data['module_name'] = 'Site Manager';
        $this->data['show_add_link'] = true;
        $this->header['page_name']	= $this->router->fetch_class();
    }

    public function index()
    {
        $this->data['sub_module_name'] = 'Site List';
        $this->data['site'] = $this->site->get();
        $this->data['body'] = BACKENDFOLDER.'/site/_list';
        $this->render();
    }

    public function create()
    {
        $id = segment(4);
        if($_POST) {
            $post = $_POST;
            if(isset($post['only_save'])){
                $only_save='save';
            }
            if(isset($post['save_new'])){
                $save_new='save and new';
            }
            unset($post['only_save'],$post['save_new']);
            $this->site->id = $id;

            $this->form_validation->set_rules($this->site->rules($id));
            if($this->form_validation->run()) {
                $post['slug'] = $this->site->createSlug($post['name'], $id);
                if($id == '') {
                    $res = $this->site->save($post);
                } else {
                    $condition = array('id' => $id);
                    $res = $this->site->save($post, $condition);
                }

                $res ? set_flash('msg', 'Data saved') : set_flash('msg', 'Data could not be saved');
                if(isset($only_save))
                    redirect(BACKENDFOLDER.'/site/create/'.$id);
                else if(isset($save_new))
                    redirect(BACKENDFOLDER . '/site/create');
                else
                    redirect(BACKENDFOLDER.'/site');
            } else {
                $this->form($id, 'site');
            }
        } else {
            $this->form($id, 'site');
        }
    }


    
    public function delete()
    {
        $post = $_POST;

        $this->load->library('restrict_delete');
        $params = "";
        if(isset($post) && !empty($post)) {
            $selected_ids = $post['selected'];
            $deleted = 0;
            foreach($selected_ids as $selected_id){
                if($this->restrict_delete->check_for_delete($params, $selected_id)) {
                    $res = $this->site->delete(array('id' => $selected_id));
                    if ($res) {
                        $deleted++;
                    }
                }
            }

            $deleted ? set_flash('msg', $deleted . ' out of ' . count($selected_ids) . ' data deleted successfully') : set_flash('msg', 'Data could not be deleted');

        } else {
            $id = segment(4);
            if($this->restrict_delete->check_for_delete($params, $id)) {
                $res = $this->site->delete(array('id' => $id));

                $success_msg = $res ? 'Data deleted' : 'Error in deleting data';
            } else {
                $msg = 'This data cannot be deleted. It is being used in system.';
            }

            $success_msg ? set_flash('msg', $success_msg) : set_flash('msg', $msg);
        }

        redirect(BACKENDFOLDER.'/site');
    }


    public function status()
    {
        $post = $_POST;
        $status = segment(4) == 'Active' ? 'InActive' : 'Active';

        if(isset($post) && !empty($post)) {
            $selected_ids = $post['selected'];
            $changed = 0;
            foreach($selected_ids as $selected_id) {
                $res = $this->site->changeStatus('site', $status, $selected_id);
                if($res) {
                    $changed++;
                }
            }
            $changed ? set_flash('msg', $changed . ' out of ' . count($selected_ids) . ' data status changed successfully') : set_flash('msg', 'Status could not be changed');
        } else {
            $id = segment(5);
            $res = $this->site->changeStatus('site', $status, $id);

            $res ? set_flash('msg', 'Status changed') : set_flash('msg', 'Status could not be changed');
        }

        redirect(BACKENDFOLDER.'/site');
    }


}