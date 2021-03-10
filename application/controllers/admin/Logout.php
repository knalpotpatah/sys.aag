<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">You have been logout!</div>');
            redirect('login');
        }
    }

/* End of file Logout.php */
