<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chart_mod extends CI_model
{

  public function report()
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    // $this->db->where(['terminate' => 0,'years_created' =>$tahun,'id_ks'=>1,'status_inc'=>null,'status_dec'=>null]);

    $query = $this->db->get()->result();
    return $query;
  }

  public function ana($client, $bulan, $tahun)
  {
    $this->db->select('*');
    $this->db->from('analystic');
    $this->db->join('client', 'client.id_cli = analystic.id_client', 'left');
    $this->db->where(['id_cli' => $client, 'month' => $bulan, 'year' => $tahun]);
    $query = $this->db->get()->result();
    return $query;
  }

  public function ana2($client, $bulan, $tahun)
  {
    $this->db->select('*');
    $this->db->from('analystic');
    $this->db->join('client', 'client.id_cli = analystic.id_client', 'left');
    $this->db->where(['id_cli' => $client, 'month' => $bulan, 'year' => $tahun]);
    $query = $this->db->get()->row();
    return $query;
  }

  public function client($client)
  {
    $this->db->select('*');
    $this->db->from('client');
    $this->db->where(['id_cli' => $client]);
    $query = $this->db->get()->row();
    return $query;
  }

  public function year($tahun)
  {
    $this->db->select('*');
    $this->db->from('year');
    $this->db->where(['tahun' => $tahun]);
    $query = $this->db->get()->row();
    return $query;
  }

  public function month($bulan)
  {
    $this->db->select('*');
    $this->db->from('month');
    $this->db->where(['id_mo' => $bulan]);
    $query = $this->db->get()->row();
    return $query;
  }

  public function tikus($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 1]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function jerman($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 2]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function amerika($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 3]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function lalim($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 5]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function larum($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 4]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function labu($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 6]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function nyamuk($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 7]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function semut($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 8]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }

  public function mothid($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 9]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }


  public function beetleid($client, $tahun, $bulan)
  {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->join('device', 'device.id_de = report.id_dev', 'left');
    $this->db->join('pest', 'pest.id_pe = report.id_hama', 'left');
    $this->db->join('client', 'client.id_cli = report.id_pelanggan', 'left');
    $this->db->where(['id_pelanggan' => $client, 'id_pe' => 10]);
    $this->db->where('YEAR(tgl)', $tahun);
    $this->db->where('MONTH(tgl)', $bulan);
    $query = $this->db->get()->result();
    return $query;
  }
}

/* End of file Testimoni.php */
