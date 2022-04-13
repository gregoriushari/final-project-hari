<?php

namespace App\Models\Admin\Kriteria;

use App\Models\BaseModel;

class ProcessorModel extends BaseModel
{
  protected $table                = 'processor_kriteria_ms';
  protected $primaryKey           = 'processor_kriteria_id';
  protected $useSoftDeletes       = true;

  protected $allowedFields        = [
    'processor_kriteria_id',
    'processor_kriteria_name',
    'processor_kriteria_bobot',
  ];

  protected $validationRules = [
    'processor_kriteria_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'processor_kriteria_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'processor_kriteria_bobot' => [
      'label' => 'Bobot',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'processor_kriteria_id',
    'name'=>'processor_kriteria_name',
    'bobot'=>'processor_kriteria_bobot',
  ];

  function getData($flag='', $data='', $convertLabel=''){
    $result = [];
    switch ($flag) {
      case 'data':
        $result = $this->findAll();
        break;
    }
    return $result;
  }


  function insertData($flag='', $data=''){
    switch ($flag) {
      case 'insertData':
        return $this->insert([
          'processor_kriteria_id'=> uniqid('P'),
          'processor_kriteria_name'=>$data['name'],
          'processor_kriteria_bobot'=>$data['bobot'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'processor_kriteria_name'=>$data['name'],
          'processor_kriteria_bobot'=>$data['bobot'],
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
