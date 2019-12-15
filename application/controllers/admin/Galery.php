<?php

defined('BASEPATH') or exit('No direct script access allowed');

class galery extends CI_Controller
{
    
    public function index()
    {
        $data['galery'] = $this->db->get('galery')->result();
        $this->load->view('back/admin/galery/index', $data);
    }

    public function tambah()
    {

        $this->load->view('back/admin/galery/tambah_galery');
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './img/galery';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; // 2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    //file gagal diupload -> kembali ke form tambah
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                  
                    $foto = $this->upload->data();
                    // // $thumbnail = $config['file_name'];
                    // // library yang disediakan codeigniter
                    // $config['image_library']  = 'gd2';
                    // // gambar yang akan dibuat thumbnail
                    // $config['source_image']   = './assets/home/img/' . $foto['file_name'] . '';
                    // // membuat thumbnail
                    // $config['create_thumb']   = TRUE;
                    // // rasio resolusi
                    // $config['maintain_ratio'] = FALSE;
                    // // lebar
                    // $config['width']          = 718;
                    // // tinggi
                    // $config['height']         = 520;
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();
                    $data = [
                        'nama' => $this->input->post('galery'),
                        'img' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];

                    $tambah = $this->db->insert('galery', $data);

                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>galery berhasil ditambah.</strong> </div>');
                        redirect(base_url('admin/galery'));
                    }
                }
            } else {
                $data = [
                        'nama' => $this->input->post('galery'),
                ];
                $tambah = $this->db->insert('galery', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>galery berhasil ditambah.</strong> </div>');
                    redirect(base_url('admin/galery'));
                }
            }
        }
    }



    function edit($id) 
{   
    $data['galery'] = $this->db->where('id', $id)->get('galery')->row();
    $this->load->view('back/admin/galery/edit_galery', $data);

if ($this->input->post('submit') == 'update'){
    if (!empty($_FILES['img']['name'])) {
        $nmfile =date('YmdHis');
        /* memanggil library upload ci */
        $config['upload_path']      = './img/blog';
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
                'nama' => $this->input->post('galery'),
                'img' => $nmfile,
                'img_type' => $foto['file_ext'],
            ];
            $header = $this->db->get_where('galery', ['id' => $id])->row();
            $old_image = $header->img . $header->img_type;
            unlink(FCPATH . './img/galery/' . $old_image);
            $this->db->where('id', $id);
            $tambah = $this->db->update('galery', $data);
            if ($tambah) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>galery berhasil diubah.</strong> </div>');
                redirect(base_url('admin/galery'));
            }
        }
    }else{
    $data = [
            'nama'=> $this->input->post('galery'),
        ];
            $update = $this->db->where('id', $id)->update('galery', $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>galery berhasil diedit.</strong> </div>');
                        redirect(base_url('admin/galery'));
                    }
                }
}  
}

    public function hapus($id)
    {
        $images = $this->db->get_where('galery', ['id' => $id])->row();
        $old_image = $images->img . $images->img_type;
        $hapus1 = unlink(FCPATH . './img/galery/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('galery');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>galery berhasil dihapus.</strong> </div>');
            redirect(base_url('admin/galery'));
        }
    }

    // Summernote
    //Upload image summernote
    function upload_image()
    {
        $this->load->library('upload');
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/upload/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/upload/' . $data['file_name'];
            }
        }
    }
    //Upload image summernote end

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
}

/* End of file Service.php */
 // public function edit($id)
    // {
    //     $data['services'] = $this->db->where('id_service', $id)->get('services')->row();
    //     $this->load->view('back/ngadmin/service/edit_service', $data);
    //     if ($this->input->post('submit') == 'update') {
    //         if (!empty($_FILES['img']['name'])) {
    //             $nmfile = strtolower(url_title($this->input->post('judul'))) . date('YmdHis');
    //             /* memanggil library upload ci */
    //             $config['upload_path']      = './assets/upload/';
    //             $config['allowed_types']    = 'jpg|jpeg|png|gif';
    //             $config['max_size']         = '2048'; // 2 MB
    //             $config['file_name']        = $nmfile; //nama yang terupload nantinya
    //             $this->load->library('upload', $config);
    //             if (!$this->upload->do_upload('img')) {
    //                 //file gagal diupload -> kembali ke form tambah
    //                 $error = array('error' => $this->upload->display_errors());
    //                 echo $error['error'];
    //             } else {
    //                 $service = $this->db->get_where('services', ['id_service' => $id])->row();
    //                 $foto = $this->upload->data();
    //                 $thumbnail = $config['file_name'];
    //                 // library yang disediakan codeigniter
    //                 $config['image_library']  = 'gd2';
    //                 // gambar yang akan dibuat thumbnail
    //                 $config['source_image']   = './assets/upload/' . $foto['file_name'] . '';
    //                 // membuat thumbnail
    //                 $config['create_thumb']   = TRUE;
    //                 // rasio resolusi
    //                 $config['maintain_ratio'] = FALSE;
    //                 // lebar
    //                 $config['width']          = 718;
    //                 // tinggi
    //                 $config['height']         = 520;
    //                 $this->load->library('image_lib', $config);
    //                 $this->image_lib->resize();
    //                 $data = [
    //                     'title_service' => $this->input->post('judul'),
    //                     'service' => $this->input->post('layanan'),
    //                     'deskripsi_service' => $this->input->post('deskripsi'),
    //                     'slug_service' =>  strtolower(url_title($this->input->post('judul'))),
    //                     'content_service' => $_POST['content'],
    //                     'img_service' => $nmfile,
    //                     'img_type' => $foto['file_ext'],
    //                 ];
    //                 $old_image = $service->img_service . $service->img_type;
    //                 $old_image_thumb = $service->img_service . '_thumb' . $service->img_type;
    //                 $hapus1 = unlink(FCPATH . './assets/upload/' . $old_image);
    //                 $hapus2 = unlink(FCPATH . './assets/upload/' . $old_image_thumb);

    //                 $update = $this->db->where('id_service', $id)->update('services', $data);
    //                 if ($update) {
    //                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Layanan berhasil diedit.</strong> </div>');
    //                     redirect(base_url('ngadmin/service'));
    //                 }
    //             }
    //         } else {
    //             $data = [
    //                 'title_service' => $this->input->post('judul'),
    //                 'service' => $this->input->post('layanan'),
    //                 'deskripsi_service' => $this->input->post('deskripsi'),
    //                 'slug_service' =>  strtolower(url_title($this->input->post('judul'))),
    //                 'content_service' => $_POST['content'],
    //             ];
    //             $update = $this->db->where('id_service', $id)->update('services', $data);
    //             if ($update) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Layanan berhasil diedit.</strong> </div>');
    //                 redirect(base_url('ngadmin/service'));
    //             }
    //         }
    //     }
    // }