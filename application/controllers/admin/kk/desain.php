<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Desain extends CI_Controller
{

    public function index()
    {
        $data['desain'] = $this->db->get('desain')->result();
        $this->load->view('back/ngadmin/desain/index', $data);
    }
    public function Tambah()
    {
        $this->load->view('back/ngadmin/desain/tambah_desain');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('nama'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/home/img';
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
                        'nama_desain' => $this->input->post('nama'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];

                    $tambah = $this->db->insert('desain', $data);

                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slider berhasil ditambah.</strong> </div>');
                        redirect(base_url('ngadmin/desain'));
                    }
                }
            } else {
                $data = [
                    'nama_desain' => $this->input->post('nama'),
                ];
                $tambah = $this->db->insert('desain', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slider berhasil ditambah.</strong> </div>');
                    redirect(base_url('ngadmin/desain'));
                }
            }
        }
    }

    public function edit($id)
    {
        $data['desain'] = $this->db->get_where('desain', ['id' => $id])->row();
        $this->load->view('back/ngadmin/desain/edit_desain', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('nama'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload/slider';
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
                        'judul' => $this->input->post('judul'),
                        'img_slide' => $nmfile,
                        'img_type_slide' => $foto['file_ext'],
                    ];
                    $slider = $this->db->get_where('slider', ['id_slide' => $id])->row();
                    $old_image = $slider->img_slide . $slider->img_type_slide;
                    unlink(FCPATH . './assets/home/img/' . $old_image);
                    $this->db->where('id_slide', $id);
                    $tambah = $this->db->update('slider', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slider berhasil diubah.</strong> </div>');
                        redirect(base_url('ngadmin/desain'));
                    }
                }
            } else {
                $data = [
                    'nama_desain' => $this->input->post('nama'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('desain', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slider berhasil diubah.</strong> </div>');
                    redirect(base_url('ngadmin/desain'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $desain = $this->db->get_where('desain', ['ide' => $id])->row();
        $old_image = $desain->img . $desain->img_type;
        $hapus1 = unlink(FCPATH . './assets/home/img/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('desain');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>desain berhasil dihapus.</strong> </div>');
            redirect(base_url('ngadmin/desain'));
        }
    }
}

/* End of file Testimoni.php */
