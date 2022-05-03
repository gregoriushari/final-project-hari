<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class LaptopModel extends BaseModel
{
  protected $table                = 'laptop_ms';
  protected $primaryKey           = 'laptop_id';
  protected $useSoftDeletes       = true;

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
