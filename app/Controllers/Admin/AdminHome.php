<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;
use App\Models\Admin\LaptopModel;
class AdminHome extends BaseController{
  function __construct(){
    $this->adminModel = new AdminModel();
    $this->laptopModel = new LaptopModel();
  }

  public function index(){
    $data['title'] = 'Dashboard Admin';
    $data['userCount'] = $this->adminModel->getData('countData');
    $data['laptopCount'] = $this->laptopModel->getData('countData');
    return view('admin/adminHome', $data);
  }
}
