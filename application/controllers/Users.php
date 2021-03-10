<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('UserModel');
    }

    // READ
    function index()
    {
        $data['users'] = $this->db->get('users')->result();
        $this->load->view('users/index', $data);
    }

    public function dashboard()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

    //CREATE
    function create()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // if ($this->input->post('submit')) {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        $this->db->insert('users', $data);
        // redirect('users');
        // }
        // redirect('product');
        echo json_encode([
            "status" => true,
            "message" => "Sukses tambahkan data"
        ]);
    }

    function get_product_by_package()
    {
        $package_id = $this->input->post('package_id');
        $data = $this->package_model->get_product_by_package($package_id)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->product_id;
        }
        echo json_encode($value);
    }

    //UPDATE
    function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name_edit');
        $email = $this->input->post('email_edit');
        $password = $this->input->post('password_edit');

  
            if (!$this->input->post('password_edit')) {
                $data = [
                    'name' => $name,
                    'email' => $email,
                ];
                $this->db->where('id_user', $id)->update('users', $data);
            } else {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' =>password_hash($password,PASSWORD_DEFAULT),
                ];
                $this->db->where('id_user', $id)->update('users', $data);
            }
            echo json_encode(["message" => "Berhasil Mengupdate Users", "status" => true]);
    
        // redirect('product');
    }

    // DELETE
    public function delete($id)
    {
        // $id = $this->input->post('delete_id', TRUE);
        $this->db->where('id_user', $id)->delete('users');
        redirect('users');
    }
}
