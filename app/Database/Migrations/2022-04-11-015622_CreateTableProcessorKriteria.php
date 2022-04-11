<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProcessorKriteria extends Migration
{
  public function up(){
    $this->forge->addField([
      'processor_kriteria_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'processor_kriteria_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'processor_kriteria_bobot'=> [
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
    $this->forge->addKey('processor_kriteria_id', TRUE);
    $this->forge->createTable('processor_kriteria_ms');
  }
  
  public function down() {
    $this->forge->dropTable('processor_kriteria_ms');
  }
}
