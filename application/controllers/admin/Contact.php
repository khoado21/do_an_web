<?php

class Contact extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    
    function index()
    {
        $input = array();
        $list = $this->Contact_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Contact/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_email()
    {
        $EMAIL = $this->input->post('EMAIL');
        $where = array('EMAIL' => $EMAIL);

        if ($this->Contact_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'mã đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ tên', 'required');
            $this->form_validation->set_rules('EMAIL', 'Email', 'required|callback_check_email');
            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $EMAIL = $this->input->post('EMAIL');
                $NOIDUNG = $this->input->post('NOIDUNG');
                $TINHTRANGDON = $this->input->post('TINHTRANGDON');
                $NGAYGUI = $this->input->post('NGAYGUI');
                $data = array(
                    'HOTEN' => $HOTEN,
                    'EMAIL' => $EMAIL,
                    'NOIDUNG' => $NOIDUNG,
                    'TINHTRANGDON' => $TINHTRANGDON,
                    'NGAYGUI' => $NGAYGUI,
                );

                //tạo nội dung thông báo
                if ($this->Contact_model->create($data)) {
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
        $this->data['temp'] = 'admin/Contact/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MALH = $this->uri->rsegment('3');
        $info = $this->Contact_model->get_info($MALH);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('Contact/index'));
        } else {
            $this->data['info'] = $info;
            
            if ($this->input->post()) {
                $this->form_validation->set_rules('HOTEN', 'Họ tên', 'required');
                $this->form_validation->set_rules('EMAIL', 'Email', 'required');
                if ($this->form_validation->run()) {
                    $HOTEN = $this->input->post('HOTEN');
                    $EMAIL = $this->input->post('EMAIL');
                    $NOIDUNG = $this->input->post('NOIDUNG');
                    $TINHTRANGDON = $this->input->post('TINHTRANGDON');
                    $NGAYGUI = $this->input->post('NGAYGUI');
                    $data = array(
                        'HOTEN' => $HOTEN,
                        'EMAIL' => $EMAIL,
                        'NOIDUNG' => $NOIDUNG,
                        'TINHTRANGDON' => $TINHTRANGDON,
                        'NGAYGUI' => $NGAYGUI,
                    );
                    if ($this->Contact_model->update($MALH, $data)) {
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
        $this->data['temp'] = 'admin/Contact/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MALH = $this->uri->rsegment('3');
        $info = $this->Contact_model->get_info($MALH);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Contact_model->delete($MALH);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Contact/index');
    }
}
