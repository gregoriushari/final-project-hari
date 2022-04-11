<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableHargaKriteria extends Migration
{
  public function up(){
    $this->forge->addField([
      'harga_kriteria_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'harga_kriteria_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'harga_kriteria_bobot'=> [
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
    $this->forge->addKey('harga_kriteria_id', TRUE);
    $this->forge->createTable('harga_kriteria_ms');
  }
  
  public function down() {
    $this->forge->dropTable('harga_kriteria_ms');
  }
}
