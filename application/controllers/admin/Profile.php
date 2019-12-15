<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

   public function index()
    {
        $data['profil'] = $this->db->get('profil')->result();

        $this->load->view('back/ngadmin/profile/index', $data);
    }
    
    public function edit($id)
    {
        $data['profil'] = $this->db->get_where('profil', ['id' => $id])->row();
        $this->form_validation->set_rules(
            'nama',
            'nama',
            'trim|required|is_unique[profil.nama]',
            [
                'required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah terdaftar'
            ]
        );
         $this->form_validation->set_rules(
            'telp',
            'telp',
            'trim|min_length[8]',
            [
                'min_length' => '%s minimal 8 Angka'
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
            'instagram',
            'instagram',
            'trim|required',
            [
                'required' => '%s tidak boleh kosong'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('back/ngadmin/profile/edit_profil', $data);
        } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'telp' => $this->input->post('telp'),
                    'email' => $this->input->post('email'),
                    'instagram' => $this->input->post('instagram'),
                    'url_ig' => $this->input->post('url_ig'),
                    'youtube' => $this->input->post('youtube'),
                    'url_yt' => $this->input->post('url_yt'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('profil', $data);
                
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Mengubah Data.</strong> </div>');
                    redirect(site_url('ngadmin/profile'));
                    }
        }
    }
    function hapus($id)
    {
        $this->db->where('id', $id);
        $hapus = $this->db->delete('profil');
        $hapus = $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data.</strong> </div>');
            redirect(site_url('ngadmin/profile'));

    }
}    

/* End of file Profile.php */
