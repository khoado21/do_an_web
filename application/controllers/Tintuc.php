<?php

 
class Tintuc extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tintuc_model');
    }

    
    function index()
    {
        //lay danh sach tin tuc
        $input = array();

        $total_row = $this->Tintuc_model->get_total($input);
        $this->data['total_rows'] = $total_row;

        //thu vien phan trang
        $this->load->library('pagination');
        $id = intval($this->uri->segment(3));
        $config = array();
        $config['total_rows'] = $total_row; //tong tat ca sp trong website
        $config['base_url'] = base_url('tintuc/index/'); //link hien thi ra danh sach sp
        $config['per_page'] = 15; //so luong san pham hien thi trong 1 trang
        $config['uri_segment'] = 3; //phan doan hien thi ra so trang tren url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        //khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);  
        $list = $this->Tintuc_model->get_list($input);
        $this->data['list'] = $list;

        //hien thi ra pham view
        $this->data['temp'] = 'site/tintuc/index';
        $this->load->view('site/layout', $this->data);
    }
    
    //xem tin tuc
    function view()
    {       
        $id = intval($this->uri->rsegment(3));
        $tintuc = $this->Tintuc_model->get_info($id);
        if(!$tintuc)
        {
            redirect();
        }
        $this->data['news'] = $tintuc;

        //hien thi ra pham view
        $this->data['temp'] = 'site/tintuc/view';
        $this->load->view('site/layout', $this->data);
    }
}
