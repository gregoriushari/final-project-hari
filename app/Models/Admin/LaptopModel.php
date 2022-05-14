<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class LaptopModel extends BaseModel
{
  protected $table                = 'laptop_ms';
  protected $primaryKey           = 'laptop_id';
  protected $useSoftDeletes       = false;

  protected $allowedFields        = [
    'laptop_id',
    'laptop_name',
    'laptop_price',
    'laptop_image',
    'ram_id',
    'gpu_id',
    'memori_id',
    'price_id',
    'harga_id',
    'processor_id',
  ];

  protected $validationRules = [
    'laptop_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'laptop_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'laptop_price' => [
      'label' => 'Price',
      'rules' => 'required'
    ],
    'laptop_image' => [
      'label' => 'Image',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'laptop_id',
    'name'=>'laptop_name',
    'price'=>'laptop_price',
    'image'=>'laptop_image',
  ];

  function getData($flag='', $data=''){
    $result = [];
    switch ($flag) {
      case 'data':
        $result = $this->findAll();
        break;
      case 'randomData':
        $this->orderBy('laptop_id', 'RANDOM');
        $result = $this->findAll(4);
        break;
      case 'Joindata':
        $this->join('ram_kriteria_ms', 'ram_kriteria_ms.ram_kriteria_id = laptop_ms.ram_id');
        $this->join('gpu_kriteria_ms', 'gpu_kriteria_ms.gpu_kriteria_id = laptop_ms.gpu_id');
        $this->join('memori_kriteria_ms', 'memori_kriteria_ms.memori_kriteria_id = laptop_ms.memori_id');
        $this->join('harga_kriteria_ms', 'harga_kriteria_ms.harga_kriteria_id = laptop_ms.harga_id'); 
        $this->join('processor_kriteria_ms', 'processor_kriteria_ms.processor_kriteria_id = laptop_ms.processor_id');
        $this->select('ram_kriteria_ms.ram_kriteria_name');
        $this->select('gpu_kriteria_ms.gpu_kriteria_name');
        $this->select('memori_kriteria_ms.memori_kriteria_name');
        $this->select('harga_kriteria_ms.harga_kriteria_name');
        $this->select('processor_kriteria_ms.processor_kriteria_name');
        $this->select('laptop_ms.*');
        $result = $this->find($data['id']);
        break;
      case 'JoinDataBobot':
        $this->select('laptop_ms.laptop_id');
        $this->select('laptop_ms.laptop_name');
        $this->select('laptop_ms.laptop_price');
        $this->select('laptop_ms.laptop_image');
        $this->select('harga_kriteria_ms.harga_kriteria_bobot');
        $this->select('ram_kriteria_ms.ram_kriteria_bobot');
        $this->select('gpu_kriteria_ms.gpu_kriteria_bobot');
        $this->select('memori_kriteria_ms.memori_kriteria_bobot');
        $this->select('processor_kriteria_ms.processor_kriteria_bobot');
        $this->join('ram_kriteria_ms', 'ram_kriteria_ms.ram_kriteria_id = laptop_ms.ram_id');
        $this->join('gpu_kriteria_ms', 'gpu_kriteria_ms.gpu_kriteria_id = laptop_ms.gpu_id');
        $this->join('memori_kriteria_ms', 'memori_kriteria_ms.memori_kriteria_id = laptop_ms.memori_id');
        $this->join('harga_kriteria_ms', 'harga_kriteria_ms.harga_kriteria_id = laptop_ms.harga_id'); 
        $this->join('processor_kriteria_ms', 'processor_kriteria_ms.processor_kriteria_id = laptop_ms.processor_id');
        $this->where('harga_kriteria_ms.harga_kriteria_id', $data['id_price']);
        $result = $this->findAll();
        break;
      case 'countData':
        $result = $this->countAllResults();
        break;
      case 'findById':
        $result = $this->find($data['id']);
        break;
    }
    return $result;
  }


  function insertData($flag='', $data=''){
    switch ($flag) {
      case 'insertData':
        return $this->insert([
          'laptop_id'=> uniqid('L'),
          'laptop_name'=>$data['name'],
          'laptop_price'=>$data['price'],
          'laptop_image'=>$data['image'],
          'ram_id'=>$data['ram'],
          'gpu_id'=>$data['gpu'],
          'memori_id'=>$data['memori'],
          'processor_id'=>$data['processor'],
          'harga_id'=>$data['harga'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'laptop_name'=>$data['name'],
          'laptop_price'=>$data['price'],
          'laptop_image'=>$data['image'],
          'ram_id'=>$data['ram'],
          'gpu_id'=>$data['gpu'],
          'memori_id'=>$data['memori'],
          'processor_id'=>$data['processor'],
          'harga_id'=>$data['harga'],
        ];
        return $this->update($data['id'],$postData);
        break;
    }
  }

  function deleteData($flag='', $data=''){
    switch($flag){
      case 'deleteData':
        return $this->delete($data['id']);
        break;
    }
  }
}
