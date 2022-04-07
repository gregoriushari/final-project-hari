<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LaptopList extends BaseController
{
  public function index(){
    $data['title'] = 'Laptop List';
    return view('admin/adminlaptoplist', $data);
  }
}
