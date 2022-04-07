<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;

class KriteriaProcessorList extends BaseController
{
  public function index(){
    $data['title'] = 'Processor Criteria List';
    return view('admin/kriteria/adminprocessorcriterialist', $data);
  }
}
