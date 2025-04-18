<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'adm_id' => [
                'type'           => 'INT',
                'constraint'     => 222,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
            ],
            'date' => [
                'type'    => 'TIMESTAMP',
                'null'    => false
            ],
        ]);
        
        $this->forge->addKey('adm_id', true); // Khóa chính
        $this->forge->createTable('admin');
        
    }


    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
