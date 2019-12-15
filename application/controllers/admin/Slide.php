<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slide extends CI_Controller
{

    // public function index()
    // {
    //     $data['desain'] = $this->db->get('desain')->result();
    //     $this->load->view('back/ngadmin/desain/index', $data);
    // }
    public function index()
    {
        $data['slide'] = $this->db->get('slide')->result();
        $this->load->view('back/admin/slide/index', $data);
    }
    public function tambah()
    {
        $this->load->view('back/admin/slide/tambah_slide');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('slide'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/slider';
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
                        'nama' => $this->input->post('slide'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $tambah = $this->db->insert('slide', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Slide berhasil ditambah.</strong> </div>');
                        redirect(base_url('admin/slide'));
                    }
                }
            } else {
                $data = [
                    'nama' => $this->input->post('slide'),
                ];
                $tambah = $this->db->insert('slide', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Slide berhasil ditambah.</strong> </div>');
                    redirect(base_url('admin/slide'));
                }
            }
        }
    }

    public function edit($id)
    {
        $data['slide'] = $this->db->get_where('slide', ['id' => $id])->row();
        $this->load->view('back/admin/slide/edit_slide', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('slide'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/slider';
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
                        'nama' => $this->input->post('slide'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $slide = $this->db->get_where('slide', ['id' => $id])->row();
                    $old_image = $slide->img . $slide->img_type;
                    unlink(FCPATH . './img/slider/' . $old_image);
                    $this->db->where('id', $id);
                    $tambah = $this->db->update('slide', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slide berhasil diubah.</strong> </div>');
                        redirect(base_url('admin/slide'));
                    }
                }
            } else {
                $data = [
                    'nama' => $this->input->post('slide'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('slide', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slide berhasil diubah.</strong> </div>');
                    redirect(base_url('admin/slide'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $slide = $this->db->get_where('slide', ['id' => $id])->row();
        $old_image = $slide->img . $slide->img_type;
        $hapus1 = unlink(FCPATH . './img/slider/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('slide');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Slide berhasil dihapus.</strong> </div>');
            redirect(base_url('admin/slide'));
        }
    }
}

/* End of file Testimoni.php */
