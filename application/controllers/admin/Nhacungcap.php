<?php

class Nhacungcap extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Nhacungcap_model');
    }
    function index()
    {
        $input = array();
        $list = $this->Nhacungcap_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/nhacungcap/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_tenncc()
    {
        $TENNCC = $this->input->post('TENNCC');
        $where = array('TENNCC' => $TENNCC);

        //kiểm tra DIACHI đã tồn tại chưa
        if ($this->Nhacungcap_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Nhà cung cấp đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('TENNCC', 'Tên nhà cung cấp', 'required|callback_check_tenncc');
            $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'required|min_length[5]');
            $this->form_validation->set_rules('THANHPHO', 'Thành phố', 'trim|required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'trim|required');

            if ($this->form_validation->run()) {
                $TENNCC = $this->input->post('TENNCC');
                $DIACHI = $this->input->post('DIACHI');
                $THANHPHO = $this->input->post('THANHPHO');
                $SDT = $this->input->post('SDT');
                $TINHTRANGXACNHAN = $this->input->post('TINHTRANGXACNHAN');

                $data = array(
                    'TENNCC' => $TENNCC,
                    'DIACHI' => $DIACHI,
                    'THANHPHO' => $THANHPHO,
                    'SDT' => $SDT,
                    'TINHTRANGXACNHAN' => $TINHTRANGXACNHAN
                );

                //tạo nội dung thông báo
                if ($this->Nhacungcap_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu thành công
                                </div>';
                    $this->success_form['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu không thành công
                                </div>';
                    $this->success_form['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                //redirect(admin_url('Nhacungcap/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->success_form['temp'] = 'admin/nhacungcap/add';
        $this->load->view('admin/main', $this->success_form);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MANCC = $this->uri->rsegment('3');
        $info = $this->Nhacungcap_model->get_info($MANCC);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('nhacungcap/index'));
        } else {
            $this->data['info'] = $info;

            if ($this->input->post()) {

                $TENNCC = $this->input->post('TENNCC');
                $DIACHI = $this->input->post('DIACHI');
                $THANHPHO = $this->input->post('THANHPHO');
                $SDT = $this->input->post('SDT');
                $TINHTRANGXACNHAN = $this->input->post('TINHTRANGXACNHAN');
                $data = array(
                    'TENNCC' => $TENNCC,
                    'DIACHI' => $DIACHI,
                    'THANHPHO' => $THANHPHO,
                    'SDT' => $SDT,
                    'TINHTRANGXACNHAN' => $TINHTRANGXACNHAN
                );
                if ($this->Nhacungcap_model->update($MANCC, $data)) {
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
        $this->data['temp'] = 'admin/nhacungcap/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $TENNCC = $this->uri->rsegment('3');
        $info = $this->Nhacungcap_model->get_info($TENNCC);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Nhacungcap_model->delete($TENNCC);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/nhacungcap/index');
    }
}
