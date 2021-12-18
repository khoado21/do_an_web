<?php
Class Login extends MY_Controller
{
    function index()
    {    
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('Login','Login','callback_check_login');
            if($this->form_validation->run())
            {
                $user = $this->_get_user_info();
                $this->session->set_userdata('Admin_id', $user->MANGUOIDUNG);
                $this->session->set_userdata('Login', true);
                redirect(admin_url('home'));
            }
        }
        $this->load->view('admin/login/index');
    }

    //kiem tra email va password
    function check_login()
    {
        $EMAIL = $this->input->post('EMAIL');
        $PASSWORD = $this->input->post('PASSWORD');
        $this->load->model('Nguoidung_model');
        $where = array('EMAIL' => $EMAIL, 'PASSWORD' => $PASSWORD);
        $MAQUYEN = $this->Nguoidung_model->get_info_rule($where, $field = 'MAQUYEN');
        if($this->Nguoidung_model->check_exists($where))
        {
            $MAQUYEN = $this->Nguoidung_model->get_info_rule($where, $field = 'MAQUYEN');
            if($MAQUYEN->MAQUYEN == 1)
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
                return false;
            }
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
            return false;
        }
    }

    
    private function _get_user_info()
    {
        $EMAIL = $this->input->post('EMAIL');
        $PASSWORD = $this->input->post('PASSWORD');
        
        $where = array('EMAIL' => $EMAIL, 'PASSWORD' => $PASSWORD);
        $user = $this->Nguoidung_model->get_info_rule($where);
        return $user;
    }
}