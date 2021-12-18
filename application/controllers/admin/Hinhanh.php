<?php

class Hinhanh extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hinhanh_model');
        $this->load->model('Sanpham_model');
        $this->load->helper(array('form', 'url'));
    }
    function index()
    {
        $input = array();
        $list = $this->Hinhanh_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/Hinhanh/index';
        $this->load->view('admin/main', $this->data);
    }

    // function check_BAOHANH()
    // {
    //     $BAOHANH = $this->input->post('BAOHANH');
    //     $where = array('BAOHANH' => $BAOHANH);

    //     //kiểm tra MATHUONGHIEU đã tồn tại chưa
    //     if ($this->Nguoidung_model->check_exists($where)) {
    //         //trả về thông báo lỗi
    //         $this->form_validation->set_message(__FUNCTION__, 'BAOHANH đã tồn tại');
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    function add()
    {
        //lấy danh sách sản phẩm
        $input = array();
        $sanpham = $this->Sanpham_model->get_list($input);

        $this->data['sanpham'] = $sanpham;
                 
        if ($this->input->post()) {

            $this->form_validation->set_rules('TENSP', 'Tên sản phẩm', 'required');

            if ($this->form_validation->run()) {
                $this->do_upload();
                $this->upload->do_upload('HINHANH');
                $HINHANH = $this->upload->data();
                if (empty($HINHANH['file_name'])) {
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                        Phải có hình ảnh
                    </div>';
                    $this->data['message'] = $message;
                }

                //trả về mã sản phẩm theo tên sản phẩm
                $TENSP = $this->input->post('TENSP');
                $input['TENSP'] = $TENSP;
                $product = $this->Sanpham_model->get_info_rule($input);
                $MASP = $product->MASP;

                $data = array(
                    'MASP' => $MASP,
                    'LINKANH' => $HINHANH['file_name']
                );

                //tạo nội dung thông báo
                if ($this->Hinhanh_model->create($data)) {
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
                // redirect(admin_url('hinhanh/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/hinhanh/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MAANH = $this->uri->rsegment('3');
        $info = $this->Hinhanh_model->get_info($MAANH);

        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('Hinhanh/index'));
        } else {
                $this->form_validation->set_rules('MASP', 'Mã sản phẩm', 'required');
                $this->data['info'] = $info;
                if($this->input->post())
                {
                    $this->do_upload();
                    $this->upload->do_upload('HINHANH');
                    $HINHANH = $this->upload->data();
    
                    if (empty($HINHANH['file_name'])) {
                        $HINHANH['file_name'] = $info->HINHANH;
                    }
    
                    $MASP = $this->input->post('MASP');
                    if ($this->form_validation->run()) {
                        $data = array(
                            'MASP' => $MASP,
                            'LINKANH' => $HINHANH['file_name']
                        );
    
                        if ($this->Hinhanh_model->update($MAANH, $data)) {
                            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Cập nhật dữ liệu thành công</div>');
                            // $message = '<div class="alert alert-primary" id="alert" role="alert">Cập nhật dữ liệu thành công</div>';
                            // $this->success_form['message'] = $message;
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>');
                            // $message = '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>';
                            // $this->success_form['message'] = $message;
                        }
                        $message = $this->session->flashdata('message');
                    }
                }
               
                $this->data['message'] = $message;
        }
        $this->data['temp'] = 'admin/Hinhanh/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MAANH = $this->uri->rsegment('3');
        $info = $this->Hinhanh_model->get_info($MAANH);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Hinhanh_model->delete($MAANH);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/Hinhanh/index');
    }

    public function do_upload()
    {
        $config['upload_path']          = 'public/image';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 6000;
        $config['max_width']            = 3500;
        $config['max_height']           = 3500;
        $this->load->library('upload', $config);
    }
}
