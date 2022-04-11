<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;
class AdminHome extends BaseController{
  function __construct(){
    $this->adminModel = new AdminModel();
  }

  public function index(){
    $data['title'] = 'Dashboard Admin';
    $data['userCount'] = $this->adminModel->getData('countData');
    return view('admin/adminHome', $data);
  }
}
