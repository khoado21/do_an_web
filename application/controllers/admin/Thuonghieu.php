<?php

class Thuonghieu extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Thuonghieu_model');
    }

    
    function index()
    {
        $input = array();
        $list = $this->Thuonghieu_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/thuonghieu/index';
        $this->load->view('admin/main', $this->data);
    }

    function ten_thuonghieu()
    {
        $TENTHUONGHIEU = $this->input->post('TENTHUONGHIEU');
        $where = array('TENTHUONGHIEU' => $TENTHUONGHIEU);

        if ($this->Thuonghieu_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tên thương hiệu đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('TENTHUONGHIEU', 'Tên thương hiệu', 'required|callback_ten_thuonghieu');
            if ($this->form_validation->run()) {
                $TENTHUONGHIEU = $this->input->post('TENTHUONGHIEU');
                $data = array(
                    'TENTHUONGHIEU' => $TENTHUONGHIEU,
                );

                //tạo nội dung thông báo
                if ($this->Thuonghieu_model->create($data)) {
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
        $this->data['temp'] = 'admin/Thuonghieu/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MATHUONGHIEU = $this->uri->rsegment('3');
        $info = $this->Thuonghieu_model->get_info($MATHUONGHIEU);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('thuonghieu/index'));
        } else {
            $this->data['info'] = $info;
            
            if ($this->input->post()) {
                $this->form_validation->set_rules('TENTHUONGHIEU', 'Tên thương hiệu', 'required|callback_ten_thuonghieu');
                if ($this->form_validation->run()) 
                {
                $TENTHUONGHIEU = $this->input->post('TENTHUONGHIEU');
               
                if($this->form_validation->run() == TRUE) {
                    $data = array(
                        'TENTHUONGHIEU' => $TENTHUONGHIEU,
                    );
                    if ($this->Thuonghieu_model->update($MATHUONGHIEU, $data)) {
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
    }
        $this->data['temp'] = 'admin/thuonghieu/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $TENTHUONGHIEU = $this->uri->rsegment('3');
        $info = $this->Thuonghieu_model->get_info($TENTHUONGHIEU);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Thương hiệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Thuonghieu_model->delete($TENTHUONGHIEU);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/thuonghieu/index');
    }
}
