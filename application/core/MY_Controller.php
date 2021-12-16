<?php
class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang view 
    public $data = array();
    
    public $success_form = array(
        'message' => null
    );

    function __construct()
    {
        //ke thua tu CI controller
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch($controller)
        {
            case 'admin':
                {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
            default:
                {
                    //xu ly du lieu o trang ngoai
                    $this->load->model('Danhmuc_model');
                    $input = array();
                    $danhmuc = $this->Danhmuc_model->get_list($input);
                    $this->data['danhmuc'] = $danhmuc;

                    $this->load->model('Tintuc_model');
                    $input = array();
                    $input['limit'] = array(5, 0);
                    $tintuc = $this->Tintuc_model->get_list($input);
                    $this->data['tintuc'] = $tintuc;

                    //kiem tra xem thanh vien da dang nhap hay chua
                    $Nguoidung_id_Login = $this->session->userdata('Nguoidung_id_Login');
                    $this->data['Nguoidung_id_Login'] = $Nguoidung_id_Login;
                    if($Nguoidung_id_Login)
                    {
                        $this->load->model('Nguoidung_model');
                        $user_info = $this->Nguoidung_model->get_info($Nguoidung_id_Login);
                        $this->data['user_info'] = $user_info;
                    }
                    

                    $this->load->library('cart');
                    $this->data['total_items'] = $this->cart->total_items();
                }
        }
    }

    //kiem tra trang thai dang nhap cua admin
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
        
        $login = $this->session->userdata('Login');
        
        if(!$login && $controller!='login')
        {
            redirect(admin_url('login'));
        }
        //da dang nhap thi ko cho dang nhap nua
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}