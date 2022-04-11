<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;

class KriteriaGpuList extends BaseController
{
  public function index(){
    $data['title'] = 'GPU Criteria List';
    return view('admin/kriteria/gpu/admingpucriterialist', $data);
  }
}
