<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\LaptopModel;

class Laptop extends BaseController{

  function __construct(){
    $this->laptopModel = new LaptopModel();
  }

  public function index(){
    $data['title'] = 'Laptop List';
    $data['laptop']=$this->laptopModel->getData('data');
    return view('users/UserLaptop', $data);
  }

  public function detail($id){
    $data['title'] = 'Detail Laptop';
    $data['id']=$id;
    $data['laptop']=$this->laptopModel->getData('Joindata', $data);
    return view('users/UserDetailLaptop', $data);
  }
}
