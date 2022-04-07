<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;

class KriteriaRamList extends BaseController
{
  public function index(){
    $data['title'] = 'RAM Criteria List';
    return view('admin/kriteria/adminramcriterialist', $data);
  }
}
