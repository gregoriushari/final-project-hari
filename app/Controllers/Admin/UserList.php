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
      $data['validation'] = $this->validator;
      return redirect()->to('admin/user')->with('error','Email Sudah Terdaftar');
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'email'=>$this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'text'=>$this->request->getPost('password'),
      'id'=>$id
    ];
    $this->adminModel->updateData('updateData',$data);
    return redirect()->to('admin/user')->with('success','Data berhasil diubah');
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->adminModel->deleteData('deleteData',$data);
    return redirect()->to('admin/user')->with('success','Data berhasil dihapus');
  }
}
