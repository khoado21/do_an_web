<?php

class Ctdh extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ctdh_model');
    }

    /*
     * Listing of ctdh
     */
    function index()
    {
        $input = array();
        $list = $this->Ctdh_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/ctdh/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Adding a new ctdh
     */
    function add()
    {

        if ($this->input->post()) {
            $this->form_validation->set_rules('MASP', 'Mã sản phẩm', 'required');
            $this->form_validation->set_rules('MADONHANG', 'Mã đơn hàng', 'required');
            $this->form_validation->set_rules('DONGIA', 'Đơn giá', 'required');
            $this->form_validation->set_rules('SOLUONG', 'Số lượng', 'required');
            if ($this->form_validation->run()) {
                $MASP = $this->input->post('MASP');
                $MADONHANG = $this->input->post('MADONHANG');
                $DONGIA = $this->input->post('DONGIA');
                $SOLUONG = $this->input->post('SOLUONG');
                $data = array(
                    'MASP' => $MASP,
                    'MADONHANG' => $MADONHANG,
                    'DONGIA' => $DONGIA,
                    'SOLUONG' => $SOLUONG
                );

                //tạo nội dung thông báo
                if ($this->Ctdh_model->create($data)) {
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
                //redirect(admin_url('nguoidung/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->success_form['temp'] = 'admin/ctdh/add';
        $this->load->view('admin/main', $this->success_form);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MASP = $this->uri->rsegment('3');
        $MADONHANG = $this->uri->rsegment('4');
        $info = $this->Ctdh_model->get_info($MASP,$MADONHANG);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('ctdh/index'));
        } else {
            $this->data['info'] = $info;

            if ($this->input->post()) {
                $this->form_validation->set_rules('MASP', 'Mã sản phẩm', 'required');
                $this->form_validation->set_rules('MADONHANG', 'Mã đơn hàng', 'required');
                $this->form_validation->set_rules('DONGIA', 'Đơn giá', 'required');
                $this->form_validation->set_rules('SOLUONG', 'Số lượng', 'required');
                if ($this->form_validation->run()) {
                $MASP = $this->input->post('MASP');
                $MADONHANG = $this->input->post('MADONHANG');
                $DONGIA = $this->input->post('DONGIA');
                $SOLUONG = $this->input->post('SOLUONG');

                if ($this->form_validation->run() == TRUE) {
                    $data = array(
                        'MASP' => $MASP,
                        'MADONHANG' => $MADONHANG,
                        'DONGIA' => $DONGIA,
                        'SOLUONG' => $SOLUONG
                    );
                    if ($this->Ctdh_model->update($MASP, $MADONHANG, $data)) {
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
        $this->data['temp'] = 'admin/ctdh/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MASP = $this->uri->rsegment('3');
        $MADONHANG = $this->uri->rsegment('4');
        $info = $this->Ctdh_model->get_info($MASP,$MADONHANG);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Ctdh_model->delete($MASP,$MADONHANG);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/ctdh/index');
    }
}
