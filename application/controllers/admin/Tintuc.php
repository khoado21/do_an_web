<?php

 
class Tintuc extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tintuc_model');
    }

    
    function index()
    {
        $input = array();
        $list = $this->Tintuc_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Tintuc/index';
        $this->load->view('admin/main', $this->data);
    }

    function ten_tieude()
    {
        $TIEUDE = $this->input->post('TIEUDE');
        $where = array('TIEUDE' => $TIEUDE);

        if ($this->Tintuc_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tên tiêu đề đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('TIEUDE', 'Tiêu đề', 'required|callback_ten_tieude');
            $this->form_validation->set_rules('NGUON', 'Nguồn', 'required');
            $this->form_validation->set_rules('NOIDUNG', 'Nội dung', 'required');
            $this->form_validation->set_rules('NGAYDANG', 'Ngày đăng', 'required');
            if ($this->form_validation->run()) {
                $TIEUDE = $this->input->post('TIEUDE');
                $NGUON = $this->input->post('NGUON');
                $NOIDUNG = $this->input->post('NOIDUNG');
                $NGAYDANG = $this->input->post('NGAYDANG');
                $data = array(
                    'TIEUDE' => $TIEUDE,
                    'NGUON' => $NGUON,
                    'NOIDUNG' => $NOIDUNG,
                    'NGAYDANG' => $NGAYDANG,
                );

                //tạo nội dung thông báo
                if ($this->Tintuc_model->create($data)) {
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
        $this->data['temp'] = 'admin/Tintuc/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MATINTUC = $this->uri->rsegment('3');
        $info = $this->Tintuc_model->get_info($MATINTUC);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('Tintuc/index'));
        } else {
            $this->data['info'] = $info;
            
            if ($this->input->post()) {
                $this->form_validation->set_rules('TIEUDE', 'Tiêu đề', 'required');
                $this->form_validation->set_rules('NGUON', 'Nguồn', 'required');
                $this->form_validation->set_rules('NOIDUNG', 'Nội dung', 'required');
                $this->form_validation->set_rules('NGAYSUA', 'Ngày sửa', 'required');
                if ($this->form_validation->run()) 
                {       
                    $TIEUDE = $this->input->post('TIEUDE');
                    $NGUON = $this->input->post('NGUON');
                    $NOIDUNG = $this->input->post('NOIDUNG');
                    $NGAYDANG = $this->input->post('NGAYDANG');
                    $NGAYSUA = $this->input->post('NGAYSUA');
                    $data = array(
                        'TIEUDE' => $TIEUDE,
                        'NGUON' => $NGUON,
                        'NOIDUNG' => $NOIDUNG,
                        'NGAYDANG' => $NGAYDANG,
                        'NGAYSUA' => $NGAYSUA
                    );
                    if ($this->Tintuc_model->update($MATINTUC, $data)) {
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
        $this->data['temp'] = 'admin/Tintuc/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MATINTUC = $this->uri->rsegment('3');
        $info = $this->Tintuc_model->get_info($MATINTUC);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Tintuc_model->delete($MATINTUC);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Tintuc/index');
    }
}
