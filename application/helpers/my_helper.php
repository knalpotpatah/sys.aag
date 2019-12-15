<?php



function is_logged_in()
{
    $anu = get_instance();
    if (!$anu->session->userdata('email')) {
        redirect('real_life/404');
    } else {
        $role_id = $anu->session->userdata('id_group');
        $menu = $anu->uri->segment(2);
        $queryMenu = $anu->db->get_where('category_menu', ['catmenu_name' => $menu])->row_array();
        $menu_id = $queryMenu['id_catmenu'];
        $userAccess = $anu->db->get_where('group_access_menu', [
            'id_group' => $role_id,
            'id_catmenu' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect(base_url('real_life/404'));
        }
    }
}
function check_access($role_id, $menu_id)
{
    $anu = get_instance();
    $anu->db->where('id_group', $role_id);
    $anu->db->where('id_catmenu', $menu_id);
    $result = $anu->db->get('group_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

if (!function_exists('bulan')) {
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('/', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
