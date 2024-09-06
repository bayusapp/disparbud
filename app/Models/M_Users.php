<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users extends Model
{

  protected $table = 'users';
  protected $primaryKey = 'username';
  protected $allowedFields = ['username', 'password', 'nama_user'];

  public function getUser($username)
  {
    $this->where('username', $username);
    return $this->first();
  }
}
