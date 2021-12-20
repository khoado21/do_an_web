<?php

class Giaohang extends MY_Controller{
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
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;
        
        $this->data['temp'] = 'admin/giaohang/index';
        $this->load->view('admin/main',$this->data);
    }

    /*
     * Adding a new giaohang
     */
    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('MANGUOIDUNG', 'Mã người dùng', 'required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('HOTEN', 'Họ tên', 'required');
            $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'required');

            if ($this->form_validation->run()) {
                if (empty($this->input->post('MAVOUCHER'))) {
                    $data = array(
                        'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
                        'NGAYGIAO' => $this->input->post('NGAYGIAO'),
                        'NGAYDAT' => $this->input->post('NGAYDAT'),
                        'NGAYSHIP' => $this->input->post('NGAYSHIP'),
                    );
                } else {
                    $data = array(
                        'MAVOUCHER' => $this->input->post('MAVOUCHER'),
                        'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
                        'NGAYGIAO' => $this->input->post('NGAYGIAO'),
                        'NGAYDAT' => $this->input->post('NGAYDAT'),
                    );
                }

                //tạo nội dung thông báo
                if ($this->Giaohang_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn hàng thành công
                                </div>';
                    $this->data['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới đơn hàng không thành công
                                </div>';
                    $this->data['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                //redirect(admin_url('ctdh/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/donhang/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Editing a giaohang
     */
    function edit($MAGIAOHANG)
    {   
        // check if the giaohang exists before trying to edit it
        $data['giaohang'] = $this->Giaohang_model->get_giaohang($MAGIAOHANG);
        
        if(isset($data['giaohang']['MAGIAOHANG']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
					'NGAYGIAO' => $this->input->post('NGAYGIAO'),
					'SDT' => $this->input->post('SDT'),
					'XACNHAN' => $this->input->post('XACNHAN'),
                );

                $this->Giaohang_model->update_giaohang($MAGIAOHANG,$params);            
                redirect('giaohang/index');
            }
            else
            {
                $data['_view'] = 'giaohang/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The giaohang you are trying to edit does not exist.');
    } 

    /*
     * Deleting giaohang
     */
    function remove($MAGIAOHANG)
    {
        $giaohang = $this->Giaohang_model->get_giaohang($MAGIAOHANG);

        // check if the giaohang exists before trying to delete it
        if(isset($giaohang['MAGIAOHANG']))
        {
            $this->Giaohang_model->delete_giaohang($MAGIAOHANG);
            redirect('giaohang/index');
        }
        else
            show_error('The giaohang you are trying to delete does not exist.');
    }
    
}
