<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function login()
    {
        $this->load->view('login');
    }

    public function welcome_message() {
        $this->load->view('welcome_message');
    }

    public function check_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $user = $this->user_model->get_email_and_pwd($email, $password);
        if ($user) {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>200,'status'=>'success');
            exit(json_encode($arr));
        } else {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>202,'status'=>'fail');
            exit(json_encode($arr));
        }
    }

    public function do_register() {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sex = $this->input->post('sex');
        $province = $this->input->post('province');
        $city = $this->input->post('city');
        $this->load->model('user_model');
        $return_rows = $this->user_model->reg_user($email, $username, $password, $sex, $province, $city);
        if ($return_rows == 1) {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>200,'status'=>'success');
            exit(json_encode($arr));
        } else {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('code'=>202,'status'=>'fail');
            exit(json_encode($arr));
        }
    }

    public function check_email() {
        $email = $this->input->get('email');
        $this->load->model('user_model');
        $has_email = $this->user_model->get_email($email);
        if ($has_email) {
            echo 'fail';
        } else {
            echo 'success';
        }
    }

}
