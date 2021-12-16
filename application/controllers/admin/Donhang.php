<?php

class Donhang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donhang_model');
    }
    function index()
    {
        $input = array();
        $list = $this->Donhang_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Donhang/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_email()
    {
        $EMAIL = $this->input->post('EMAIL');
        $where = array('email' => $EMAIL);

        //kiểm tra username đã tồn tại chưa
        if ($this->Donhang_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {

        if ($this->input->post()) {
            $this->form_validation->set_rules('MAGIAOHANG', 'Mã giao hàng', 'required');
            $this->form_validation->set_rules('MANGUOIDUNG', 'Mã người dùng', 'required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('HOTEN', 'Họ tên', 'required');
            $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'required');

            if ($this->form_validation->run()) {
                if (empty($this->input->post('MAVOUCHER'))) {
                    $data = array(
                        'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
                        'MADONHANG' => $this->input->post('MADONHANG'),
                        'NGAYDAT' => $this->input->post('NGAYDAT'),
                        'NGAYSHIP' => $this->input->post('NGAYSHIP'),
                        'TONGDON' => $this->input->post('TONGDON'),
                        'HOTEN' => $this->input->post('HOTEN'),
                        'SDT' => $this->input->post('SDT'),
                        'DIACHI' => $this->input->post('DIACHI'),
                        'GIOITINH' => $this->input->post('GIOITINH'),
                        'EMAIL' => $this->input->post('EMAIL'),
                        'GHICHU' => $this->input->post('GHICHU'),
                        'SOTHEODOI' => $this->input->post('SOTHEODOI'),
                        'VANCHUYEN' => $this->input->post('VANCHUYEN'),
                        'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
                        'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
                        'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
                        'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
                    );
                } else {
                    $data = array(
                        'MAVOUCHER' => $this->input->post('MAVOUCHER'),
                        'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
                        'MADONHANG' => $this->input->post('MADONHANG'),
                        'NGAYDAT' => $this->input->post('NGAYDAT'),
                        'NGAYSHIP' => $this->input->post('NGAYSHIP'),
                        'TONGDON' => $this->input->post('TONGDON'),
                        'HOTEN' => $this->input->post('HOTEN'),
                        'SDT' => $this->input->post('SDT'),
                        'DIACHI' => $this->input->post('DIACHI'),
                        'GIOITINH' => $this->input->post('GIOITINH'),
                        'EMAIL' => $this->input->post('EMAIL'),
                        'GHICHU' => $this->input->post('GHICHU'),
                        'SOTHEODOI' => $this->input->post('SOTHEODOI'),
                        'VANCHUYEN' => $this->input->post('VANCHUYEN'),
                        'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
                        'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
                        'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
                        'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
                    );
                }


                //tạo nội dung thông báo
                if ($this->Donhang_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn hàng thành công
                                </div>';
                    $this->success_form['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn hàng không thành công
                                </div>';
                    $this->success_form['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                $this->success_form['temp'] = 'admin/donhang/add';
                //redirect(admin_url('ctdh/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->success_form['temp'] = 'admin/donhang/add';
        $this->load->view('admin/main', $this->success_form);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MADONHANG = $this->uri->rsegment('3');
        $info = $this->Donhang_model->get_info($MADONHANG);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Người dùng không tồn tại</div>');
            redirect(admin_url('Donhang/index'));
        } else {
            $this->data['info'] = $info;

            if ($this->input->post()) {
                $this->form_validation->set_rules('MAGIAOHANG', 'Mã giao hàng', 'required');
                $this->form_validation->set_rules('MANGUOIDUNG', 'Mã người dùng', 'required');
                $this->form_validation->set_rules('SDT', 'Số điện thoại', 'required');
                $this->form_validation->set_rules('HOTEN', 'Họ tên', 'required');
                $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'required');


                if ($this->form_validation->run()) {
                    if (empty($this->input->post('MAVOUCHER'))) {
                        $data = array(
                            'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
                            'MADONHANG' => $this->input->post('MADONHANG'),
                            'NGAYDAT' => $this->input->post('NGAYDAT'),
                            'NGAYSHIP' => $this->input->post('NGAYSHIP'),
                            'TONGDON' => $this->input->post('TONGDON'),
                            'HOTEN' => $this->input->post('HOTEN'),
                            'SDT' => $this->input->post('SDT'),
                            'DIACHI' => $this->input->post('DIACHI'),
                            'GIOITINH' => $this->input->post('GIOITINH'),
                            'EMAIL' => $this->input->post('EMAIL'),
                            'GHICHU' => $this->input->post('GHICHU'),
                            'SOTHEODOI' => $this->input->post('SOTHEODOI'),
                            'VANCHUYEN' => $this->input->post('VANCHUYEN'),
                            'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
                            'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
                            'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
                            'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
                        );
                    } else {
                        $data = array(
                            'MAVOUCHER' => $this->input->post('MAVOUCHER'),
                            'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
                            'MADONHANG' => $this->input->post('MADONHANG'),
                            'NGAYDAT' => $this->input->post('NGAYDAT'),
                            'NGAYSHIP' => $this->input->post('NGAYSHIP'),
                            'TONGDON' => $this->input->post('TONGDON'),
                            'HOTEN' => $this->input->post('HOTEN'),
                            'SDT' => $this->input->post('SDT'),
                            'DIACHI' => $this->input->post('DIACHI'),
                            'GIOITINH' => $this->input->post('GIOITINH'),
                            'EMAIL' => $this->input->post('EMAIL'),
                            'GHICHU' => $this->input->post('GHICHU'),
                            'SOTHEODOI' => $this->input->post('SOTHEODOI'),
                            'VANCHUYEN' => $this->input->post('VANCHUYEN'),
                            'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
                            'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
                            'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
                            'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
                        );
                    }
                    if ($this->Donhang_model->update($MADONHANG, $data)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Cập nhật dữ liệu thành công</div>');
                        // $message = '<div class="alert alert-primary" id="alert" role="alert">Cập nhật dữ liệu thành công</div>';
                        // $this->success_form['message'] = $message;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>');
                        // $message = '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>';
                        // $this->success_form['message'] = $message;
                    }
                }
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
            }
        }
        $this->data['temp'] = 'admin/Donhang/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MADONHANG = $this->uri->rsegment('3');
        $info = $this->Donhang_model->get_info($MADONHANG);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Người dùng không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Donhang_model->delete($MADONHANG);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Donhang/index');
    }
}
