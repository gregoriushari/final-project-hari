<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\ProcessorModel;

class KriteriaProcessorList extends BaseController
{
  function __construct () {
    $this->processorModel = new ProcessorModel();
  }
  public function index(){
    $data['title'] = 'Processor Criteria List';
    $data['processor'] = $this->processorModel->getData('data');
    return view('admin/kriteria/adminprocessorcriterialist', $data);
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
      
      $this->processorModel->insertData('insertData',$data);
      return redirect()->to('admin/processor')->with('success','Data berhasil ditambahkan');
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'bobot'=>$this->request->getPost('bobot'),
      'id'=>$id
    ];
    $this->processorModel->updateData('updateData',$data);
    return redirect()->to('admin/processor')->with('success','Data berhasil diubah');
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->processorModel->deleteData('deleteData',$data);
    return redirect()->to('admin/processor')->with('success','Data berhasil dihapus');
  }
}
