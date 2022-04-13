<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGpuKriteria extends Migration
{
  public function up(){
    $this->forge->addField([
      'gpu_kriteria_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'gpu_kriteria_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'gpu_kriteria_bobot'=> [
        'type'              => 'integer',
      ],
      'created_at'       => [
        'type'              => 'datetime',
      ],
      'updated_at'       => [
        'type'              => 'datetime',
      ],
      'deleted_at'       => [
        'type'              => 'datetime',
      ],
    ]);
    $this->forge->addKey('gpu_kriteria_id', TRUE);
    $this->forge->createTable('gpu_kriteria_ms');
  }
  
  public function down() {
    $this->forge->dropTable('gpu_kriteria_ms');
  }
}
