<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
//  登陆
    public function get_email_and_pwd($email, $password)
    {
        return $this->db->get_where('t_user', array('email' => $email, 'password' => $password))->row();
    }

//	验证邮箱
    public function get_email($email)
    {
        return $this->db->get_where('t_user', array('email' => $email))->row();
    }

//  注册用户
    public function reg_user($email, $username, $password, $sex, $province, $city)
    {
        $this->db->insert('t_user', array(
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'sex' => $sex,
            'province' => $province,
            'city' => $city
        ));

        return $this->db->affected_rows();
    }

}
