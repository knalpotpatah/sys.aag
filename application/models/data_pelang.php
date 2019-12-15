<?php

defined('BASEPATH') or exit('No direct script access allowed');

class data_pelang extends CI_model
{

    public function all()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_kerjasama','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_pekerjaan','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');  
    $this->db->where(['terminate' => 0]); 
		$query = $this->db->get()->result();
		return $query;
    }

    public function increase()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_kerjasama','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_pekerjaan','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');  
    $this->db->where(['terminate' => 0, 'decrease' => '0']); 
		$query = $this->db->get()->result();
		return $query;
    }

    public function decrease()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_kerjasama','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_pekerjaan','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');  
    $this->db->where(['terminate' => 0, 'increase' => '0']); 
		$query = $this->db->get()->result();
		return $query;
    }

    public function kontrak()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_kerjasama','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_pekerjaan','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');
    $this->db->where(['id_kerjasama' => 1,'terminate' => 0]);   
		$query = $this->db->get()->result();
		return $query;
    }

    public function job()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_pekerjaan','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_kerjasama','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');
    $this->db->where(['id_kerjasama' => 2, 'terminate' => 0]);   
		$query = $this->db->get()->result();
		return $query;
    }

    public function terminate()
    {
    $this->db->select('*');
    $this->db->from('data_pelanggan');  
    $this->db->join('users','users.id = data_pelanggan.id_user','left');
    $this->db->join('jenis_pekerjaan','jenis_pekerjaan.id_peker = data_pelanggan.id_kerjasama','left');
    $this->db->join('cabang','cabang.id_ca = data_pelanggan.id_cabang','left'); 
    $this->db->join('jenis_kerjasama','jenis_kerjasama.id_ks = data_pelanggan.id_pekerjaan','left'); 
    $this->db->join('sumber','sumber.id_sum = data_pelanggan.id_sumber','left');  
    $this->db->where(['terminate' => 1]); 
		$query = $this->db->get()->result();
		return $query;
    }
}

/* End of file Testimoni.php */
