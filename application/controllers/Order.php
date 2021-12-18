<?php
Class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sanpham_model');
        $this->load->model('Donhang_model');
        $this->load->model('Ctdh_model');
    }

    //lấy thông tin khách hàng
    function checkout()
    {
        //thong tin gio hang
        $cart = $this->cart->contents();

        //tong so sp co trong gio hang
        $total_items = $this->cart->total_items();

        if($total_items <= 0)
        {
            redirect();
        }

        $total_amount = 0;
        foreach($cart as $row)
        {
            $total_amount = $total_amount + $row['price'] * $row['qty']; //tổng số tiền cần thanh toán
        }
       
        $this->data['total_amount'] = $total_amount;

        $user_id = 0;
        $user = '';

        //neu người dùng đăng nhập thì lấy thông tin người dùng
        if($this->session->userdata('Nguoidung_id_Login'))
        {
            //lấy thông tin người dùng
            $user_id = $this->session->userdata('Nguoidung_id_Login');
            $user = $this->Nguoidung_model->get_info($user_id);
        }

        $this->data['user'] = $user;

        $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
        $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'trim|required');
        $this->form_validation->set_rules('SDT', 'Số điện thoại', 'trim|required');
        $this->form_validation->set_rules('EMAIL', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('PAYMENT', 'Cổng thanh toán', 'required');

        if ($this->form_validation->run()) {
            $payment = $this->input->post('PAYMENT');
            $HOTEN = $this->input->post('HOTEN');
            $SDT = $this->input->post('SDT');
            $EMAIL = $this->input->post('EMAIL');
            $MESSAGE = $this->input->post('MESSAGE');
            $DIACHI = $this->input->post('DIACHI');

            $data = array(
                'TINHTRANGTHANHTOAN' => 0,
                'MANGUOIDUNG' => $user_id,
                'EMAIL' => $EMAIL,
                'HOTEN' => $HOTEN,
                'SDT' => $SDT,
                'NGAYDAT' => date('y-m-d'),
                'GHICHU' => $MESSAGE,
                'DIACHI' => $DIACHI,
                'AMOUNT' => $total_amount,//tổng số tien cần thanh toán
                'PAYMENT' => $payment,//cổng thanh toán
                'CREATED' => now()
            );

            //them du lieu vao bang don hang
            $this->Donhang_model->create($data);

            $MADONHANG = $this->db->insert_id(); //lấy ra id của giao dịch vừa thêm vào

            //them vao bang ctdh
            foreach($cart as $row)
            {
                $data = array(
                    'MADONHANG' => $MADONHANG,
                    'MASP' => $row['id'],
                    'SOLUONG' => $row['qty'],
                    'AMOUNT' => $row['subtotal'],
                    'DONGIA' => $row['price'],
                    'STATUS' => '0'
                );
                $this->Ctdh_model->create($data);
            }

            //xóa thông tin đơn hàng sau khi đặt hàng
            $this->cart->destroy();
            //tạo nội dung thông báo
            $this->session->set_flashdata('message', 'Đặt hàng thành công');
            redirect(site_url());
        }

        //load view
        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }

    function OrderDetail()
    {
        if(!$this->session->userdata('Nguoidung_id_Login'))
        {
            redirect(site_url('Nguoidung/login'));
        }
        $user_id = $this->session->userdata('Nguoidung_id_Login');
        $user = $this->Nguoidung_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }

        //lấy thông tin chi tiết đơn hàng
        $order_id = $this->uri->rsegment(3);
        $input['where'] = array('MADONHANG' => $order_id);
        $list_ctdh = $this->Ctdh_model->get_list($input);

        //lấy thông tin sản phẩm trong chi tiết đơn hàng
        $ctsp = array();
        $stt = 0; //số thứ tự sản phẩm
        foreach($list_ctdh as $list)
        {
            $MASP = $list->MASP;
            $Sanpham = $this->Sanpham_model->get_info($MASP);
            $list_ctdh[$stt]->TENSP = $Sanpham->TENSP;
            $list_ctdh[$stt]->HINHANH = $Sanpham->HINHANH;
            $stt++;
        }
        $this->data['list_ctdh'] = $list_ctdh;
        
        //load view
        $this->data['temp'] = 'site/order/OrderDetail';
        $this->load->view('site/layout', $this->data);
    }
}