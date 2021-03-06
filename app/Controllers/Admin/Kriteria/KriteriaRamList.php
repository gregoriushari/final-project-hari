<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\RAMModel;

class KriteriaRamList extends BaseController{
  function __construct () {
    $this->ramModel = new RAMModel();
  }

  public function index(){
    $data['title'] = 'RAM Criteria List';
    $data['ram'] = $this->ramModel->getData('data');
    return view('Admin/Kriteria/AdminRamCriteriaList', $data);
  }


  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'bobot' => 'required'
    ],[
        'name' => [
            'required' => 'Field RAM Storage harus diisi',
        ],
        'bobot' => [
            'required' => 'Field Bobot harus diisi',
        ],
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $data = [
        'name'=>$this->request->getPost('name'),
        'bobot'=>$this->request->getPost('bobot'),
      ];
      
      $this->ramModel->insertData('insertData',$data);
      return redirect()->to('admin/ram')->with('success','Data berhasil ditambahkan');
    }else{
      session()->setFlashdata('failed', $validation->listErrors());
      return redirect('admin/ram')->withInput();
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'bobot'=>$this->request->getPost('bobot'),
      'id'=>$id
    ];
    if($this->ramModel->updateData('updateData',$data)){
      return redirect()->to('admin/ram')->with('success','Data berhasil diubah');
    }else{
      return redirect()->to('admin/ram')->with('failed','Data gagal diubah');
    }
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->ramModel->deleteData('deleteData',$data);
    return redirect()->to('admin/ram')->with('success','Data berhasil dihapus');
  }
}

