<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminHome extends BaseController{
  public function index(){
    $data['title'] = 'Dashboard Admin';
    return view('admin/adminHome', $data);
  }
}
