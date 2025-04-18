<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRestaurantTable extends Migration
{
    public function up()
    {
        // Tạo bảng 'restaurant'
        $this->forge->addField([
            'rs_id' => [
                'type' => 'INT',
                'constraint' => 222,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'c_id' => [
                'type' => 'INT',
                'constraint' => 222,
                'unsigned' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'collate' => 'utf8mb4_general_ci',
            ],
            'o_hr' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'collate' => 'utf8mb4_general_ci',
            ],
            'c_hr' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'collate' => 'utf8mb4_general_ci',
            ],
            'o_days' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'collate' => 'utf8mb4_general_ci',
            ],
            'address' => [
                'type' => 'TEXT',
                'collate' => 'utf8_unicode_ci',
            ],
            'image' => [
                'type' => 'TEXT',
                'collate' => 'utf8mb4_general_ci',
            ],
            'date' => [
    'type' => 'DATETIME',
    'null' => true,  // Đảm bảo rằng không có giá trị mặc định
],
            'so_nguoi' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);

        // Chỉ định khóa chính
        $this->forge->addPrimaryKey('rs_id');
        
        // Tạo bảng 'restaurant'
        $this->forge->createTable('restaurant');
    }

    public function down()
    {
        // Xóa bảng 'restaurant' nếu cần rollback
        $this->forge->dropTable('restaurant');
    }
}
