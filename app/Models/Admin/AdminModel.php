<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class AdminModel extends BaseModel
{
  protected $table                = 'admin_ms';
  protected $primaryKey           = 'admin_id';
  protected $useSoftDeletes       = false;

  protected $allowedFields        = [
    'admin_id',
    'admin_name',
    'admin_email',
    'admin_password',
    'admin_password_text'
  ];

  protected $validationRules = [
    'admin_id' => [
      'label' => 'ID',
      'rules' => 'required'
    ],
    'admin_name' => [
      'label' => 'Name',
      'rules' => 'required'
    ],
    'admin_email' => [
      'label' => 'Email',
      'rules' => 'required'
    ],
    'admin_password' => [
      'label' => 'Password',
      'rules' => 'required'
    ],
    'admin_password_text' => [
      'label' => 'Password Text',
      'rules' => 'required'
    ],
  ];

  protected $tableAlias = [
    'id'=>'admin_id',
    'email'=>'admin_email',
    'name'=>'admin_name',
    'password'=>'admin_password',
  ];

  function getData($flag='', $data=''){
    $result = [];
    switch ($flag) {
      case 'data':
        $result = $this->findAll();
        break;
      case 'detailUsernameData':
        $result = $this->where('admin_email', $data['email'])->first();
        break;
      case 'countData':
        $result = $this->countAllResults();
        break;
    }
    return $result;
  }


  function insertData($flag='', $data=''){
    switch ($flag) {
      case 'insertData':
        return $this->insert([
          'admin_id'=> uniqid('A'),
          'admin_name'=>$data['name'],
          'admin_email'=>$data['email'],
          'admin_password'=>$data['password'],
          'admin_password_text'=>$data['text']
        ]);
        break;
    }
  }

  function updateData($flag='', $data=''){
    switch ($flag) {
      case 'updateData':
        $postData = [
          'admin_name'=>$data['name'],
          'admin_email'=>$data['email'],
          'admin_password'=>$data['password'],
          'admin_password_text'=>$data['text']
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
