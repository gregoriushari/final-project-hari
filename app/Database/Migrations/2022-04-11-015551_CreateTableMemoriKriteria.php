<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMemoriKriteria extends Migration
{
  public function up(){
    $this->forge->addField([
      'memori_kriteria_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'memori_kriteria_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'memori_kriteria_bobot'=> [
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
    $this->forge->addKey('memori_kriteria_id', TRUE);
    $this->forge->createTable('memori_kriteria_ms');
  }
  
  public function down() {
    $this->forge->dropTable('memori_kriteria_ms');
  }
}
