<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    //获取博客类型
    public function get_blog_type ($userid) {
        return $this->db->get_where('t_blogtype', array('user_id' => $userid))->result();
    }

    //新增博客类型
    public function do_add_blog_type ($type_name, $user_id) {
        $this->db->insert('t_blogtype', array(
            'type_name' => $type_name,
            'user_id' => $user_id
        ));
        return $this->db->affected_rows();
    }
}
