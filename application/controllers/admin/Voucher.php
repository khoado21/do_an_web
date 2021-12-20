<?php

class Voucher extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Voucher_model');
    }


    function index()
    {
        $input = array();
        $list = $this->Voucher_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Voucher/index';
        $this->load->view('admin/main', $this->data);
    }

    function ten_ma()
    {
        $TENMA = $this->input->post('TENMA');
        $where = array('TENMA' => $TENMA);

        if ($this->Voucher_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tên mã voucher đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function ma_voucher()
    {
        $MAVOUCHER = $this->input->post('MAVOUCHER');
        $where = array('MAVOUCHER' => $MAVOUCHER);

        if ($this->Voucher_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Mã voucher đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('MAVOUCHER', 'Mã voucher', 'required|callback_ma_voucher');
            $this->form_validation->set_rules('TENMA', 'Tên mã', 'required|callback_ten_ma');
            $this->form_validation->set_rules('TYLE', 'Tỉ lệ', 'required');
            $this->form_validation->set_rules('TRANGTHAI', 'Trạng thái', 'required');
            if ($this->form_validation->run()) {
                $MAVOUCHER = $this->input->post('MAVOUCHER');
                $TENMA = $this->input->post('TENMA');
                $NGAYBD = $this->input->post('NGAYBD');
                $NGAYKT = $this->input->post('NGAYKT');
                $TYLE = $this->input->post('TYLE');
                $TRANGTHAI = $this->input->post('TRANGTHAI');
                $data = array(
                    'MAVOUCHER' => $MAVOUCHER,
                    'TENMA' => $TENMA,
                    'NGAYBD' => $NGAYBD,
                    'NGAYKT' => $NGAYKT,
                    'TYLE' => $TYLE,
                    'TRANGTHAI' => $TRANGTHAI
                );

                //tạo nội dung thông báo
                if ($this->Voucher_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu thành công
                                </div>';
                    $this->data['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu không thành công
                                </div>';
                    $this->data['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                //redirect(admin_url('nguoidung/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/voucher/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MAVOUCHER = $this->uri->rsegment('3');
        $info = $this->Voucher_model->get_info($MAVOUCHER);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('Voucher/index'));
        } else {
            $this->data['info'] = $info;

            if ($this->input->post()) {
                $this->form_validation->set_rules('MAVOUCHER', 'Mã voucher', 'required');
                $this->form_validation->set_rules('TENMA', 'Tên mã', 'required');
                $this->form_validation->set_rules('TYLE', 'Tỉ lệ', 'required');
                $this->form_validation->set_rules('TRANGTHAI', 'Trạng thái', 'required');
                if ($this->form_validation->run()) {
                    $MAVOUCHER = $this->input->post('MAVOUCHER');
                    $TENMA = $this->input->post('TENMA');
                    $NGAYBD = $this->input->post('NGAYBD');
                    $NGAYKT = $this->input->post('NGAYKT');
                    $TYLE = $this->input->post('TYLE');
                    $TRANGTHAI = $this->input->post('TRANGTHAI');
                    $data = array(
                        'MAVOUCHER' => $MAVOUCHER,
                        'TENMA' => $TENMA,
                        'NGAYBD' => $NGAYBD,
                        'NGAYKT' => $NGAYKT,
                        'TYLE' => $TYLE,
                        'TRANGTHAI' => $TRANGTHAI
                    );
                    if ($this->Voucher_model->update($MAVOUCHER, $data)) {
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
        $this->data['temp'] = 'admin/voucher/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MAVOUCHER = $this->uri->rsegment('3');
        $info = $this->Voucher_model->get_info($MAVOUCHER);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Voucher_model->delete($MAVOUCHER);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Voucher/index');
    }
}
