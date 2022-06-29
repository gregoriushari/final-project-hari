<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\Kriteria\HargaModel;
use App\Models\Admin\LaptopModel;

class Recomendation extends BaseController{
  function __construct(){
    $this->laptopModel = new LaptopModel();
    $this->hargaModel = new HargaModel();
  }

  public function index(){
    $data['title'] = 'Recomendation';
    $data['harga'] = $this->hargaModel->getData('data');
    return view('users/UserRecomendation', $data);
  }

  public function recomendation(){
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'harga' => 'required',
        'ram' => 'required',
        'gpu' => 'required',
        'processor' => 'required',
        'memori' => 'required',
      ],[
        'harga' => [
          'required' => 'Field Harga harus diisi',
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
      ]
    );
    $isDataValid = $validation->withRequest($this->request)->run();
    if(!$isDataValid){
      session()->setFlashdata('error', $validation->listErrors());
      return redirect('recomendation')->withInput();
    }else{
      $normalisasi = [];
      $nilai_v=[];
      $hasil=[];

      $data =[
        'id_price'=>$this->request->getPost('harga')
      ];
      
      $laptopData = $this->laptopModel->getData('JoinDataBobot', $data);
      $minMaxLaptop = $this->laptopModel->getData('getMinMax', $data);
      $bobotHarga = $this->hargaModel->getData('findById', $data);

      $w =[
        $bobotHarga['harga_kriteria_bobot'],
        $this->request->getPost('ram'), 
        $this->request->getPost('gpu'), 
        $this->request->getPost('processor'), 
        $this->request->getPost('memori')
      ];

      // var_dump($laptopData);
      // die;

      //proses normalisasi
      foreach($laptopData as $key => $laptop){
        foreach($minMaxLaptop as $minMax){
          $normalisasi[$key]['laptop_id'] = $laptop['laptop_id'];
          $normalisasi[$key]['laptop_name'] = $laptop['laptop_name'];
          $normalisasi[$key]['laptop_price'] = $laptop['laptop_price'];
          $normalisasi[$key]['laptop_image'] = $laptop['laptop_image'];
          $normalisasi[$key]['harga'] = $minMax['harga_kriteria_bobot']/$laptop['harga_kriteria_bobot'];
          $normalisasi[$key]['gpu'] = $laptop['gpu_kriteria_bobot']/$minMax['gpu_kriteria_bobot'];
          $normalisasi[$key]['processor'] = $laptop['processor_kriteria_bobot']/$minMax['processor_kriteria_bobot'];
          $normalisasi[$key]['memori'] = $laptop['memori_kriteria_bobot']/$minMax['memori_kriteria_bobot'];
          $normalisasi[$key]['ram'] = $laptop['ram_kriteria_bobot']/$minMax['ram_kriteria_bobot'];
        }
      }

      // var_dump($w);die;
      // var_dump($normalisasi);die;

      //menghitung nilai v
      foreach($normalisasi as $key => $normal){
        $nilai_v[$key]['laptop_id'] = $normal['laptop_id'];
        $nilai_v[$key]['laptop_name'] = $normal['laptop_name'];
        $nilai_v[$key]['laptop_price'] = $normal['laptop_price'];
        $nilai_v[$key]['laptop_image'] = $normal['laptop_image'];
        $nilai_v[$key]['harga'] = $normal['harga']*$w[0];
        $nilai_v[$key]['ram'] = $normal['ram']*$w[1];
        $nilai_v[$key]['gpu'] = $normal['gpu']*$w[2];
        $nilai_v[$key]['processor'] = $normal['processor']*$w[3];
        $nilai_v[$key]['memori'] = $normal['memori']*$w[4];
      }

      //menghitung nilai v total
      foreach($nilai_v as $key => $nilai){
        $nilai_v[$key]['nilai_v'] = $nilai['harga']+$nilai['ram']+$nilai['gpu']
        +$nilai['processor']+$nilai['memori'];
      }
      

      foreach($nilai_v as $key => $nilai){
        $hasil[$key]['laptop_id'] = $nilai['laptop_id'];
        $hasil[$key]['laptop_name'] = $nilai['laptop_name'];
        $hasil[$key]['laptop_price'] = $nilai['laptop_price'];
        $hasil[$key]['laptop_image'] = $nilai['laptop_image'];
        $hasil[$key]['nilai_v'] = $nilai['nilai_v'];
      }
      
      //mencari nilai v terbesar
      $sort = array();
      foreach($hasil as $k=>$v) {
        $sort['nilai_v'][$k] = $v['nilai_v'];
      }
      array_multisort($sort['nilai_v'], SORT_DESC, $hasil);
      
      $result['title']='Recomendation Result';
      $result['hasil']= array_slice($hasil, 0, 6);
      return view('users/UserRecomendationResult', $result);
    }
  }
}
