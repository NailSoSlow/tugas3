<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $allowedFields = ['username', 'password'];

    // public function search($username)
    // {
    //     $builder = $this->table('users');
    //     return $builder->where('username', $username);
    // }
}
