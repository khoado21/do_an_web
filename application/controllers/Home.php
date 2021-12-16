<?php
Class Home extends MY_Controller
{
    function index()
    {
        $this->load->model('Sanpham_model');       

        $input['limit'] = array(3, 0);
        $input['order'] = array('NGAYDANG', 'DESC');
        $sanpham_new = $this->Sanpham_model->get_list($input);
        $this->data['sanpham_new'] = $sanpham_new;

        $input['order'] = array('LUOTXEM', 'DESC');
        $sanpham_luotxem = $this->Sanpham_model->get_list($input);
        $this->data['sanpham_luotxem'] = $sanpham_luotxem;

        //lay noi dung cua message
        $message= $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }
}
?>