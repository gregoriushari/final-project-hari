<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\GPUModel;

class KriteriaGpuList extends BaseController
{
  function __construct () {
    $this->gpuModel = new GPUModel();
  }

  public function index(){
    $data['title'] = 'GPU Criteria List';
    $data['gpu'] = $this->gpuModel->getData('data');
    return view('admin/kriteria/admingpucriterialist', $data);
  }

  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'bobot' => 'required'
    ],[
        'name' => [
            'required' => 'Field GPU Name harus diisi',
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
      $this->gpuModel->insertData('insertData',$data);
      return redirect()->to('admin/gpu')->with('success','Data berhasil ditambahkan');
    }else{
      session()->setFlashdata('failed', $validation->listErrors());
      return redirect('admin/gpu')->withInput();
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'bobot'=>$this->request->getPost('bobot'),
      'id'=>$id
    ];
    if($this->gpuModel->updateData('updateData',$data)){
      return redirect()->to('admin/gpu')->with('success','Data berhasil diubah');
    }else{
      return redirect()->to('admin/gpu')->with('failed','Data gagal diubah');
    }
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->gpuModel->deleteData('deleteData',$data);
    return redirect()->to('admin/gpu')->with('success','Data berhasil dihapus');
  }
}
