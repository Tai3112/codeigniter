<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDishesTable extends Migration
{
    public function up()
    {
        // Tạo bảng 'dishes'
        $this->forge->addField([
            'd_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'rs_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'slogan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'img' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);

        // Chỉ định khóa chính
        $this->forge->addPrimaryKey('d_id');
        
        // Tạo bảng
        $this->forge->createTable('dishes');
    }

    public function down()
    {
        // Xóa bảng 'dishes' nếu cần rollback
        $this->forge->dropTable('dishes');
    }
}
