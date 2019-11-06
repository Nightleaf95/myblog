<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function blog_index()
    {
        $this->load->view('index');
    }
}