<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserList extends BaseController{
  public function index(){
    $data['title'] = 'User List';
    return view('admin/adminuserlist', $data);
  }
}
