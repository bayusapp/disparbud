<?php

namespace App\Controllers;

use App\Models\M_Users;

class Auth extends BaseController
{

  protected $users;

  public function __construct()
  {
    $this->users = new M_Users();
  }

  public function index()
  {
    if (session()->get('login') == 'login') {
      header('Location: ' . base_url('Dashboard'));
      die();
    } else {
      return view('auth/v_login');
    }
  }

  public function login()
  {
    if (!$this->validate([
      'username' => ['rules' => 'required'],
      'password' => ['rules' => 'required']
    ])) {
      echo 'hayo';
    } else {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $cek_user = $this->users->getUser($username);
      if ($cek_user) {
        $password_hash = $cek_user['password'];
        if (password_verify($password, $password_hash)) {
          session()->set('login', 'login');
          session()->set('username', $username);
          session()->set('role', $cek_user['id_role']);
          return redirect()->to('Dashboard');
        } else {
          session()->setFlashdata('error', 'Password tidak valid');
          return redirect()->back()->withInput();
        }
      }
    }
  }
}
