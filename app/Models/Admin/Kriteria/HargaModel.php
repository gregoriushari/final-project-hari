<?php

namespace App\Models\Admin\Kriteria;

use App\Models\BaseModel;

class HargaModel extends BaseModel
{
  protected $table                = 'harga_kriteria_ms';
  protected $primaryKey           = 'harga_kriteria_id';
  protected $useSoftDeletes       = true;

  protected $allowedFields        = [
    'harga_kriteria_id',
    'harga_kriteria_name',
    'harga_kriteria_bobot',
  ];

  protected $validationRules = [
    'harga_kriteria_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'harga_kriteria_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'harga_kriteria_bobot' => [
      'label' => 'Bobot',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'harga_kriteria_id',
    'name'=>'harga_kriteria_name',
    'bobot'=>'harga_kriteria_bobot',
  ];

  function getData($flag='', $data='', $convertLabel=''){
    $result = [];
    switch ($flag) {
      case 'data':
        $result = $this->findAll();
        break;
      case 'detailData':
        $result = $this->where('member_id', $data['id'])->first();
        break;
    }
    return $result;
  }


  function insertData($flag='', $data=''){
    switch ($flag) {
      case 'insertData':
        return $this->insert([
          'harga_kriteria_id'=> uniqid('R'),
          'harga_kriteria_name'=>$data['name'],
          'harga_kriteria_bobot'=>$data['bobot'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'harga_kriteria_name'=>$data['name'],
          'harga_kriteria_bobot'=>$data['bobot'],
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
