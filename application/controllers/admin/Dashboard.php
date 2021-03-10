<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Report_mod');
        }

        public function index()
        {
                $data['report'] = $this->Report_mod->report();
                $data['tikus'] = $this->db->get_where('report', ['id_hama' => 1])->result();
                $data['jerman'] = $this->db->get_where('report', ['id_hama' => 2])->result();
                $data['amerika'] = $this->db->get_where('report', ['id_hama' => 3])->result();
                $data['rumah'] = $this->db->get_where('report', ['id_hama' => 4])->result();
                $data['limbah'] = $this->db->get_where('report', ['id_hama' => 5])->result();
                $data['buah'] = $this->db->get_where('report', ['id_hama' => 6])->result();
                $data['nyamuk'] = $this->db->get_where('report', ['id_hama' => 7])->result();
                $data['semut'] = $this->db->get_where('report', ['id_hama' => 8])->result();
                $data['mothid'] = $this->db->get_where('report', ['id_hama' => 9])->result();
                $data['beetleid'] = $this->db->get_where('report', ['id_hama' => 10])->result();
                $this->load->view('back/dashboard', $data);
        }
}
