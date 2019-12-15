<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     //Do your magic here
    //     is_logged_in();
    // }
    public function index()
    {
        $data['admins'] = $this->db->get('admins')->result();

        $this->load->view('back/ngadmin/admin/index', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'nama',
            'nama',
            'trim|required|is_unique[admins.nama]',
            [
                'required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah terdaftar'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|is_unique[admins.email]',
            [
                'required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah terdaftar'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[8]',
            [
                'required' => '%s tidak boleh kosong.',
                'min_length' => '%s minimal 8 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'passwordc',
            'Konfirmasi Password',
            'trim|required|matches[password]',
            [
                'required' => '%s tidak boleh kosong.',
                'matches' => 'Password Harus Sama'
            ]
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('back/ngadmin/admin/tambah_admin');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
            ];
            $tambah = $this->db->insert('admins', $data);
            if ($tambah) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menambah Data.</strong> </div>');
                redirect(base_url('ngadmin/admin'));
            }
        }
    }
    public function edit($id)
    {
        $data['admin'] = $this->db->get_where('admins', ['id' => $id])->row();
        $this->form_validation->set_rules(
            'nama',
            'nama',
            'trim|required|is_unique[admins.nama]',
            [
                'required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah terdaftar'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required',
            [
                'required' => '%s tidak boleh kosong.',
            ]
        );
         $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|min_length[8]',
            [
                'min_length' => '%s minimal 8 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'passwordc',
            'Konfirmasi Password',
            'trim|matches[password]',
            [
                'matches' => 'Password Harus Sama'
            ]
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('back/ngadmin/admin/edit_admin', $data);
        } else {
            if (!$this->input->post('password')) {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];
            $this->db->where('id', $id);
            $tambah = $this->db->update('admins', $data);
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('admins', $data);
            }    
            if ($tambah) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Mengubah Data.</strong> </div>');
                redirect(site_url('ngadmin/admin'));
            }
        }
    }
    function hapus($id)
    {
        $this->db->where('id', $id);
        $hapus = $this->db->delete('admins');
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data.</strong> </div>');
            redirect(site_url('ngadmin/admin'), 'refresh');
        }
    }
    function aktif($id)
    {
        $data = ['status' => 'aktif'];
        $this->db->where('id', $id);
        $this->db->update('admins', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Status Berhasil Diubah.</strong> </div>');
        redirect(site_url('ngadmin/admin'), 'refresh');
    }
    function nonaktif($id)
    {
        $data = ['status' => 'nonaktif'];
        $this->db->where('id', $id);
        $this->db->update('admins', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Status Berhasil Diubah.</strong> </div>');
        redirect(site_url('ngadmin/admin'), 'refresh');
    }

    // Acces Menu
    // public function profile()
    // {
    //     $data['profile'] = $this->db->get_where('admins', ['email' =>
    //     $this->session->userdata('email')]);
    //     $this->load->view('back/ngadmin/admin/profile', $data);
    // }
}

/* End of file Admin.php */
