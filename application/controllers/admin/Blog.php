<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model', 'bm');
    }

    public function index()
    {
        $data['blog'] = $this->bm->get_all();
        $this->load->view('back/ngadmin/blog/index', $data);
    }
    // Tambah Blog
    public function tambah_artikel()
    {
        $data['category'] = $this->bm->get_all_cat();
        $this->load->view('back/ngadmin/blog/tambah_artikel', $data);
        if ($this->input->post('submit') == 'terbit') {

            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('judul'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload/artikel';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; // 2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    //file gagal diupload -> kembali ke form tambah
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    // $blog = $this->db->get_where('services', ['id_service' => $id])->row();
                    $foto = $this->upload->data();
                    // $thumbnail = $config['file_name'];
                    // library yang disediakan codeigniter
                    $config['image_library']  = 'gd2';
                    // gambar yang akan dibuat thumbnail
                    $config['source_image']   = './assets/upload/artikel/' . $foto['file_name'] . '';
                    // membuat thumbnail
                    $config['create_thumb']   = TRUE;
                    // rasio resolusi
                    $config['maintain_ratio'] = FALSE;
                    // lebar
                    $config['width']          = 250;
                    // tinggi
                    $config['height']         = 250;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = [
                        'title_blog' => $this->input->post('judul'),
                        'content_blog' => $this->input->post('content'),
                        'title_blog' => $this->input->post('judul'),
                        'keyword_blog' => $this->input->post('keyword'),
                        'id_blogcat' => $this->input->post('kategori'),
                        'slug_blog' => strtolower(url_title($this->input->post('judul'))),
                        'created_blog' => time(),
                        'img_blog' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];

                    $tambah = $this->bm->tambah_artikel($data);
                    if ($tambah) {
                        redirect(site_url('ngadmin/blog'), 'refresh');
                    }
                }
            } else {
                $data = [
                    'title_blog' => $this->input->post('judul'),
                    'content_blog' => $this->input->post('content'),
                    'title_blog' => $this->input->post('judul'),
                    'keyword_blog' => $this->input->post('keyword'),
                    'id_blogcat' => $this->input->post('kategori'),
                    'slug_blog' => strtolower(url_title($this->input->post('judul'))),
                    'created_blog' => time()
                ];
                $tambah = $this->bm->tambah_artikel($data);
                if ($tambah) {
                    redirect(site_url('ngadmin/blog'), 'refresh');
                }
            }
        }
    }
    // Edit BLog
    public function edit_artikel($id)
    {
        $data['artikel'] = $this->bm->get_byId($id);
        $data['category'] = $this->bm->get_all_cat();
        $this->load->view('back/ngadmin/blog/edit_artikel', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['img']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('judul'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/upload/artikel/';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; // 2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img')) {
                    //file gagal diupload -> kembali ke form tambah
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    $blog = $this->db->get_where('blog_eth', ['id_blog' => $id])->row();
                    $foto = $this->upload->data();
                    // $thumbnail = $config['file_name'];
                    // library yang disediakan codeigniter
                    $config['image_library']  = 'gd2';
                    // gambar yang akan dibuat thumbnail
                    $config['source_image']   = './assets/upload/artikel/' . $foto['file_name'] . '';
                    // membuat thumbnail
                    $config['create_thumb']   = TRUE;
                    // rasio resolusi
                    $config['maintain_ratio'] = FALSE;
                    // lebar
                    $config['width']          = 718;
                    // tinggi
                    $config['height']         = 520;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = [
                        'title_blog' => $this->input->post('judul'),
                        'content_blog' => $this->input->post('content'),
                        'title_blog' => $this->input->post('judul'),
                        'keyword_blog' => $this->input->post('keyword'),
                        'id_blogcat' => $this->input->post('kategori'),
                        'slug_blog' => strtolower(url_title($this->input->post('judul'))),
                        'img_blog' => $nmfile,
                        'img_type' => $foto['file_ext'],
                    ];
                    $old_image = $blog->img_blog . $blog->img_type;
                    $old_image_thumb = $blog->img_blog . '_thumb' . $blog->img_type;
                    $hapus1 = unlink(FCPATH . './assets/upload/artikel/' . $old_image);
                    $hapus2 = unlink(FCPATH . './assets/upload/artikel/' . $old_image_thumb);

                    $update = $this->db->where('id_blog', $id)->update('blog_eth', $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Layanan berhasil diedit.</strong> </div>');
                        redirect(base_url('ngadmin/blog'));
                    }
                }
            } else {
                $data = [
                    'title_blog' => $this->input->post('judul'),
                    'content_blog' => $this->input->post('content'),
                    'title_blog' => $this->input->post('judul'),
                    'keyword_blog' => $this->input->post('keyword'),
                    'id_blogcat' => $this->input->post('kategori'),
                    'slug_blog' => strtolower(url_title($this->input->post('judul'))),
                ];
                $update = $this->db->where('id_blog', $id)->update('blog_eth', $data);
                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Layanan berhasil diedit.</strong> </div>');
                    redirect(base_url('ngadmin/blog'));
                }
            }
        }
    }
    // Hapus Blog
    public function hapus_artikel($id)
    {
        $blog = $this->db->get_where('blog_eth', ['id_blog' => $id])->row_array();
        $old_image = $blog['img_blog'] . $blog['img_type'];
        $old_image_thumb = $blog['img_blog'] . '_thumb' . $blog['img_type'];
        // $hapus1 = unlink(FCPATH . './assets/upload/artikel' . $old_image);
        // $hapus2 = unlink(FCPATH . './assets/upload/artikel' . $old_image_thumb);
        $hapus = $this->bm->hapus_artikel($id);
        if ($hapus) {
            unlink(FCPATH . './assets/upload/artikel/' . $old_image);
            unlink(FCPATH . './assets/upload/artikel/' . $old_image_thumb);
            redirect(site_url('ngadmin/blog'), 'refresh');
        }
    }
    // Kategori Blog
    public function kategori()
    {
        $data['kategori'] = $this->bm->get_all_cat();
        $this->load->view('back/ngadmin/blog/kategori_blog', $data);
        if ($this->input->post('submit') == 'update') {
            $data = ['category' => $this->input->post('category')];
            $id = $this->input->post('id');
            $update = $this->bm->edit_kategori($id, $data);
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Kategori berhasil diedit.</strong> </div>');
                redirect(base_url('ngadmin/blog/kategori'));
            }
        }
    }
    public function tambah_kategori()
    {
        $data = ['category' => $this->input->post('category')];
        $this->bm->tambah_kategori($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Kategori berhasil diedit.</strong> </div>');
        redirect(base_url('ngadmin/blog/kategori'));
    }
    public function hapus_kategori($id)
    {
        $hapus = $this->bm->hapus_kategori($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Kategori berhasil dihapus.</strong> </div>');
            redirect(base_url('ngadmin/blog/kategori'));
        }
    }
}

/* End of file Blog.php */
