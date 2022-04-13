<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableLaptop extends Migration
{
  public function up(){
    $this->forge->addField([
      'laptop_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'laptop_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'laptop_image'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'laptop_price'    => [
        'type'              => 'integer',
      ],
      'ram_id'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'processor_id'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'gpu_id'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'memori_id'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'harga_id'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
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
    $this->forge->addKey('laptop_id', TRUE);
    $this->forge->createTable('laptop_ms');
  }
  
  public function down() {
    $this->forge->dropTable('laptop_ms');
  }
}
