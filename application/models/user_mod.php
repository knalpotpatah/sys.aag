<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_mod extends CI_model
{

    public function sales_aktif()
    {
		
		$this->db->select('*');
		$this->db->from ('users');
		$this->db->join('cabang','on cabang.id_ca = users.id_cabang','left');
		$this->db->where(['level'=>1]);
		return $this->db->get()->result();
		
       
    }
	// public function det_news()
    // {
		
	// 	$this->db->select('*');
		
	// 	$this->db->from ('img_news');
	// 	$this->db->join('news', 'news.id = img_news.id_news');
	// 	$this->db->where(['status'=>1,'urutan'=>0]);
	// 	return $this->db->get()->result();
		
       
    // }


	//  public function news()
    // {
		
	// 	$this->db->select('*');
		
	// 	$this->db->from ('img_news');
	// 	$this->db->join('news', 'news.id = img_news.id_news');
	// 	$this->db->where(['status'=>1,'urutan'=>1]);
	// 	$this->db->limit(3);
	// 	return $this->db->get()->result();
		
       
    // }

}