<?php

class Sanpham extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Sanpham_model');
        $this->load->helper(array('form', 'url'));
    }
    function index()
    {
        $input = array();
        $list = $this->Sanpham_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/sanpham/index';
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

    function check_tensp()
    {
        $TENSP = $this->input->post('TENSP');
        $where = array('TENSP' => $TENSP);

        if ($this->Sanpham_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tên sản phẩm đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('TENSP', 'Têm sản phẩm', 'required|min_length[5]|callback_check_tensp');
            $this->form_validation->set_rules('MATHUONGHIEU', 'Mã thương hiệu', 'required');
            $this->form_validation->set_rules('MADM', 'Mã danh mục', 'required');
            $this->form_validation->set_rules('DONGIA', 'Đơn giá', 'required');
            $this->form_validation->set_rules('BAOHANH', 'Bảo hành', 'required');
            $this->form_validation->set_rules('SOLUONG', 'Số lượng', 'required');
            $this->form_validation->set_rules('TINHTRANGSP', 'Tình trạng', 'required');          
            if ($this->form_validation->run()) {  
                $this->do_upload();
                $this->upload->do_upload('HINHANH');     
                $TENSP = $this->input->post('TENSP');
                $MATHUONGHIEU = $this->input->post('MATHUONGHIEU');
                $MADM = $this->input->post('MADM');
                $DONGIA = $this->input->post('DONGIA');
                $BAOHANH = $this->input->post('BAOHANH');
                $SOLUONG = $this->input->post('SOLUONG');
                $TINHTRANGSP = $this->input->post('TINHTRANGSP');
                $NGAYDANG = date('Y-m-d H:i:s');
                $HINHANH = $this->upload->data();
                $data = array(
                    'TENSP' => $TENSP,
                    'MATHUONGHIEU' => $MATHUONGHIEU,
                    'MADM' => $MADM,
                    'DONGIA' => $DONGIA,
                    'BAOHANH' => $BAOHANH,
                    'SOLUONG' => $SOLUONG,
                    'TINHTRANGSP' => $TINHTRANGSP,
                    'NGAYDANG' => $NGAYDANG,
                    'HINHANH' => $HINHANH['file_name']
                );

                //tạo nội dung thông báo
                if ($this->Sanpham_model->create($data)) {
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
        $this->success_form['temp'] = 'admin/sanpham/add';
        $this->load->view('admin/main', $this->success_form);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $MASP = $this->uri->rsegment('3');
        $info = $this->Sanpham_model->get_info($MASP);
       
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>');
            redirect(admin_url('sanpham/index'));
        } else {      
            $this->data['info'] = $info;
            $this->form_validation->set_rules('TENSP', 'Têm sản phẩm', 'required|min_length[5]');
                if ($this->input->post()) {  
                    $this->do_upload();
                    $this->upload->do_upload('HINHANH');
                    $HINHANH = $this->upload->data();

                    if(empty($HINHANH['file_name']))
                    {
                        $HINHANH['file_name'] = $info->HINHANH;
                    }  

                    $TENSP = $this->input->post('TENSP');
                    $MATHUONGHIEU = $this->input->post('MATHUONGHIEU');
                    $MADM = $this->input->post('MADM');
                    $DONGIA = $this->input->post('DONGIA');
                    $TINHTRANGSP = $this->input->post('TINHTRANGSP');
                    $NGAYDANG = date('Y-m-d');
                    $SOLUONG = $this->input->post('SOLUONG');
                    if ($this->form_validation->run()) {
                        $data = array(
                            'TENSP' => $TENSP,
                            'MADM' => $MADM,
                            'MATHUONGHIEU' => $MATHUONGHIEU,
                            'DONGIA' => $DONGIA,
                            'TINHTRANGSP' => $TINHTRANGSP,
                            'NGAYDANG' => $NGAYDANG,
                            'SOLUONG' => $SOLUONG,
                            'HINHANH' => $HINHANH['file_name']
                        );
                        if ($this->Sanpham_model->update($MASP, $data)) {
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
                $this->data['message'] = $message;
            }           
        }
        $this->data['temp'] = 'admin/sanpham/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MASP = $this->uri->rsegment('3');
        $info = $this->Sanpham_model->get_info($MASP);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Dữ liệu không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Sanpham_model->delete($MASP);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/sanpham/index');
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
    // function logout()
    // {
    //     if($this->session->userdata('Login'))
    //     {
    //         $this->session->unset_userdata('Login');
    //     }
    //     redirect(admin_url('login'));
    // }

    function catalog()
    {
        $id = intval($this->uri->segment(3));
        //lay ra info the loai
        $this->load->model('Danhmuc_model');
        $catalog = $this->Danhmuc_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        //lay ra danh sach san pham thuoc danh muc do
        pre($catalog);
    }

}
