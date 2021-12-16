<?php
Class Sanpham extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sanpham_model');
        $this->load->helper(array('form', 'url'));
    }

    function catalog()
    {
        $id = intval($this->uri->segment(3));
        //lay ra info the loai
        $this->load->model('Danhmuc_model');
        $catalog = $this->Danhmuc_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['where'] = array('MADM' => $id);

        //lay ra danh sach san pham thuoc danh muc do
        //lay ra tong so luong san pham thuoc danh muc do
        $total_row = $this->Sanpham_model->get_total($input);
        $this->data['total_rows'] = $total_row;

        //thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_row; //tong tat ca sp trong website
        $config['base_url'] = base_url('sanpham/catalog/'.$id); //link hien thi ra danh sach sp
        $config['per_page'] = 15; //so luong san pham hien thi trong 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        //khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);      

        //lay danh sach sanpham
        $list = $this->Sanpham_model->get_list($input);
        $this->data['list'] = $list;

        //hien thi ra pham view
        $this->data['temp'] = 'site/sanpham/catalog';
        $this->load->view('site/layout', $this->data);
    }


    //xem chi tiet sanpham
    function view()
    {       
        $id = intval($this->uri->rsegment(3));
        $sanpham = $this->Sanpham_model->get_info($id);
        if(!$sanpham)
        {
            redirect();
        }
        $this->data['sanpham'] = $sanpham;
        //lay thong tin danh muc san pham

        //cap nhat lai luot xem sanpham
        $data = array();
        $data['LUOTXEM'] = $sanpham->LUOTXEM + 1;
        $this->Sanpham_model->update($sanpham->MASP, $data);


        //lay danh sach hinh anh sanpham
        $this->load->model('Hinhanh_model');
        $input = array();
        $input['where'] = array('MASP' => $sanpham->MASP);
        $image_list = $this->Hinhanh_model->get_list($input);
        $this->data['image_list'] = $image_list;

        $catalog = $this->Danhmuc_model->get_info($sanpham->MADM);
        $this->data['catalog'] = $catalog;

        //hien thi ra pham view
        $this->data['temp'] = 'site/Sanpham/view';
        $this->load->view('site/layout', $this->data);
    }

    //tìm kiếm theo tên sp
    function searchbyname()
    {
        if($this->uri->rsegment('3') == 1)
        {
            //lấy dữ liệu từ autocomplete
            $key = $this->input->get('term');     
        }
        else {
            $key = $this->input->get('key-search');
        }

        $this->data['key'] = trim($key);

        $input = array();
        $input['like'] = array('TENSP', $key);
        $list = $this->Sanpham_model->get_list($input);
        $this->data['list'] = $list;

        if($this->uri->rsegment('3') == 1)
        {
            //xử lý autocomplete
            $result = array();
            foreach($list as $row)
            {
                $item = array();
                $item['id'] = $row->MASP;
                $item['label'] = $row->TENSP;
                $item['value'] = $row->TENSP;
                $result[] = $item;
            }
            //dữ liệu trả về json
            die(json_encode($result));
        }
        else {
            $this->data['temp'] = 'site/Sanpham/searchbyname';
            $this->load->view('site/layout', $this->data);
        }  
    }

    //lọc theo giá
    function searchbyprice()
    {
        $price_from = intval($this->input->get('price_from'));
        $price_to = intval($this->input->get('price_to'));
        $this->data['price_from'] = $price_from;
        $this->data['price_to'] = $price_to;

        $input = array();
        $input['where'] = array('DONGIA >=' => $price_from, 'DONGIA <=' => $price_to );
        $list = $this->Sanpham_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'site/Sanpham/searchbyprice';
        $this->load->view('site/layout', $this->data);
    }

}
?>

