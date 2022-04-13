<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableRamKriteria extends Migration
{
  public function up(){
    $this->forge->addField([
      'ram_kriteria_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'ram_kriteria_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'ram_kriteria_bobot'=> [
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
    $this->forge->addKey('ram_kriteria_id', TRUE);
    $this->forge->createTable('ram_kriteria_ms');
  }
  
  public function down() {
    $this->forge->dropTable('ram_kriteria_ms');
  }
}
