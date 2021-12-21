<?php
class Home extends MY_Controller
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
        //lấy năm hiện tại
        $CurrentYear = date('y');
        //lấy từng tháng
        $jan = 1;
        $feb = 2;
        $mar = 3;
        $apr = 4;
        $may = 5;
        $jun = 6;
        $jul = 7;
        $aug = 8;
        $sep = 9;
        $oct = 10;
        $nov = 11;
        $dec = 12;

        //lấy danh sách đơn hàng
        $input = array();
        $all_list = $this->Donhang_model->get_list($input);

        //tạo ra danh sách đơn hàng trong tháng
        $list = array();
        //tạo stt cho list
        $stt = 0;
        foreach ($all_list as $row) {
            //lấy giá trị tháng của all_list
            $originalDate = $row->NGAYDAT;
            $newDate = date("m", strtotime($originalDate));
            //nếu tháng trong đơn hàng giống với tháng hiện tại
            if ($newDate == $CurrentMonth) {
                $list[$stt] = $row;
                $stt++;
            }
        }

        //tạo biến lấy tổng doanh thu của database đơn hàng
        $total_amount = 0;
        foreach ($all_list as $list_total) {
            //kiểm tra tình trạng thanh toán trước khi cộng vào doanh thu tổng
            if ($list_total->TINHTRANGTHANHTOAN == 1) {
                $total_amount = $total_amount + $list_total->AMOUNT;
            }
        }
        $this->data['total_amount'] = $total_amount;

        //<total_month>tạo biến lấy tổng doanh thu theo tháng
        $total_jan_amount = 0;
        $total_feb_amount = 0;
        $total_mar_amount = 0;
        $total_apr_amount = 0;
        $total_may_amount = 0;
        $total_jun_amount = 0;
        $total_jul_amount = 0;
        $total_aug_amount = 0;
        $total_sep_amount = 0;
        $total_oct_amount = 0;
        $total_nov_amount = 0;
        $total_dec_amount = 0;
        //</total_month>
        foreach ($all_list as $list_total) {
            $originalDate = $list_total->NGAYDAT;
            $newDate = date("m", strtotime($originalDate));
            $newYear = date("y", strtotime($originalDate));
            //kiểm tra tình trạng thanh toán trước khi cộng vào doanh thu từng tháng
            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $jan && $newYear == $CurrentYear) {
                $total_jan_amount = $total_jan_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $feb && $newYear == $CurrentYear) {
                $total_feb_amount = $total_feb_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $mar && $newYear == $CurrentYear) {
                $total_mar_amount = $total_mar_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $apr && $newYear == $CurrentYear) {
                $total_apr_amount = $total_apr_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $may && $newYear == $CurrentYear) {
                $total_may_amount = $total_may_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $jun && $newYear == $CurrentYear) {
                $total_jun_amount = $total_jun_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $jul && $newYear == $CurrentYear) {
                $total_jul_amount = $total_jul_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $aug && $newYear == $CurrentYear) {
                $total_aug_amount = $total_aug_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $sep && $newYear == $CurrentYear) {
                $total_sep_amount = $total_sep_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $oct && $newYear == $CurrentYear) {
                $total_oct_amount = $total_oct_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $nov && $newYear == $CurrentYear) {
                $total_nov_amount = $total_nov_amount + $list_total->AMOUNT;
            }

            if ($list_total->TINHTRANGTHANHTOAN == 1 && $newDate == $dec && $newYear == $CurrentYear) {
                $total_dec_amount = $total_dec_amount + $list_total->AMOUNT;
            }
        }
        $total_year_amount = $total_jan_amount + $total_feb_amount + $total_mar_amount + $total_apr_amount + $total_may_amount + $total_jun_amount + $total_jul_amount + $total_aug_amount + $total_sep_amount + $total_oct_amount + $total_nov_amount + $total_dec_amount;
        //<editor-data>
        $this->data['total_jan_amount'] = $total_jan_amount;
        $this->data['total_feb_amount'] = $total_feb_amount;
        $this->data['total_mar_amount'] = $total_mar_amount;
        $this->data['total_apr_amount'] = $total_apr_amount;
        $this->data['total_may_amount'] = $total_may_amount;
        $this->data['total_jun_amount'] = $total_jun_amount;
        $this->data['total_jul_amount'] = $total_jul_amount;
        $this->data['total_aug_amount'] = $total_aug_amount;
        $this->data['total_sep_amount'] = $total_sep_amount;
        $this->data['total_oct_amount'] = $total_oct_amount;
        $this->data['total_nov_amount'] = $total_nov_amount;
        $this->data['total_dec_amount'] = $total_dec_amount;
        $this->data['total_year_amount'] = $total_year_amount;
        //</editor-data>

        //tạo biến lấy tổng doanh thu của đơn hàng trong tháng
        $total_month_amount = 0;
        foreach ($list as $list_month) {
            //kiểm tra tình trạng thanh toán trước khi cộng vào doanh thu tháng
            if ($list_month->TINHTRANGTHANHTOAN == 1) {
                $total_month_amount = $total_month_amount + $list_month->AMOUNT;
            }
        }
        $this->data['total_month_amount'] = $total_month_amount;

        //tạo biến đếm số lượng đơn hàng đã thanh toán, chưa thanh toán và thanh toán thất bại
        $dathanhtoan = 0;
        $thatbai = 0;
        $chuathanhtoan = 0;
        foreach ($all_list as $list_status) {
            //kiểm tra tình trạng thanh toán trước khi cộng số lượng
            if ($list_status->TINHTRANGTHANHTOAN == 1) {
                $dathanhtoan++;
            }
            //kiểm tra tình trạng thanh toán trước khi cộng số lượng
            if ($list_status->TINHTRANGTHANHTOAN == 2) {
                $thatbai++;
            }
            //kiểm tra tình trạng thanh toán trước khi cộng số lượng
            if ($list_status->TINHTRANGTHANHTOAN == 0) {
                $chuathanhtoan++;
            }
        }
        $this->data['dathanhtoan'] = $dathanhtoan;
        $this->data['$thatbai'] = $thatbai;
        $this->data['chuathanhtoan'] = $chuathanhtoan;

        //lấy số lượng người dùng đã đăng kí trên website
        $this->load->model('Nguoidung_model');
        $input = array();
        $account_list = $this->Nguoidung_model->get_list($input);
        $account_total = 0;
        foreach($account_list as $account)
        {
            if($account->MAQUYEN == 3)
            {
                $account_total++;
            }
        }
        $this->data['account_total'] = $account_total;

        //gửi data sang view
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}
