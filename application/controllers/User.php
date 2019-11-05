<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function login()
    {
        $this->load->view('login');
    }

    public function check_login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $user = $this->user_model->get_username_and_pwd($name, $password);
        if ($user) {
            echo '登陆成功！';
        } else {
            echo '登陆失败！';
        }
    }

}
