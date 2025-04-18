<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDishesTable extends Migration
{
    public function up()
    {
        // Tạo bảng dishes
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
                'null'       => false,
            ],
            'slogan' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
                'null'       => false,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
                'null'       => false,
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => 222,
                'null'       => false,
            ],
        ]);
        $this->forge->addPrimaryKey('d_id');
        $this->forge->createTable('dishes');
    }

    public function down()
    {
        // Xóa bảng dishes
        $this->forge->dropTable('dishes');
    }
}
