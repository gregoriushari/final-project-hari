<?php

namespace App\Controllers\User;
USE App\Controllers\BaseController;

class Home extends BaseController{
    public function index(){
      $data['title'] = '';
      return view('users/UserHome', $data);
    }
}
