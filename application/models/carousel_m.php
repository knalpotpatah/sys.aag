<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_models
{

    public function index()
    {
		
        $data['news'] = $this->db->get('news')->result();
		
		$this->load->view('front/template/head', $data);
		$this->load->view('front/menu', $data);
        $this->load->view('front/news', $data);
		$this->load->view('front/template/foot'); 
		$this->load->view('front/template/js');
    }
}

/* End of file Testimoni.php */
