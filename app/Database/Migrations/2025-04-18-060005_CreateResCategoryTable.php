<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResCategoryTable extends Migration
{
    public function up()
    {
        // Tạo bảng 'res_category'
        $this->forge->addField([
            'c_id' => [
                'type' => 'INT',
                'constraint' => 222,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'c_name' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'collate' => 'utf8_unicode_ci',
            ],
            'date' => [
                'type' => 'TIMESTAMP',
                'null' => false,

            ]
        ]);

        // Chỉ định khóa chính
        $this->forge->addPrimaryKey('c_id');
        
        // Tạo bảng 'res_category'
        $this->forge->createTable('res_category');
    }

    public function down()
    {
        // Xóa bảng 'res_category' nếu cần rollback
        $this->forge->dropTable('res_category');
    }
}
