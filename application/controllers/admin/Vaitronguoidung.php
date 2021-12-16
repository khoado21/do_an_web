<?php

 
class Vaitronguoidung extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vaitronguoidung_model');
    }
    function index()
    {
        $input = array();
        $list = $this->Vaitronguoidung_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/vaitronguoidung/index';
        $this->load->view('admin/main', $this->data);
    }
}
