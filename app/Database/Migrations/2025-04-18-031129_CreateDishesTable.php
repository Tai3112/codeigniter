<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDishesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'd_id' => [
                'type'           => 'INT',
                'constraint'     => 222,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rs_id' => [
                'type'       => 'INT',
                'constraint' => 222,
                'unsigned'   => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
                'collation'  => 'utf8mb4_general_ci',
            ],
            'slogan' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
                'collation'  => 'utf8mb4_general_ci',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
            ],
        ]);

        $this->forge->addKey('d_id', true); // Khóa chính
        $this->forge->createTable('dishes', true);
    }

    public function down()
    {
        $this->forge->dropTable('dishes');
    }
}
