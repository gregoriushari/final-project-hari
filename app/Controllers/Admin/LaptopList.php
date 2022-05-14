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

  public function viewAddData(){
    $data['title'] = 'Add Data Laptop';
    $data['ram'] = $this->ramModel->getData('data');
    $data['gpu'] = $this->gpuModel->getData('data');
    $data['harga'] = $this->hargaModel->getData('data');
    $data['processor'] = $this->processorModel->getData('data');
    $data['memori'] = $this->memoriModel->getData('data');
    return view('admin/AdminAddLaptop', $data);
  }

  public function addData(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'price' => 'required',
        'priceRange' => 'required',
        'ram' => 'required',
        'gpu' => 'required',
        'processor' => 'required',
        'memori' => 'required',
        'image'=>'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
    ],[
      'name'=>[
        'required'=>'Field Nama harus diisi'
      ],
      'price'=>[
        'required'=>'Field Harga harus diisi'
      ],
      'priceRange' => [
        'required' => 'Field Price Range harus diisi',
      ],
      'ram' => [
        'required' => 'Field RAM harus diisi',
      ],
      'gpu' => [
        'required' => 'Field GPU harus diisi',
      ],
      'processor' => [
        'required' => 'Field Processor harus diisi',
      ],
      'memori' => [
        'required' => 'Field Memori harus diisi',
      ],
      'image'=>[
        'max_size'=>'File gambar terlalu besar',
        'is_image'=>'File yang diupload bukan gambar',
        'mime_in'=>'File gambar harus jpg,jpeg,png'
      ]
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $fileImage = $this->request->getFile('image');
      if($fileImage->getError()==4){
        $namaImage='default.jpg';
      }else{
        $namaImage = $fileImage->getRandomName();
        $fileImage->move('img', $namaImage);
      }
      
      $data = [
        'name'=>$this->request->getPost('name'),
        'price'=>$this->request->getPost('price'),
        'harga'=>$this->request->getPost('harga'),
        'ram'=>$this->request->getPost('ram'),
        'gpu'=>$this->request->getPost('gpu'),
        'processor'=>$this->request->getPost('processor'),
        'memori'=>$this->request->getPost('memori'),
        'image'=>$namaImage
      ];
      
      $this->laptopModel->insertData('insertData',$data);
      return redirect()->to('admin/laptop')->with('success','Data berhasil ditambahkan');
    }else{
      session()->setFlashdata('error', $validation->listErrors());
      return redirect('admin/laptop/adddetail')->withInput();
    }
  }

  public function viewEditData($id){
    $data['title'] = 'Edit Data Laptop';
    $data['id']=$id;
    $data['laptop'] =$this->laptopModel->getData('findById', $data);
    $data['ram'] = $this->ramModel->getData('data');
    $data['gpu'] = $this->gpuModel->getData('data');
    $data['harga'] = $this->hargaModel->getData('data');
    $data['processor'] = $this->processorModel->getData('data');
    $data['memori'] = $this->memoriModel->getData('data');
    return view('admin/AdminEditLaptop', $data);
  }
  
  public function editData($id){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'price' => 'required',
        'harga' => 'required',
        'ram' => 'required',
        'gpu' => 'required',
        'processor' => 'required',
        'memori' => 'required',
        'image'=>'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    if($isDataValid){
      $fileImage = $this->request->getFile('image');
      if($fileImage->getError()==4){
        $namaImage=$this->request->getVar('imageLama');
      }else{
        $namaImage = $fileImage->getRandomName();
        $fileImage->move('img', $namaImage);
        if ($this->request->getVar('imageLama') != 'default.jpg') {
          unlink('img/' . $this->request->getVar('imageLama'));
        }
      }
      $data = [
        'name'=>$this->request->getPost('name'),
        'price'=>$this->request->getPost('price'),
        'harga'=>$this->request->getPost('harga'),
        'ram'=>$this->request->getPost('ram'),
        'gpu'=>$this->request->getPost('gpu'),
        'processor'=>$this->request->getPost('processor'),
        'memori'=>$this->request->getPost('memori'),
        'id'=>$id,
        'image'=>$namaImage
      ];
      $this->laptopModel->updateData('updateData',$data);
      return redirect()->to('admin/laptop')->with('success','Data berhasil diubah');
    }
  }

  public function deleteData($id){
    $data['id'] = $id;
    $laptop = $this->laptopModel->getData('findById', $data);

    if($laptop['laptop_image']!= 'default.jpg'){
      unlink('img/'. $laptop['laptop_image']);
    }
    $this->laptopModel->deleteData('deleteData',$data);
    return redirect()->to('admin/laptop')->with('success','Data berhasil dihapus');
  }
  
}
