<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'permissions'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function create($data)
    {
        return $this->insert($data);
    }

    public function updateRole($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRole($id)
    {
        return $this->delete($id);
    }
}
