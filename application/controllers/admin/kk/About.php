<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
   
    public function index()
    {
        $data['about'] = $this->db->get('about')->result();
        $this->load->view('back/ngadmin/about/index', $data);
    }
    // public function tambah()
    // {

    //     $this->load->view('back/ngadmin/about/tambah_about');
    //     if ($this->input->post('submit') == 'update') {
    //         if (!empty($_FILES['img']['name'])) {
    //             $nmfile = strtolower(url_title($this->input->post('head_about'))) . date('YmdHis');
    //             /* memanggil library upload ci */
    //             $config['upload_path']      = './assets/upload/';
    //             $config['allowed_types']    = 'jpg|jpeg|png|gif|svg';
    //             $config['max_size']         = '2048'; // 2 MB
    //             $config['file_name']        = $nmfile; //nama yang terupload nantinya
    //             $this->load->library('upload', $config);
    //             if (!$this->upload->do_upload('img')) {
    //                 //file gagal diupload -> kembali ke form tambah
    //                 $error = array('error' => $this->upload->display_errors());
    //                 echo $error['error'];
    //             } else {
    //                 // $service = $this->db->get_where('services', ['id_service' => $id])->row();
    //                 $foto = $this->upload->data();
    //                 // $thumbnail = $config['file_name'];
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
    //                     'head_about' => $this->input->post('judul'),
    //                     'content_about' => $this->input->post('content'),
    //                     'img_about' => $nmfile,
    //                     'img_type_about' => $foto['file_ext'],
    //                 ];

    //                 $tambah = $this->db->insert('about', $data);

    //                 if ($tambah) {
    //                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil ditambah.</strong> </div>');
    //                     redirect(base_url('ngadmin/about'));
    //                 }
    //             }
    //         } else {
    //             $data = [
    //                 'head_about' => $this->input->post('judul'),
    //                 'content_about' => $_POST['content'],
    //             ];
    //             $tambah = $this->db->insert('about', $data);
    //             if ($tambah) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil ditambah.</strong> </div>');
    //                 redirect(base_url('ngadmin/about'));
    //             }
    //         }
    //     }
    // }
    public function edit($id)
    {
        $data['about'] = $this->db->where('id', $id)->get('about')->row();
        $this->load->view('back/ngadmin/about/edit_about', $data);
        if ($this->input->post('submit') == 'update'){
            $data = [
                'content'=> $this->input->post('content'),
            ];
                $update = $this->db->where('id', $id)->update('about', $data);
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>about berhasil diedit.</strong> </div>');
                            redirect(base_url('ngadmin/about'));
                        }
        }      
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        $hapus = $this->db->delete('about');
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data.</strong> </div>');
            redirect(site_url('ngadmin/about'), 'refresh');
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
