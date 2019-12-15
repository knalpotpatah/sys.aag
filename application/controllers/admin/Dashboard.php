<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('back/admin/dashboard');
    }
}

/* End of file Dashboard.php */
