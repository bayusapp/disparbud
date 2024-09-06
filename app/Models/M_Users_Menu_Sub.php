<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users_Menu_Sub extends Model
{

  protected $table = 'users_menu_sub';
  protected $primaryKey = 'id_menu_sub';
  protected $allowedFields = ['nama_menu', 'url_menu', 'urutan_menu', 'is_active', 'id_menu', 'id_role'];

  public function getSubMenuByIdMenu($id_menu)
  {
    $this->where('id_menu', $id_menu);
    return $this->findAll();
  }

  public function getSubMenuByURL($url)
  {
    $this->where('url_menu', $url);
    return $this->first();
  }
}
