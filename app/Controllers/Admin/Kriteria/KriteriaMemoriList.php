<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\MemoriModel;

class KriteriaMemoriList extends BaseController
{
  function __construct () {
    $this->memoriModel = new MemoriModel();
  }
  
  public function index(){
    $data['title'] = 'Memory Criteria List';
    $data['memori'] = $this->memoriModel->getData('data');
    return view('admin/kriteria/adminmemoricriterialist', $data);
  }

  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'bobot' => 'required'
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $data = [
        'name'=>$this->request->getPost('name'),
        'bobot'=>$this->request->getPost('bobot'),
      ];
      
      $this->memoriModel->insertData('insertData',$data);
      return redirect()->to('admin/memori')->with('success','Data berhasil ditambahkan');
    }else{
      return redirect()->to('admin/memori')->with('failed','Data tidak bisa ditambahkan');
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'bobot'=>$this->request->getPost('bobot'),
      'id'=>$id
    ];
    $this->memoriModel->updateData('updateData',$data);
    return redirect()->to('admin/memori')->with('success','Data berhasil diubah');
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->memoriModel->deleteData('deleteData',$data);
    return redirect()->to('admin/memori')->with('success','Data berhasil dihapus');
  }
}
