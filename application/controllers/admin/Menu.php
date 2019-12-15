<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'mm');

        is_logged_in();
    }

    public function index()
    {

        $data = [
            'katmenu' => $this->mm->menuKategori(),
            'usermenu' => $this->mm->userMenu(),
            'usersubmenu' => $this->mm->usersubMenu()
        ];

        $this->load->view('back/ngadmin/menu/index', $data);
    }

    public function tambahmk()
    {
        $data = [
            'catmenu_name' => $this->input->post('catname'),
            'catmenu_active' => 1
        ];
        $tmbhmk = $this->mm->tambahmk($data);
        if ($tmbhmk) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menambah Data.</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }

    public function editmk($id)
    {
        $data = [
            'catmenu_name' => $this->input->post('catname'),
        ];
        $edit = $this->mm->editmk($id, $data);
        if ($edit) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Mengedit Data.</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }

    public function hapusmk($id)
    {
        $hapusmk = $this->mm->hapusmk($id);
        if ($hapusmk) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }

    public function tambahm()
    {
        $data = [
            'usermenu_name' => $this->input->post('menuname'),
            'usermenu_icon' => $this->input->post('icon'),
            'id_catmenu' => $this->input->post('catmenu'),
            'usermenu_active' => 1

        ];
        $tmbhm = $this->mm->tambahm($data);
        if ($tmbhm) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menambah Data.</strong> </div>');

            redirect(base_url('ngadmin/menu'));
        }
    }

    public function editm($id)
    {
        $data = [
            'usermenu_name' => $this->input->post('menuname'),
            'usermenu_icon' => $this->input->post('icon'),
            'id_catmenu' => $this->input->post('catmenu'),
        ];
        $edit = $this->mm->editm($id, $data);
        if ($edit) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Mengedit Data.</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }

    public function hapusm($id)
    {
        $hapusmk = $this->mm->hapusm($id);
        if ($hapusmk) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }

    public function tambahsm()
    {
        $data = [
            'submenu_title' => $this->input->post('submenuname'),
            'id_usermenu' => $this->input->post('menu'),
            'url' => strtolower($this->input->post('url')),
            'submenu_active' => 1

        ];
        $tmbhm = $this->mm->tambahsm($data);
        if ($tmbhm) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menambah Data.</strong> </div>');

            redirect(base_url('ngadmin/menu'));
        }
    }

    public function editsm($id)
    {
        $data = [
            'submenu_title' => $this->input->post('submenuname'),
            'id_usermenu' => $this->input->post('menu'),
            'url' => strtolower($this->input->post('url')),
        ];
        // $this->mm->tambahmk($id);
        $edit = $this->mm->editsm($id, $data);
        if ($edit) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Mengedit Data.</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        } else {
            echo "gagal";
        }
    }

    public function hapussm($id)
    {
        $hapusmk = $this->mm->hapussm($id);
        if ($hapusmk) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong>Berhasil Menghapus Data</strong> </div>');
            redirect(base_url('ngadmin/menu'));
        }
    }
}



/* End of file Menu.php */
