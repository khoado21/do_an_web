<?php

class Binhluan extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Binhluan_model');
    }

    
    function index()
    {
        $input = array();
        $list = $this->Binhluan_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Binhluan/index';
        $this->load->view('admin/main', $this->data);
    }


    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('MANGUOIDUNG', 'Mã người dùng', 'required');
            $this->form_validation->set_rules('NOIDUNG', 'Nội dung', 'required');
            $this->form_validation->set_rules('NGAYTAO', 'Ngày tạo', 'required');
            if ($this->form_validation->run()) {
                $MANGUOIDUNG = $this->input->post('MANGUOIDUNG');
                $NOIDUNG = $this->input->post('NOIDUNG');
                $NGAYTAO = $this->input->post('NGAYTAO');
                $data = array(
                    'MANGUOIDUNG' => $MANGUOIDUNG,
                    'NOIDUNG' => $NOIDUNG,
                    'NGAYTAO' => $NGAYTAO,
                );

                //tạo nội dung thông báo
                if ($this->Binhluan_model->create($data)) {
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
        $this->data['temp'] = 'admin/Binhluan/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MABINHLUAN= $this->uri->rsegment('3');
        $info = $this->Binhluan_model->get_info($MABINHLUAN);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('Binhluan/index'));
        } else {
            $this->data['info'] = $info;
            
            if ($this->input->post()) {
                $this->form_validation->set_rules('MANGUOIDUNG', 'Mã người dùng', 'required');
                $this->form_validation->set_rules('NOIDUNG', 'Nội dung', 'required');
                $this->form_validation->set_rules('NGAYTAO', 'Ngày tạo', 'required');
                if ($this->form_validation->run()) {
                    $MANGUOIDUNG = $this->input->post('MANGUOIDUNG');
                    $NOIDUNG = $this->input->post('NOIDUNG');
                    $NGAYTAO = $this->input->post('NGAYTAO');
                    $data = array(
                        'MANGUOIDUNG' => $MANGUOIDUNG,
                        'NOIDUNG' => $NOIDUNG,
                        'NGAYTAO' => $NGAYTAO,
                    );
                    if ($this->Binhluan_model->update($MABINHLUAN, $data)) {
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
        $this->data['temp'] = 'admin/Binhluan/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MABINHLUAN = $this->uri->rsegment('3');
        $info = $this->Binhluan_model->get_info($MABINHLUAN);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Binhluan_model->delete($MABINHLUAN);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Binhluan/index');
    }
}
