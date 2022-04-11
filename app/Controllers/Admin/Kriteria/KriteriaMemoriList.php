<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;

class KriteriaMemoriList extends BaseController
{
  public function index(){
    $data['title'] = 'Memory Storage Criteria List';
    return view('admin/kriteria/Memori/adminmemoricriterialist', $data);
  }
}
