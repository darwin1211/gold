<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends My_Controller
{
    private $_user_log_activity = 'user_log_activity';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        //            $this->load->model('Admin_model');
        $this->load->model('Admin_model');
        $this->load->model('User_model');

        $this->load->model('User_token_model');
        $this->load->library('commonlibrary');
        $this->load->library('commonlib');
        $this->load->library('session');
        $this->load->library("Upload");
    }

    function register_username_exists()
    {
        $user_name = $this->input->post('user_name');
        if (!empty($user_name)) {
            if (!empty($this->User_model->check_username_exists($user_name))) {
                echo json_encode(FALSE);
            } else {
                echo json_encode(TRUE);
            }
        }
    }

    public function login()
    {

         if (isset($_SESSION['my_userdata']) && !empty($_SESSION['my_userdata'])) {
            redirect('admin/dashboard');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login_username', 'Email', 'required');
        $this->form_validation->set_rules('login_password', 'Password', 'required');
        $dataArray = array();
        $dataArray['template_title'] = USERLOGIN . ' | ' . SITENAME;
        $dataArray['template_heading'] = USERLOGIN;
        if ($this->form_validation->run() == false) {
            $message = $this->session->flashdata('login_error_message');
            $resend_activation_success_message = $this->session->flashdata('resend_activation_success_message');
            $resend_activation_error_message = $this->session->flashdata('resend_activation_error_message');

            $dataArray['message'] = $message;
            $dataArray['fb_aap_id'] = getCustomConfigItem('fb_app_id');
            $dataArray['resend_activation_success_message'] = $resend_activation_success_message;
            $dataArray['resend_activation_error_message'] = $resend_activation_error_message;
            $this->load->view('admin-login-form', $dataArray);
        } else {
            log_message("MY_INFO", "Login Start");


           
            $userRecord = $this->Admin_model->signin($this->input->post('login_username'), $this->input->post('login_password'));


 
            if (!empty($userRecord)) {

                if ($userRecord->user_type != 'Super Admin') {
                    $site_code = getCustomConfigItem('site_code');
                    if ($userRecord->site_code != $site_code) {
                        $this->session->set_flashdata('login_error_message', 'Invalid Username/Password');


                        redirect(base_url() . 'login');
                    }
                }


                // if ($userRecord->user_type == 'User') {

                //     $this->session->set_flashdata('login_error_message', 'Invalid Username/Password');
                //     redirect(base_url() . 'login');
                // }




                if ($userRecord->is_locked == 'Yes') {
                    $this->session->set_flashdata('login_error_message', 'Your account is locked.');
                    redirect(base_url() . 'login');
                } else if ($userRecord->is_closed == 'Yes') {
                    $this->session->set_flashdata('login_error_message', 'Your account is closed.');
                    redirect(base_url() . 'login');
                } else {
                    // unset($userRecord->password);

                    $checkUserToken =  $this->User_token_model->getTokeById($userRecord->user_name);
                    $token = getToken(15);

                    if ($checkUserToken) {
                        $dataArray = array(
                            'id' => $checkUserToken->id,
                            'username' => $userRecord->user_name,
                            'token' => $token,
                        );
                        $this->User_token_model->addToken($dataArray);
                    } else {
                        $dataArray = array(
                            'username' => $userRecord->user_name,
                            'token' => $token,
                        );
                        $this->User_token_model->addToken($dataArray);
                    }



                    if (!empty($this->input->post("remember"))) {
                        setcookie("member_username", $userRecord->user_name, time() + (10 * 365 * 24 * 60 * 60));
                        setcookie("member_password", $this->input->post('login_password'), time() + (10 * 365 * 24 * 60 * 60));
                    } else {
                        if (isset($_COOKIE["member_username"]) && isset($_COOKIE["member_password"])) {
                            setcookie("member_username", "");
                            setcookie("member_password", "");
                        }
                    }

                    $sessondata['token'] = $token;
                    $sessondata['master_id'] = $userRecord->master_id;
                    $sessondata['user_id'] = $userRecord->user_id;

                    $sessondata['name'] = $userRecord->name;
                    $sessondata['user_name'] = $userRecord->user_name;
                    $sessondata['logged_in'] = true;
                    $sessondata['user_type'] = $userRecord->user_type;
                    $sessondata['password'] = $userRecord->password;

                    $_SESSION['my_userdata'] = $sessondata;

                    log_message("MY_INFO", "Login End");

                    if ($userRecord->user_type == 'User') {
                        redirect('dashboard');
                    } else if ($userRecord->user_type == 'Super Admin') {
                        redirect('admin/dashboard');
                    } else if ($userRecord->user_type == 'Admin') {
                        redirect('admin/dashboard');
                    } else if ($userRecord->user_type == 'Hyper Super Master') {
                        redirect('admin/dashboard');
                    } else if ($userRecord->user_type == 'Super Master') {
                        redirect('admin/dashboard');
                    } else if ($userRecord->user_type == 'Master') {
                        redirect('admin/dashboard');
                    } else if ($userRecord->user_type == 'Operator') {
                        redirect('admin/dashboard');
                    }
                }
            } else {

                $this->session->set_flashdata('login_error_message', 'Invalid Username/Password');

                if (!empty($sponsor_id)) {

                    redirect(base_url() . 'login');
                } else {

                    redirect(base_url() . 'login');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('my_userdata');
        redirect('/');
    }

    public function username_check($str)
    {
        if ($str == 'test') {
            $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
            return FALSE;
        } else {
            return TRUE;
        }
    }



    public function admin_dashboard()
    {
        $user_data = GetLoggedinUserData();

        $dataArray = array();
        $dataArray['email'] = $user_data['email'];

        // $dataArray['associationwithd'] = $this->Admin_model->associationwithdrawlNewrequest();


        // if (!empty($user_data) && $user_data['usertype'] == 'Admin') {
        //     $outstanding_amount = superjackpot_outstanding_amount();
        //     $dataArray['jackpot_outstanding_amount'] = my_currency_format($outstanding_amount);
        // }


        $dataArray['local_js'] = array();
        $dataArray['local_css'] = array(
            // 'select2'
        );
        //   p($dataArray);
        $this->load->view('admin_dashboard', $dataArray);
    }

    public function check_user_password()
    {
        $username = $_SESSION['my_userdata']['username'];
        $password = md5($this->input->post("current_password"));


        return $this->Admin_model->check_user_password($username, $password);
    }


    public function check_user_login()
    {
        $username = $_SESSION['my_userdata']['user_name'];
        $token = $_SESSION['my_userdata']['token'];
        $checkUserToken =  $this->User_token_model->getTokeById($username);

        if (!empty($checkUserToken)) {
            if ($token !== $checkUserToken->token) {
                $this->session->unset_userdata('my_userdata');
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
    }
}
