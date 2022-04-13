<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\LaptopModel;
use App\Models\Admin\Kriteria\RAMModel;
use App\Models\Admin\Kriteria\GPUModel;
use App\Models\Admin\Kriteria\HargaModel;
use App\Models\Admin\Kriteria\ProcessorModel;
use App\Models\Admin\Kriteria\MemoriModel;

class LaptopList extends BaseController
{
  function __construct(){
    $this->laptopModel = new LaptopModel();
    $this->ramModel = new RAMModel();
    $this->gpuModel = new GPUModel();
    $this->hargaModel = new HargaModel();
    $this->processorModel = new ProcessorModel();
    $this->memoriModel = new MemoriModel();
  }

  public function index(){
    $data['title'] = 'Laptop List';
    $data['laptop'] = $this->laptopModel->getData('data');
    $data['ram'] = $this->ramModel->getData('data');
    $data['gpu'] = $this->gpuModel->getData('data');
    $data['harga'] = $this->hargaModel->getData('data');
    $data['processor'] = $this->processorModel->getData('data');
    $data['memori'] = $this->memoriModel->getData('data');
    return view('admin/adminlaptoplist', $data);
  }

  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'price' => 'required',
        'harga' => 'required',
        'ram' => 'required',
        'gpu' => 'required',
        'processor' => 'required',
        'memori' => 'required'
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $data = [
        'name'=>$this->request->getPost('name'),
        'price'=>$this->request->getPost('price'),
        'harga'=>$this->request->getPost('harga'),
        'ram'=>$this->request->getPost('ram'),
        'gpu'=>$this->request->getPost('gpu'),
        'processor'=>$this->request->getPost('processor'),
        'memori'=>$this->request->getPost('memori')
      ];
      
      $this->laptopModel->insertData('insertData',$data);
      return redirect()->to('admin/laptop')->with('success','Data berhasil ditambahkan');
    }
  }
  
  public function editData($id){
    $data = [
      'name'=>$this->request->getPost('name'),
      'price'=>$this->request->getPost('price'),
      'harga'=>$this->request->getPost('harga'),
      'ram'=>$this->request->getPost('ram'),
      'gpu'=>$this->request->getPost('gpu'),
      'processor'=>$this->request->getPost('processor'),
      'memori'=>$this->request->getPost('memori'),
      'id'=>$id
    ];
    $this->laptopModel->updateData('updateData',$data);
    return redirect()->to('admin/laptop')->with('success','Data berhasil diubah');
  }

  public function deleteData($id){
    $data['id'] = $id;
    $this->laptopModel->deleteData('deleteData',$data);
    return redirect()->to('admin/laptop')->with('success','Data berhasil dihapus');
  }
  
}
