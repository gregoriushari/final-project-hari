<?php

namespace App\Controllers\User;
USE App\Controllers\BaseController;
use App\Models\Admin\LaptopModel;

class Home extends BaseController{
  function __construct(){
    $this->laptopModel = new LaptopModel();
  }
    public function index(){
      $data['title'] = '';
      $data['laptop'] = $this->laptopModel->getData('randomData');
      return view('users/UserHome', $data);
    }
}
