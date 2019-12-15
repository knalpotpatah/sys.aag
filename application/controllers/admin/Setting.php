<?php

defined('BASEPATH') or exit('No direct script access allowed');

class setting extends CI_Controller
{
    


    public function index()
    {
        $data['setting'] = $this->db->get('setting')->result();
        $this->load->view('back/admin/setting/index', $data);
    }
  public function tambah()
    {
        $this->load->view('back/admin/setting/tambah_setting');
        if ($this->input->post('submit')) {
            // if (!empty($_FILES['img']['name'])) {
            //     /* memanggil library upload ci */
            //     $config['upload_path']      = './img/blog/';
            //     $config['allowed_types']    = 'jpg|jpeg|png|gif';
            //     $config['max_size']         = '2048'; //2 MB
            //     $config['file_name']        = $nmfile; //nama yang terupload nantinya
            //     $this->load->library('upload', $config);
            //     if (!$this->upload->do_upload('img')) {
                 
            //         $foto = $this->upload->data();
            //         $data = [
            //             'nama' => $this->input->post('nama'),
			// 			'tgl' => $this->input->post('tgl'),
			// 			'ket' => $this->input->post('ket'),
            //             'img' => $nmfile,
            //             'img_type' => $foto['file_ext'],
            //         ];
            //         $tambah = $this->db->insert('news', $data);
            //         if ($tambah) {
            //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Client berhasil ditambah.</strong> </div>');
            //             redirect(base_url('admin/news'));
            //         }
            //     }
            // } else {
                $data = [
						'alamat' => $this->input->post('alamat'),
						'no_hp' => $this->input->post('no_hp'),
						'email' => $this->input->post('email'),
						
                ];
                $tambah = $this->db->insert('news', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Setting berhasil ditambah.</strong> </div>');
                    redirect(base_url('admin/setting'));
                }
            // }
        }
    }
    public function edit($id)
    {
        $data['setting'] = $this->db->get_where('setting', ['id' => $id])->row();
        $this->load->view('back/admin/setting/edit_setting', $data);
        if ($this->input->post('submit')) {
            // if (!empty($_FILES['img']['name'])) {
            //     $nmfile = strtolower(url_title($this->input->post('nama'))) . date('YmdHis');
            //     /* memanggil library upload ci */
            //     $config['upload_path']      = './img/blog/';
            //     $config['allowed_types']    = 'jpg|jpeg|png|gif';
            //     $config['max_size']         = '2048'; //2 MB
            //     $config['file_name']        = $nmfile; //nama yang terupload nantinya
            //     $this->load->library('upload', $config);
            //     if (!$this->upload->do_upload('img')) {
            //         $error = array('error' => $this->upload->display_errors());
            //         echo $error['error'];
            //     } else {
            //         $foto = $this->upload->data();
            //         $data = [
            //             'nama' => $this->input->post('nama'),
            //             'tgl' => $this->input->post('tgl'),
            //             'ket' => $this->input->post('ket'),
            //             'img' => $nmfile,
            //             'img_type' => $foto['file_ext'],
            //         ];
            //         $news = $this->db->get_where('news', ['id' => $id])->row();
            //         $old_image = $news->img . $news->img_type;
            //         unlink(FCPATH . './img/blog/' . $old_image);
            //         $this->db->where('id', $id);
            //         $tambah = $this->db->update('news', $data);
            //         if ($tambah) {
            //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>slider berhasil diubah.</strong> </div>');
            //             redirect(base_url('admin/news'));
            //         }
            //     }
            // } else {
                $data = [
					    'alamat' => $this->input->post('alamat'),
						'no_hp' => $this->input->post('no_hp'),
						'email' => $this->input->post('email'),
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('setting', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>setting berhasil diubah.</strong> </div>');
                    redirect(base_url('admin/setting'));
                }
            // }
        }
    }
public function hapus($id)
    {
        $news = $this->db->get_where('setting', ['id' => $id])->row();
        $old_image = $news->img . $news->img_type;
        $hapus1 = unlink(FCPATH . './img/blog/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('news');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>news berhasil dihapus.</strong> </div>');
            redirect(base_url('admin/news'));
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
