<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_pelang');
    }

    public function index()
    {
        $data['pelanggan'] = $this->data_pelang->all();
        $this->load->view('pelanggan/index', $data);
    }

    public function kontrak()
    {
        $data['kontrak'] = $this->data_pelang->kontrak();
        $this->load->view('pelanggan/kontrak', $data);
    }

    public function job()
    {
        $data['job'] = $this->data_pelang->job();
        $this->load->view('pelanggan/job', $data);
    }

    public function data_terminate()
    {
        $data['terminate'] = $this->data_pelang->terminate();
        $this->load->view('pelanggan/terminate', $data);
    }

    public function tambah()
    {

        $this->load->view('pelanggan/tambah_pelanggan');
        if ($this->input->post('submit') == 'update') {
            $email = $this->session->userdata('email');
            $user = $this->db->get_where('users', array('email' => $email))->row(); 
            $data = [
                        'id_user' => $user->id,
                        'id_kerjasama' => $this->input->post('id_kerjasama'),
                        'id_pelanggan' => $this->input->post('id_pelanggan'),
                        'no_kontrak' => $this->input->post('no_kontrak'),
                        'nama_pic' => $this->input->post('nama_pic'),
                        'name' => $this->input->post('name'),
                        'name_pt' => $this->input->post('name_pt'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'id_cabang' => $this->input->post('id_cabang'),
                        'npwp' => $this->input->post('npwp'),
                        'alamat_npwp' => $this->input->post('alamat_npwp'),
                        'nama_npwp' => $this->input->post('nama_npwp'),
                        'alamat' => $this->input->post('alamat'),
                        'alamat_penagihan' => $this->input->post('alamat_penagihan'),
                        'id_pekerjaan' => $this->input->post('id_pekerjaan'),
                        'jenis_kunjungan' => $this->input->post('jenis_kunjungan'),
                        'ket_kunjungan' => $this->input->post('ket_kunjungan'),
                        'periode_kontrak' => $this->input->post('periode_kontrak'),
                        'awal_kontrak' => $this->input->post('awal_kontrak'),
                        'akhir_kontrak' => $this->input->post('akhir_kontrak'),
                        'nilai_kontrak' => $this->input->post('nilai_kontrak'),
                        'id_sumber' => $this->input->post('id_sumber'),
                        'terminate' => 0,
                    ];

                    $tambah = $this->db->insert('data_pelanggan', $data);

                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Pelanngan berhasil ditambah.</strong> </div>');
                        redirect(base_url('pelanggan'));
                    }
                }
           
        }

    function detail($id) 
    {
        $data['detail'] = $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $this->load->view('pelanggan/detail', $data);

    }   
    function detail_terminate($id) 
    {
        $data['detail'] = $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $this->load->view('pelanggan/detail_terminate', $data);

    }   

    function terminate($id)
    {
        $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $data = [
            'terminate' => 1,
        ];
        $update = $this->db->where('id_pe', $id)->update('data_pelanggan', $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Pelanggan berhasil di Terminasi.</strong> </div>');
                        redirect(base_url('pelanggan'));
                    }
    }

    function increase($id)
    {
        $data['increase'] = $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $this->load->view('pelanggan/increase', $data);
        if ($this->input->post('submit') == 'update'){
            $data = [
                'increase' => $this->input->post('increase'),
                'decrease' => 0,
            ];
            $update = $this->db->where('id_pe', $id)->update('data_pelanggan', $data);
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Data Pelanggan berhasil di Increase.</strong> </div>');
                            redirect(base_url('pelanggan'));
                        }
    }
    }

    function decrease($id)
    {
        $data['decrease'] = $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $this->load->view('pelanggan/decrease', $data);
        if ($this->input->post('submit') == 'update'){
            $data = [
                'decrease' => $this->input->post('decrease'),
                'increase' => 0,
            ];
            $update = $this->db->where('id_pe', $id)->update('data_pelanggan', $data);
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Data Pelanggan berhasil di Decrease.</strong> </div>');
                            redirect(base_url('pelanggan'));
                        }
    }
    }

    public function data_inc()
    {
        $data['data_inc'] = $this->data_pelang->increase();
        $this->load->view('pelanggan/data_increase', $data);
    }

    public function data_dec()
    {
        $data['data_dec'] = $this->data_pelang->decrease();
        $this->load->view('pelanggan/data_decrease', $data);
    }

    function drop($id)
    {
        $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
        $data = [
            'terminate' => 0,
        ];
        $update = $this->db->where('id_pe', $id)->update('data_pelanggan', $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Pelanggan berhasil di drop to Client.</strong> </div>');
                        redirect(base_url('pelanggan'));
                    }
    }

    function edit($id) 
{   
    $data['pelanggan'] = $this->db->where('id_pe', $id)->get('data_pelanggan')->row();
    $this->load->view('pelanggan/edit_pelanggan', $data);

if ($this->input->post('submit') == 'update'){
    
            $data = [
                'id_kerjasama' => $this->input->post('id_kerjasama'),
                        'id_pelanggan' => $this->input->post('id_pelanggan'),
                        'no_kontrak' => $this->input->post('no_kontrak'),
                        'nama_pic' => $this->input->post('nama_pic'),
                        'name' => $this->input->post('name'),
                        'name_pt' => $this->input->post('name_pt'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'id_cabang' => $this->input->post('id_cabang'),
                        'npwp' => $this->input->post('npwp'),
                        'alamat_npwp' => $this->input->post('alamat_npwp'),
                        'nama_npwp' => $this->input->post('nama_npwp'),
                        'alamat' => $this->input->post('alamat'),
                        'alamat_penagihan' => $this->input->post('alamat_penagihan'),
                        'id_pekerjaan' => $this->input->post('id_pekerjaan'),
                        'jenis_kunjungan' => $this->input->post('jenis_kunjungan'),
                        'ket_kunjungan' => $this->input->post('ket_kunjungan'),
                        'periode_kontrak' => $this->input->post('periode_kontrak'),
                        'awal_kontrak' => $this->input->post('awal_kontrak'),
                        'akhir_kontrak' => $this->input->post('akhir_kontrak'),
                        'nilai_kontrak' => $this->input->post('nilai_kontrak'),
                        'id_sumber' => $this->input->post('id_sumber'),
                        'terminate' => 0,
            ];
           
            $update = $this->db->where('id_pe', $id)->update('data_pelanggan', $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Pelanggan berhasil diedit.</strong> </div>');
                        redirect(base_url('pelanggan'));
                    }
                
}  
}

    public function hapus($id)
    {
      
        $this->db->where('id_pe', $id);
        $hapus = $this->db->delete('data_pelanggan');
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Pelanggan berhasil dihapus.</strong> </div>');
            redirect(base_url('pelanggan'));
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