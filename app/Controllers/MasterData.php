<?php

namespace App\Controllers;

use App\Models\M_COA;

class MasterData extends BaseController
{

  protected $coa;

  public function __construct()
  {
    $this->coa = new M_COA();
  }

  public function COA()
  {
    $data['coa'] = $this->coa->getCOA();
    return view('masterdata/v_coa', $data);
  }

  public function simpanCOA()
  {
    if (!$this->validate([
      'kode_coa'    => ['rules' => 'required'],
      'nama_coa'    => ['rules' => 'required'],
      'header_coa'  => ['rules' => 'required']
    ])) {
      session()->setFlashdata('error', 'Harap lengkapi seluruh field');
      return redirect()->back()->withInput();
    } else {
      $kode_coa   = $this->request->getPost('kode_coa');
      $nama_coa   = $this->request->getPost('nama_coa');
      $header_coa = $this->request->getPost('header_coa');
      $cek_coa    = $this->coa->checkKodeCOA($kode_coa);
      if ($cek_coa) {
        session()->setFlashdata('error', "Kode COA {$kode_coa} sudah digunakan");
        return redirect()->back()->withInput();
      } else {
        $input      = [
          'kode_coa'    => $kode_coa,
          'nama_coa'    => $nama_coa,
          'header_coa'  => $header_coa
        ];
        $this->coa->insert($input);
        session()->setFlashdata('success', 'Data COA sukses ditambahkan');
        return redirect()->back();
      }
    }
  }
}
