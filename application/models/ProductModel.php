<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "product";

    public function getpro($id = false)
    {
        if ($id === false) {
            $this->join('groups', 'groups.id_group = product.product_group', 'LEFT');
            $this->select('groups.group_name');
            $this->select('product.*');
            $result = $this->findAll();


            return $result;
        } else {
            return $this->getWhere(['id_product' => $id]);
        }
        // return $this->table('users')->get()->getResultArray();
    }

    public function getGroup($id = false)
    {
        if ($id === false) {
            $this->select('*');
            $this->from('groups');
            $result = $this->findAll();


            return $result;
        } else {
            return $this->getWhere(['id_group' => $id]);
        }
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
