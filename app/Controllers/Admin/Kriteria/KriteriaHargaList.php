<?php

namespace App\Controllers\Admin\Kriteria;

use App\Controllers\BaseController;

class KriteriaHargaList extends BaseController
{
  public function index(){
    $data['title'] = 'Price Criteria List';
    return view('admin/kriteria/harga/adminhargacriterialist', $data);
  }
}
