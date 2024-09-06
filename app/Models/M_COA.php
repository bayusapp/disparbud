<?php

namespace App\Models;

use CodeIgniter\Model;

class M_COA extends Model
{

  protected $table = 'coa';
  protected $primaryKey = 'kode_coa';
  protected $allowedFields = ['kode_coa', 'nama_coa', 'header_coa'];

  public function getCOA()
  {
    return $this->findAll();
  }

  public function checkKodeCOA($kode_coa)
  {
    $this->where('kode_coa', $kode_coa);
    return $this->first();
  }
}
