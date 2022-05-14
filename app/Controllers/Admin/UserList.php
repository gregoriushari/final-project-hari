<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;

class UserList extends BaseController{
  function __construct(){
    $this->adminModel = new AdminModel();
  }

  public function index(){
    $data['title'] = 'User List';
    $data['user'] = $this->adminModel->getData('data');
    return view('admin/adminuserlist', $data);
  }

  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[admin_ms.admin_email]|',
        'password' => 'required'
    ],[
        'name' => [
            'required' => 'Field Nama harus diisi',
        ],
        'email' => [
            'required' => 'Field Email harus diisi',
            'valid_email' => 'Field Email harus valid',
            'is_unique' => 'Email sudah terdaftar',
        ],
        'password' => [
            'required' => 'Field Password harus diisi',
        ],
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $data = [
        'name'=>$this->request->getPost('name'),
        'email'=>$this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'text'=>$this->request->getPost('password')
      ];
      $this->adminModel->insertData('insertData',$data);
      return redirect()->to('admin/user')->with('success','Data berhasil ditambahkan');
    }else{
      session()->setFlashdata('failed', $validation->listErrors());
      return redirect('admin/user')->withInput();
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('nameE'),
      'email'=>$this->request->getPost('emailE'),
      'id'=>$id
    ];
    if($this->adminModel->updateData('updateData',$data)){
      return redirect()->to('admin/user')->with('success','Data berhasil diubah');
    }else{
      return redirect()->to('admin/user')->with('failed','Data gagal diubah');
    }
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->adminModel->deleteData('deleteData',$data);
    return redirect()->to('admin/user')->with('success','Data berhasil dihapus');
  }
}
