<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function blog_index()
    {
        $this->load->view('index');
    }

    public function blog_type()
    {
        $this->load->view('blog_type');
    }

    public function search_blog_type()
    {
        $userid = $this->input->get('userid');
        $this->load->model('admin_model');
        $user_blog_type = $this->admin_model->get_blog_type($userid);
        for ($x = 0; $x < count($user_blog_type); $x++) {
            $user_blog_type[$x]->user_id = intval($user_blog_type[$x]->user_id);
        }
        if ($user_blog_type) {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>200,'status'=>'success', 'typelist'=>$user_blog_type);
            exit(json_encode($arr));
        } else {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>202,'status'=>'fail');
            exit(json_encode($arr));
        }
    }

    public function add_blog_type() {
        $type_name = $this->input->post('type_name');
        $user_id = $this->input->post('user_id');
        $this->load->model('admin_model');
        $rows = $this->admin_model->do_add_blog_type($type_name, $user_id);
        if ($rows == 1) {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>200,'status'=>'success');
            exit(json_encode($arr));
        } else {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>202,'status'=>'fail');
            exit(json_encode($arr));
        }
    }
}