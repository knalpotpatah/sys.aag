<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chart_mod extends CI_model
{

    public function all()
    {
        return $this->getWhere(['id_user' => $id]);
        // return $this->table('users')->get()->getResultArray();
    }

    public function getUserOne($id = false)
    {
        if ($id === false) {
            return "";
        } else {
            return $this->getWhere(['id_user' => $id])->getRow();
        }
    }

    public function saveBarang($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editBarang($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user', $id);
        return $builder->update($data);
    }

    public function hapusBarang($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_user' => $id]);
    }
}
