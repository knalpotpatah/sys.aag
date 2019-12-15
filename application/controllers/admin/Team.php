<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect(site_url('admin/login'), 'refresh');
        }
    }
    public function index()
    {
        $data['team'] = $this->db->get('team')->result();
        $this->load->view('back/admin/team/index', $data);
    }
    public function tambah()
    {
        $this->load->view('back/admin/team/tambah_team');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('team'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/team';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; //2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    $foto = $this->upload->data();
                    $data = [
                        'nama' => $this->input->post('team'),
                        'title' => $this->input->post('title'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $tambah = $this->db->insert('team', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Team berhasil ditambah.</strong> </div>');
                        redirect(base_url('admin/team'));
                    }
                }
            } else {
                $data = [
                    'nama' => $this->input->post('team'),
                    'title' => $this->input->post('title'),
                ];
                $tambah = $this->db->insert('team', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Team berhasil ditambah.</strong> </div>');
                    redirect(base_url('admin/team'));
                }
            }
        }
    }

    public function edit($id)
    {
        $data['team'] = $this->db->get_where('team', ['id' => $id])->row();
        $this->load->view('back/admin/team/edit_team', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('team'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/team';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; //2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    $foto = $this->upload->data();
                    $data = [
                        'nama' => $this->input->post('team'),
                        'title' => $this->input->post('title'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $team = $this->db->get_where('team', ['id' => $id])->row();
                    $old_image = $team->img . $team->img_type;
                    unlink(FCPATH . './img/team/' . $old_image);
                    $this->db->where('id', $id);
                    $tambah = $this->db->update('team', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>team berhasil diubah.</strong> </div>');
                        redirect(base_url('admin/team'));
                    }
                }
            } else {
                $data = [
                    'nama' => $this->input->post('team'),
                    'title' => $this->input->post('title'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('team', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>team berhasil diubah.</strong> </div>');
                    redirect(base_url('admin/team'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $team = $this->db->get_where('team', ['id' => $id])->row();
        $old_image = $team->img . $team->img_type;
        $hapus1 = unlink(FCPATH . './img/team/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('team');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>team berhasil dihapus.</strong> </div>');
            redirect(base_url('admin/team'));
        }
    }
}

/* End of file Testimoni.php */
