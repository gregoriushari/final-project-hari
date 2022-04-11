<?php

namespace App\Models\Admin\Kriteria;

use App\Models\BaseModel;

class MemoriModel extends BaseModel
{
  protected $table                = 'memori_kriteria_ms';
  protected $primaryKey           = 'memori_kriteria_id';
  protected $useSoftDeletes       = true;

  protected $allowedFields        = [
    'memori_kriteria_id',
    'memori_kriteria_name',
    'memori_kriteria_bobot',
  ];

  protected $validationRules = [
    'memori_kriteria_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'memori_kriteria_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'memori_kriteria_bobot' => [
      'label' => 'Bobot',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'memori_kriteria_id',
    'name'=>'memori_kriteria_name',
    'bobot'=>'memori_kriteria_bobot',
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
          'memori_kriteria_id'=> uniqid('R'),
          'memori_kriteria_name'=>$data['name'],
          'memori_kriteria_bobot'=>$data['bobot'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'memori_kriteria_name'=>$data['name'],
          'memori_kriteria_bobot'=>$data['bobot'],
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
