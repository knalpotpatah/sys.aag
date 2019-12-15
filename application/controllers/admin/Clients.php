<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        is_logged_in();
    }


    public function index()
    {
        $data['clients'] = $this->db->get('clients')->result();
        $this->load->view('back/ngadmin/clients/index', $data);
    }
    public function tambah()
    {
        $this->load->view('back/ngadmin/clients/tambah_client');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('client'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload/clients';
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
                        'nama_client' => $this->input->post('client'),
                        'img_client' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $tambah = $this->db->insert('clients', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil ditambah.</strong> </div>');
                        redirect(base_url('ngadmin/clients'));
                    }
                }
            } else {
                $data = [
                    'nama_client' => $this->input->post('client'),
                ];
                $tambah = $this->db->insert('clients', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil ditambah.</strong> </div>');
                    redirect(base_url('ngadmin/clients'));
                }
            }
        }
    }
    public function edit($id)
    {
        $data['clients'] = $this->db->get_where('clients', ['id_client' => $id])->row();
        $this->load->view('back/ngadmin/clients/edit_client', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('client'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload/clients';
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
                        'nama_client' => $this->input->post('client'),
                        'img_client' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $clients = $this->db->get_where('clients', ['id_client' => $id])->row();
                    $old_image = $clients->img_client . $clients->img_type;
                    unlink(FCPATH . './assets/upload/clients/' . $old_image);
                    $this->db->where('id_client', $id);
                    $tambah = $this->db->update('clients', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil diubah.</strong> </div>');
                        redirect(base_url('ngadmin/clients'));
                    }
                }
            } else {
                $data = [
                    'nama_client' => $this->input->post('client'),
                ];
                $this->db->where('id_client', $id);
                $tambah = $this->db->update('clients', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil diubah.</strong> </div>');
                    redirect(base_url('ngadmin/clients'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $clients = $this->db->get_where('clients', ['id_client' => $id])->row();
        $old_image = $clients->img_client . $clients->img_type;
        $hapus1 = unlink(FCPATH . './assets/upload/clients/' . $old_image);
        $this->db->where('id_client', $id);
        $hapus = $this->db->delete('clients');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil dihapus.</strong> </div>');
            redirect(base_url('ngadmin/clients'));
        }
    }
}

/* End of file Clients.php */
