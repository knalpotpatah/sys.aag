<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect(site_url('admin/login'), 'refresh');
        }
        $this->load->model('user_mod');
    }
    public function index()
    {
        $data['sales'] = $this->user_mod->sales_aktif();
        $this->load->view('sales/index', $data);
    }
    public function tambah()
    {
        $this->load->view('sales/tambah_sales');
        if ($this->input->post('submit') == 'tambah') {
            if (!empty($_FILES['photo']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('sales'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/images/user';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; //2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    $foto = $this->upload->data();
                    $data = [
                        'name_user' => $this->input->post('sales'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'status' => $this->input->post('status'),
						'date_created' => date('YmdHis'),
						'level' => 1,
                        'photo' => $nmfile,
                        'p_type' => $foto['file_ext'],
                    ];
                    $tambah = $this->db->insert('users', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Sales berhasil ditambah.</strong> </div>');
                        redirect(base_url('sales'));
                    }
                }
            } else {
                $data = [
                        'name_user' => $this->input->post('sales'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'status' => $this->input->post('status'),
						'date_created' => date('YmdHis'),
                        'level' => 1,
                        'photo' => 'default',
                        'p_type' => '.jpg',
                ];
                $tambah = $this->db->insert('users', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Sales berhasil ditambah.</strong> </div>');
                    redirect(base_url('sales'));
                }
            }
        }
    }

    public function edit($id)
    {
        $data['sales'] = $this->db->get_where('users', ['id' => $id])->row();
        $this->load->view('sales/edit_sales', $data);
        if ($this->input->post('submit') == 'update') {
            if (!empty($_FILES['photo']['name'])) {
                $nmfile = strtolower(url_title($this->input->post('team'))) . date('YmdHis');
                /* memanggil library upload ci */
                $config['upload_path']      = './assets/images/user';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; //2 MB
                $config['file_name']        = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                } else {
                    $foto = $this->upload->data();
                    $data = [
                        'name_user' => $this->input->post('sales'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
                        'phone' => $this->input->post('phone'),
                        'id_cabang' => $this->input->post('id_cabang'),
						// 'gender' => $this->input->post('gender'),
						// 'status' => $this->input->post('status'),
						'date_created' => date('YmdHis'),
                        'level' => 1,
                        'photo' => $nmfile,
                        'p_type' => $foto['file_ext'],
                    ];
                    $user = $this->db->get_where('users', ['id' => $id])->row();
                    $old_image = $user->photo . $user->p_type;
                    unlink(FCPATH . './assets/images/user/' . $old_image);
                    $this->db->where('id', $id);
                    $tambah = $this->db->update('users', $data);
                    if ($tambah) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Sales berhasil diubah.</strong> </div>');
                        redirect(base_url('sales'));
                    }
                }
            } else {
                $data = [
                        'name_user' => $this->input->post('sales'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
                        'phone' => $this->input->post('phone'),
                        'id_cabang' => $this->input->post('id_cabang'),
						// 'gender' => $this->input->post('gender'),
						// 'status' => $this->input->post('status'),
						'date_created' => date('YmdHis'),
                        'level' => 1,
                ];
                $this->db->where('id', $id);
                $tambah = $this->db->update('users', $data);
                if ($tambah) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Sales berhasil diubah.</strong> </div>');
                    redirect(base_url('sales'));
                }
            }
        }
    }
    public function hapus($id)
    {
        $user = $this->db->get_where('users', ['id' => $id])->row();
        $old_image = $user->photo . $user->p_type;
        $hapus1 = unlink(FCPATH . './asets/images/user/' . $old_image);
        $this->db->where('id', $id);
        $hapus = $this->db->delete('users');
        if ($hapus) {
            echo $hapus1;
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Sales berhasil dihapus.</strong> </div>');
            redirect(base_url('sales'));
        }
    }
}

/* End of file Testimoni.php */
