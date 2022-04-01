<?php

namespace App\Controllers;

class Home extends BaseController{
    public function index(){
      $data['title'] = 'Dashboard Admin';
      return view('admin/adminHome', $data);
    }

    public function coba(){
      return 'makan bebel';
    }
}
