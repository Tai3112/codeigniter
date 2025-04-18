<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersOrdersTable extends Migration
{
    public function up()
    {
        // Tạo bảng 'users_orders'
        $this->forge->addField([
            'o_id' => [
                'type' => 'INT',
                'constraint' => 222,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'u_id' => [
                'type' => 'INT',
                'constraint' => 222,
                'unsigned' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 222,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'null' => true
            ],
           'date' => [
    'type' => 'DATETIME',  // Sử dụng DATETIME thay vì TIMESTAMP
    'null' => true,         // Không cần giá trị mặc định
],

            'customer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'num_people' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'mahoadon' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],
            'duyetdonhang' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ]
        ]);

        // Chỉ định khóa chính
        $this->forge->addPrimaryKey('o_id');
        
        // Tạo bảng 'users_orders'
        $this->forge->createTable('users_orders');
    }

    public function down()
    {
        // Xóa bảng 'users_orders' nếu cần rollback
        $this->forge->dropTable('users_orders');
    }
}
