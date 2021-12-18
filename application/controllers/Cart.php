<?php
class Cart extends MY_Controller
{
    function __construct()
    { 
        parent::__construct();
        //gọi thư viện
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('Sanpham_model');
        $this->load->model('Nguoidung_model');
        $this->load->model('Donhang_model');
    }

    function add()
    { 
        //lấy ra sp muốn thêm vào giỏ hàng
        $id = $this->uri->rsegment(3);
        $sanpham = $this->Sanpham_model->get_info($id);

        if(!$sanpham)
        {
            redirect();
        }

        $qty = 1;
        $price = $sanpham->DONGIA;
        if($sanpham->GIAKM>0)
        {
            $price = $sanpham->GIAKM;
        }
        
        //thông tin thêm vào giỏ hàng
        $data = array();
        $data['id'] = $sanpham->MASP;
        $data['qty'] = $qty;
        $data['name'] = url_title($sanpham->TENSP);
        $data['image_link'] =  $sanpham->HINHANH;
        $data['price'] = $price;
        $this->cart->insert($data);

        redirect(base_url('cart'));
    }

    //hiển thị danh sách sản phẩm trong giỏ hàng
    function index()
    {   
        //thong tin gio hang
        $cart = $this->cart->contents();
        
        //tong so sp co trong gio hang
        $total_items = $this->cart->total_items();
        
        $this->data['cart'] = $cart;
        $this->data['total_items'] = $total_items;

        $this->data['temp'] = 'site/cart/index';
        $this->load->view('site/layout', $this->data);
    }

    //cập nhật giỏ hàng
    function update()
    {
        $cart = $this->cart->contents();
        foreach($cart as $key => $row)
        {
            //tong so luong sp
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data); 
        }
        redirect(base_url('cart'));
    }

    //xóa giỏ hàng
    function delete()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        //trường hợp xóa 1 sản phẩm
        if($id > 0)
        {
            $cart = $this->cart->contents();
            foreach($cart as $key => $row)
            {
                if($row['id'] == $id)
                {
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data); 
                }
            }
        }
        else 
        {
            //xóa toàn bộ giỏ hàng
            $this->cart->destroy();
        }
        redirect(base_url('cart'));
    }

    function CartHistory()
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

        $this->data['user'] = $user;

        $input['where'] = array('MANGUOIDUNG' => $user->MANGUOIDUNG);
        $donhang = $this->Donhang_model->get_list($input);

        $this->data['donhang'] = $donhang;

        //lấy tổng số đơn hàng
        $total_orders = count((array)$donhang);
        $this->data['total_orders'] = $total_orders;

        $this->data['temp'] = 'site/cart/CartHistory';
        $this->load->view('site/layout', $this->data);
    }
}
?>