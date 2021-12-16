<?php
Class Nguoidung extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nguoidung_model');
    }

    function index()
    {

    }

    function check_email()
    {
        $EMAIL = $this->input->post('EMAIL');
        $where = array('email' => $EMAIL);

        //kiểm tra email đã tồn tại chưa
        if ($this->Nguoidung_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function register()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
            $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[3]');
            $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('PASSCONF', 'Nhập lại mật khẩu', 'trim|matches[PASSWORD]');
            $this->form_validation->set_rules('EMAIL', 'Email đăng nhập', 'required|callback_check_email');
            $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'trim|required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'trim|required');

            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $USERNAME = $this->input->post('USERNAME');
                $PASSWORD = $this->input->post('PASSWORD');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $SDT = $this->input->post('SDT');
                $DIACHI = $this->input->post('DIACHI');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $EMAIL = $this->input->post('EMAIL');
                $VAITRO = 'Khách hàng';
                $MAQUYEN = 3;
                $NGAYTAO = date('y-m-d');
                if($this->input->post('NGAYSINH') == '0000-00-00' || empty($this->input->post('NGAYSINH')))
                {
                    $data = array(
                        'HOTEN' => $HOTEN,
                        'USERNAME' => $USERNAME,
                        'PASSWORD' => $PASSWORD,
                        'EMAIL' => $EMAIL,
                        'VAITRO' => $VAITRO,
                        'MAQUYEN' => $MAQUYEN,
                        'DIACHI' => $DIACHI,
                        'NGAYTAO' => $NGAYTAO,
                        'SDT' => $SDT
                    );
                }
                else {
                    $data = array(
                        'HOTEN' => $HOTEN,
                        'USERNAME' => $USERNAME,
                        'PASSWORD' => $PASSWORD,
                        'NGAYSINH' => $NGAYSINH,
                        'EMAIL' => $EMAIL,
                        'VAITRO' => $VAITRO,
                        'MAQUYEN' => $MAQUYEN,
                        'DIACHI' => $DIACHI,
                        'NGAYTAO' => $NGAYTAO,
                        'SDT' => $SDT
                    );
                }

                //tạo nội dung thông báo
                if ($this->Nguoidung_model->create($data)) {
                    $this->session->set_flashdata('message', 'Đăng kí thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                } else {
                    $this->session->set_flashdata('message', 'Đăng kí không thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu không thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                }
                //chuyển tới trang chủ
                redirect(site_url());
            }
        }

        $this->data['temp'] = 'site/Nguoidung/register';
        $this->load->view('site/layout', $this->data);
    }

    function check_login()
    {
        $this->load->model('Nguoidung_model');
        $user = $this->_get_user_info();
        if($user)
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__,  "<div class='center'><h3 class='message' style='text-align:center'>Đăng nhập không thành công</h3></div><br>");
            return false;
        }
    }

    function login()
    {
        //nếu đã đăng nhập thì chuyển về trang profile
        if($this->session->userdata('Nguoidung_id_Login'))
        {
            redirect(site_url('Nguoidung'));
        }
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('EMAIL', 'Email đăng nhập', 'required');
            $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required');
            $this->form_validation->set_rules('Login','Login','callback_check_login');
            if($this->form_validation->run())
            {
                $user = $this->_get_user_info();
                $this->session->set_userdata('Nguoidung_id_Login', $user->MANGUOIDUNG);
                $this->session->set_flashdata('message', 'Đăng nhập thành công');
                redirect(site_url());
            }
        }

        $this->data['temp'] = 'site/Nguoidung/login';
        $this->load->view('site/layout', $this->data);
    }

    //lay thong tin thanh vien
    private function _get_user_info()
    {
        $EMAIL = $this->input->post('EMAIL');
        $PASSWORD = $this->input->post('PASSWORD');
        
        $where = array('EMAIL' => $EMAIL, 'PASSWORD' => $PASSWORD);
        $user = $this->Nguoidung_model->get_info_rule($where);
        return $user;
    }

    //thực hiện đăng xuất
    function logout()
    {
        if($this->session->userdata('Nguoidung_id_Login'))
        {
            $this->session->set_flashdata('message', 'Đăng xuất thành công');
            $this->session->unset_userdata('Nguoidung_id_Login');
        }
        redirect();
    }

    
    function Profile()
    {
        if(!$this->session->userdata('Nguoidung_id_Login'))
        {
            redirect(site_url('Nguoidung/login'));
        }
        $user_id = $this->session->userdata('Nguoidung_id_Login');
        $user = $this->Nguoidung_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }

        $this->data['user'] = $user;

        $this->data['temp'] = 'site/Nguoidung/Profile';
        $this->load->view('site/layout', $this->data);
    }

    function edit()
    {
        if(!$this->session->userdata('Nguoidung_id_Login'))
        {
            redirect(site_url('Nguoidung/login'));
        }
        //lay thong tin thanh vien
        $user_id = $this->session->userdata('Nguoidung_id_Login');
        $user = $this->Nguoidung_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
            $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[3]');
            $this->form_validation->set_rules('DIACHI', 'Địa chỉ', 'trim|required');
            $this->form_validation->set_rules('SDT', 'Số điện thoại', 'trim|required');

            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $USERNAME = $this->input->post('USERNAME');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $SDT = $this->input->post('SDT');
                $DIACHI = $this->input->post('DIACHI');

                $data = array(
                    'HOTEN' => $HOTEN,
                    'USERNAME' => $USERNAME,
                    'NGAYSINH' => $NGAYSINH,
                    'SDT' => $SDT,
                    'DIACHI' => $DIACHI
                );

                if ($this->Nguoidung_model->update($user->MANGUOIDUNG, $data)) {
                    $this->session->set_flashdata('message', 'Sửa thông tin thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                } else {
                    $this->session->set_flashdata('message', 'Sửa thông tin không thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu không thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                }
                //chuyển tới trang profile
                redirect(site_url('Nguoidung/profile'));
            }
        }
        $this->data['user'] = $user;
        $this->data['temp'] = 'site/Nguoidung/edit';
        $this->load->view('site/layout', $this->data);
    }

    function changePassword()
    {
        if(!$this->session->userdata('Nguoidung_id_Login'))
        {
            redirect(site_url('Nguoidung/login'));
        }
        //lay thong tin thanh vien
        $user_id = $this->session->userdata('Nguoidung_id_Login');
        $user = $this->Nguoidung_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }

        if ($this->input->post()) {

            $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('PASSCONF', 'Nhập lại mật khẩu', 'trim|matches[PASSWORD]');

            if ($this->form_validation->run()) {
                

                $PASSWORD = $this->input->post('PASSWORD');

                $data = array('PASSWORD' => $PASSWORD);

                //tạo nội dung thông báo
                if ($this->Nguoidung_model->update($user->MANGUOIDUNG, $data)) {
                    $this->session->set_flashdata('message', 'Đổi mật khẩu thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                } else {
                    $this->session->set_flashdata('message', 'Đổi mật khẩu không thành công');
                    // $message = '<div class="alert alert-primary" id="alert" role="alert">
                    //                 Thêm mới dữ liệu không thành công
                    //             </div>';
                    // $this->success_form['message'] = $message;
                }
                //chuyển tới trang chủ
                redirect(site_url());
            } 
        }
        $this->data['temp'] = 'site/Nguoidung/changePassword';
        $this->load->view('site/layout', $this->data);
    }
}