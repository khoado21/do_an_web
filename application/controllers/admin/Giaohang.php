<?php

class Giaohang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Giaohang_model');
    }

    /*
     * Listing of giaohang
     */
    function index()
    {
        $input = array();
        $this->data['list'] = $this->Giaohang_model->get_list($input);

        //lay noi dung cua alert
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/giaohang/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Adding a new giaohang
     */
    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('TENNGUOIGIAO', 'Họ tên', 'required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
                    'SDT' => $this->input->post('SDT'),
                    'NGAYGIAO' => $this->input->post('NGAYGIAO'),
                );
                //tạo nội dung thông báo
                if ($this->Giaohang_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn giao hàng thành công
                                </div>';
                    $this->data['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn giao hàng không thành công
                                </div>';
                    $this->data['message'] = $message;
                }
            }
        }

        // $message = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/giaohang/add';
        $this->load->view('admin/main', $this->data);
    }




    /*
     * Editing a giaohang
     */
    function edit()
    {
        $MAGIAOHANG = $this->uri->rsegment('3');
        $info = $this->Giaohang_model->get_info($MAGIAOHANG);
        if ($this->input->post()) {
            $this->form_validation->set_rules('TENNGUOIGIAO', 'Họ tên', 'required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'required');
            if ($this->form_validation->run()) {
                $data = array(
                    'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
                    'SDT' => $this->input->post('SDT'),
                    'NGAYGIAO' => $this->input->post('NGAYGIAO'),
                    'XACNHAN' => $this->input->post('XACNHAN')
                );
                //tạo nội dung thông báo
                if ($this->Giaohang_model->update($MAGIAOHANG, $data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Cập nhật đơn giao hàng thành công
                                </div>';
                    $this->data['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Cập nhật đơn giao hàng không thành công
                                </div>';
                    $this->data['message'] = $message;
                }
            }
        }
        $this->data['info'] = $info;
        $this->data['temp'] = 'admin/giaohang/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Deleting giaohang
     */
    function delete()
    {
        $MAGIAOHANG = $this->uri->rsegment('3');
        $info = $this->Giaohang_model->get_info($MAGIAOHANG);
        if ($info == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Đơn giao hàng không tồn tại</div>');
        } else {
            //thực hiện xóa
            $this->Giaohang_model->delete($MAGIAOHANG);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Xóa Đơn giao hàng thành công</div>');
        }
        redirect('admin/giaohang/index');
    }
}
