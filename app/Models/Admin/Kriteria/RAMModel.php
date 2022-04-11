<?php

namespace App\Models\Admin\Kriteria;

use App\Models\BaseModel;

class RAMModel extends BaseModel
{
  protected $table                = 'ram_kriteria_ms';
  protected $primaryKey           = 'ram_kriteria_id';
  protected $useSoftDeletes       = true;

  protected $allowedFields        = [
    'ram_kriteria_id',
    'ram_kriteria_name',
    'ram_kriteria_bobot',
  ];

  protected $validationRules = [
    'ram_kriteria_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'ram_kriteria_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'ram_kriteria_bobot' => [
      'label' => 'Bobot',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'ram_kriteria_id',
    'name'=>'ram_kriteria_name',
    'bobot'=>'ram_kriteria_bobot',
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
          'ram_kriteria_id'=> uniqid('R'),
          'ram_kriteria_name'=>$data['name'],
          'ram_kriteria_bobot'=>$data['bobot'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'ram_kriteria_name'=>$data['name'],
          'ram_kriteria_bobot'=>$data['bobot'],
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
