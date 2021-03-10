<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('admin/dashboard');
        // }

        $this->load->view('login');
    }
    public function admin()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('admin/dashboard');
        // }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'News Portal Login Page';
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $users = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($users) {
            // if admin active
            if ($users['status'] == 'aktif') {
                // check password
                if (password_verify($password, $users['password'])) {
                    $data = [
                        'email' => $email
                    ];
                    $this->session->set_userdata($data);
                    redirect('users/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">This email has not been activated! </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email is not registered!</div>');
            redirect('login');
        }
    }

   
}


/* End of file Login.php */
