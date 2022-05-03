<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\HargaModel;

class KriteriaHargaList extends BaseController
{
  function __construct () {
    $this->hargaModel = new HargaModel();
  }

  public function index(){
    $data['title'] = 'Price Criteria List';
    $data['harga'] = $this->hargaModel->getData('data');
    return view('admin/kriteria/adminhargacriterialist', $data);
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
      
      $this->hargaModel->insertData('insertData',$data);
      return redirect()->to('admin/harga')->with('success','Data berhasil ditambahkan');
    }else{
      return redirect()->to('admin/harga')->with('failed','Data berhasil ditambahkan');
    }
  }

  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'bobot'=>$this->request->getPost('bobot'),
      'id'=>$id
    ];
    $this->hargaModel->updateData('updateData',$data);
    return redirect()->to('admin/harga')->with('success','Data berhasil diubah');
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->hargaModel->deleteData('deleteData',$data);
    return redirect()->to('admin/harga')->with('success','Data berhasil dihapus');
  }
}
