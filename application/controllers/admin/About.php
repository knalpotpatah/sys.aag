<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    // public function index()
    // {
    //     $data['desain'] = $this->db->get('desain')->result();
    //     $this->load->view('back/ngadmin/desain/index', $data);
    // }
    public function index()
    {
        $data['about'] = $this->db->get('about')->result();
        $this->load->view('back/admin/about/index', $data);
    }
    public function tambah()
    {
        $this->load->view('back/admin/about/tambah_about');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('about'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload';
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
                        'ket' => $this->input->post('ket'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $tambah = $this->db->insert('about', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil ditambah.</strong> </div>');
                        redirect(base_url('admin/about'));
                    }
                }
            } else {
                $data = [
                    'ket' => $this->input->post('about'),
                ];
                $tambah = $this->db->insert('about', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil ditambah.</strong> </div>');
                    redirect(base_url('admin/about'));
                }
            }
        }
    }

    public function edit($id)
    {
        $data['about'] = $this->db->get_where('about', ['id' => $id])->row();
        $this->load->view('back/admin/about/edit_about', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('about'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/about';
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
                        'ket' => $this->input->post('about'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $desain = $this->db->get_where('about', ['id' => $id])->row();
                    $old_image = $desain->img . $desain->img_type;
                    unlink(FCPATH . './img/about/' . $old_image);
                    $this->db->where('id', $id);
                    $tambah = $this->db->update('about', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil diubah.</strong> </div>');
                        redirect(base_url('admin/about'));
                    }
                }
            } else {
                $data = [
                    'ket' => $this->input->post('about'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('about', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil diubah.</strong> </div>');
                    redirect(base_url('admin/about'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $about = $this->db->get_where('about', ['id' => $id])->row();
        $old_image = $about->img . $about->img_type;
        $hapus1 = unlink(FCPATH . './img/about/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('about');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil dihapus.</strong> </div>');
            redirect(base_url('admin/about'));
        }
    }
}

/* End of file Testimoni.php */
