<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users'; // Replace 'users' with your actual table name
    protected $primaryKey = 'user_id'; // Replace 'id' with the primary key of your users table
    protected $allowedFields = ['nip', 'password']; // Add other fields as necessary

    // Method to check if the user exists
    public function getUserByNIP($nip)
    {
        return $this->asArray()
            ->where(['nip' => $nip])
            ->first();
    }
}
