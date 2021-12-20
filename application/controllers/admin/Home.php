<?php
Class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donhang_model');
        $this->load->model('Ctdh_model');
        $this->load->model('Sanpham_model');
    }


    function index()
    {
        //lấy tháng hiện tại
        $CurrentMonth = date('m');

        //lấy danh sách đơn hàng
        $input = array();
        $all_list = $this->Donhang_model->get_list($input);

        //chọn ra danh sách đơn hàng trong tháng
        $list = array();
        //tạo stt cho list
        $stt = 0;
        foreach($all_list as $row)
        {
            //lấy giá trị tháng của all_list
            $originalDate = $row->NGAYDAT;
            $newDate = date("m", strtotime($originalDate));
            //nếu tháng trong đơn hàng giống với tháng hiện tại
            if($newDate == $CurrentMonth)
            {
                $list[$stt] = $row;
                $stt++;
            }
        }

        //tạo biến lấy tổng doanh thu của database đơn hàng
        $total_amount = 0;
        foreach($all_list as $list_total)
        {
            //kiểm tra tình trạng thanh toán trước khi cộng vào doanh thu tổng
            if($list_total->TINHTRANGTHANHTOAN == 1)
            {
                $total_amount = $total_amount + $list_total->AMOUNT;
            }
        }

        //tạo biến lấy tổng doanh thu của đơn hàng trong tháng
        $total_month_amount = 0;
        foreach($list as $list_month)
        {
            //kiểm tra tình trạng thanh toán trước khi cộng vào doanh thu tháng
            if($list_month->TINHTRANGTHANHTOAN == 1)
            {
                $total_month_amount = $total_month_amount + $list_month->AMOUNT;
            }
        }

        $this->data['total_amount'] = $total_amount;
        $this->data['total_month_amount'] = $total_month_amount;

        $this->data['temp']='admin/home/index';
        $this->load->view('admin/main',$this->data);
    }
}