<?php

namespace App\Models\Admin\Kriteria;

use App\Models\BaseModel;

class GPUModel extends BaseModel
{
  protected $table                = 'gpu_kriteria_ms';
  protected $primaryKey           = 'gpu_kriteria_id';
  protected $useSoftDeletes       = true;

  protected $allowedFields        = [
    'gpu_kriteria_id',
    'gpu_kriteria_name',
    'gpu_kriteria_bobot',
  ];

  protected $validationRules = [
    'gpu_kriteria_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'gpu_kriteria_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'gpu_kriteria_bobot' => [
      'label' => 'Bobot',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'gpu_kriteria_id',
    'name'=>'gpu_kriteria_name',
    'bobot'=>'gpu_kriteria_bobot',
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
          'gpu_kriteria_id'=> uniqid('R'),
          'gpu_kriteria_name'=>$data['name'],
          'gpu_kriteria_bobot'=>$data['bobot'],
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'gpu_kriteria_name'=>$data['name'],
          'gpu_kriteria_bobot'=>$data['bobot'],
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
