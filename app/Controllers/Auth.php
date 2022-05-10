<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;

class Auth extends BaseController
{
    function __construct(){
      $this->adminModel = new AdminModel();
    }

    public function index(){
      return view('admin/Login');
    }

    public function login(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $dataUser = $this->adminModel->getData('detailUsernameData',['email'=>$email]);
        if ($dataUser) {
            if (password_verify($password, $dataUser['admin_password'])) {
                session()->set([
                    'email' => $dataUser['admin_email'],
                    'name' => $dataUser['admin_name'],
                    'isLogin' => TRUE
                ]);
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username / Password Salah');
            return redirect()->back();
        }
    }

    public function logout(){
      session()->destroy();
      return redirect()->to('/');
    }
}
