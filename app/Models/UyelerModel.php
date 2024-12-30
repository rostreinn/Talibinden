<?php

namespace App\Models;

use CodeIgniter\Model;

class UyelerModel extends Model
{
    protected $table = 'uyeler';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kullaniciadi', 'email', 'password', 'user_role', 'created_at', 'updated_at', 'profile_photo'];
    protected $useTimestamps = true;

    public function getUserById(int $userId)
    {
        return $this->where('id', $userId)->first();
    }

    public function updateProfile(int $userId, array $data)
    {
        return $this->update($userId, $data);
    }
}
