<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdmin extends Migration
{
  public function up(){
    $this->forge->addField([
      'admin_id'      => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'admin_name'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'admin_email'    => [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'admin_password'=> [
        'type'              => 'VARCHAR',
        'constraint'        => 255,
      ],
      'admin_password_text'=> [
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
    $this->forge->addKey('admin_id', TRUE);
    $this->forge->createTable('admin_ms');
  }
  
  public function down() {
    $this->forge->dropTable('admin_ms');
  }
}
