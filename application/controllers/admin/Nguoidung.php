<?php
class Nguoidung extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Nguoidung_model');
    }

    function index()
    {
        $input = array();
        $list = $this->Nguoidung_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/nguoidung/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_email()
    {
        $EMAIL = $this->input->post('EMAIL');
        $where = array('email' => $EMAIL);

        //kiểm tra username đã tồn tại chưa
        if ($this->Nguoidung_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if (!$this->session->userdata('Admin_id')) {
            redirect(site_url('Admin/login'));
        }
        $user_id = $this->session->userdata('Admin_id');
        $user = $this->Nguoidung_model->get_info($user_id);
        if (!$user) {
            redirect();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
            $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[5]');
            $this->form_validation->set_rules('SDT', 'SDT', 'trim|required');
            $this->form_validation->set_rules('VAITRO', 'Vai trò', 'trim|required');
            $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('PASSCONF', 'Nhập lại mật khẩu', 'trim|matches[PASSWORD]');
            $this->form_validation->set_rules('EMAIL', 'Email đăng nhập', 'required|callback_check_email');

            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $EMAIL = $this->input->post('EMAIL');
                $USERNAME = $this->input->post('USERNAME');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $VAITRO = $this->input->post('VAITRO');
                $SDT = $this->input->post('SDT');
                $DIACHI = $this->input->post('DIACHI');
                $MAQUYEN = $this->input->post('MAQUYEN');
                $PASSWORD = $this->input->post('PASSWORD');
                $NGAYTAO = date('y-m-d');
                $data = array(
                    'EMAIL ' => $EMAIL,
                    'PASSWORD ' => $PASSWORD,
                    'HOTEN' => $HOTEN,
                    'USERNAME' => $USERNAME,
                    'NGAYSINH' => $NGAYSINH,
                    'SDT' => $SDT,
                    'DIACHI' => $DIACHI,
                    'MAQUYEN' => $MAQUYEN,
                    'NGAYTAO' => $NGAYTAO,
                    'VAITRO' => $VAITRO
                );

                //tạo nội dung thông báo
                if ($this->Nguoidung_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                } else {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu không thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                //redirect(admin_url('nguoidung/add'));
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
            }
        }
        
        $this->data['temp'] = 'admin/nguoidung/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        if (!$this->session->userdata('Admin_id')) {
            redirect(site_url('Admin/login'));
        }
        $user_id = $this->session->userdata('Admin_id');
        $user = $this->Nguoidung_model->get_info($user_id);
        if (!$user) {
            redirect();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
            $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[5]');
            $this->form_validation->set_rules('VAITRO', 'Vai trò', 'required');

            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $USERNAME = $this->input->post('USERNAME');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $VAITRO = $this->input->post('VAITRO');
                $SDT = $this->input->post('SDT');
                $DIACHI = $this->input->post('DIACHI');
                $MAQUYEN = $this->input->post('MAQUYEN');
                    $data = array(
                        'HOTEN' => $HOTEN,
                        'USERNAME' => $USERNAME,
                        'NGAYSINH' => $NGAYSINH,
                        'SDT' => $SDT,
                        'DIACHI' => $DIACHI,
                        'MAQUYEN' => $MAQUYEN,
                        'VAITRO' => $VAITRO
                    );

                    if ($this->Nguoidung_model->update($user->MANGUOIDUNG, $data)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Cập nhật dữ liệu thành công</div>');
                        // $message = '<div class="alert alert-primary" id="alert" role="alert">Cập nhật dữ liệu thành công</div>';
                        // $this->success_form['message'] = $message;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>');
                        // $message = '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>';
                        // $this->success_form['message'] = $message;
                    }
            }
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nhập dữ liệu không thành công</div>');
            }
        } 
        $this->data['message'] = $this->session->flashdata('message');

        $this->data['user'] = $user;
        $this->data['temp'] = 'admin/nguoidung/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $MANGUOIDUNG = $this->uri->rsegment('3');
        $info = $this->Nguoidung_model->get_info($MANGUOIDUNG);
        if ($info == FALSE) {
            $message = '<div class="alert alert-danger" role="alert">Người dùng không tồn tại</div>';
            $this->success_form['message'] = $message;
        } else {
            //thực hiện xóa
            $this->Nguoidung_model->delete($MANGUOIDUNG);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/nguoidung/index');
    }

    //thực hiện đăng xuất
    function logout()
    {
        if ($this->session->userdata('Login')) {
            $this->session->unset_userdata('Login');
        }
        redirect(admin_url('login'));
    }

    function changePassword()
    {
        if (!$this->session->userdata('Nguoidung_id_Login')) {
            redirect(admin_url('login'));
        }
        //lay thong tin thanh vien
        $user_id = $this->session->userdata('Nguoidung_id_Login');
        $user = $this->Nguoidung_model->get_info($user_id);

        if (!$user) {
            redirect();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('PASSWORD', 'Mật khẩu cũ', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('NEWPASS', 'Mật khẩu mới', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('NEWPASSCONF', 'Xác nhận mật khẩu mới', 'trim|matches[NEWPASS]');

            if ($this->form_validation->run()) {
                $PASSWORD = $this->input->post('PASSWORD');
                $NEWPASS = $this->input->post('NEWPASS');
                if ($PASSWORD == $user->PASSWORD  && $this->form_validation->run() == TRUE) {
                    $data = array(
                        'PASSWORD' => $NEWPASS
                    );
                    if ($this->Nguoidung_model->update($user_id, $data)) {
                        $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Đổi mật khẩu thành công</div>');
                        redirect(admin_url('Nguoidung/index'));
                        // $message = '<div class="alert alert-primary" id="alert" role="alert">Cập nhật dữ liệu thành công</div>';
                        // $this->success_form['message'] = $message;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Đổi mật khẩu không thành công</div>');
                        // $message = '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>';
                        // $this->success_form['message'] = $message;
                    }
                } else if ($PASSWORD != $user->PASSWORD) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Xác nhận mật khẩu thất bại</div>');
                    // $message = '<div class="alert alert-danger" role="alert">Xác nhận mật khẩu thất bại</div>';
                    // $this->success_form['message'] = $message;
                }
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
            }
        }

        $this->data['temp'] = 'admin/Nguoidung/changePassword';
        $this->load->view('admin/main', $this->data);
    }

    function Profile()
    {
        if (!$this->session->userdata('Admin_id')) {
            redirect(site_url('Admin/login'));
        }
        $user_id = $this->session->userdata('Admin_id');
        $user = $this->Nguoidung_model->get_info($user_id);
        if (!$user) {
            redirect();
        }

        $this->data['user'] = $user;

        $this->data['temp'] = 'admin/Nguoidung/Profile';
        $this->load->view('admin/main', $this->data);
    }
}
