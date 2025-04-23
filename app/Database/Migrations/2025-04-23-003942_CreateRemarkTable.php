<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRemarkTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'frm_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'collation'  => 'utf8mb4_general_ci',
            ],
            'remark' => [
                'type'     => 'MEDIUMTEXT',
                'collation' => 'utf8mb4_general_ci',
            ],
        'remarkDate' => [
    'type'    => 'TIMESTAMP',
    'null'    => false,
    'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
],




        ]);

        $this->forge->addKey('id', true); // Khóa chính
        $this->forge->createTable('remark', true, [
            'charset' => 'utf8mb4',
            'collate' => 'utf8mb4_general_ci',
            'engine'  => 'InnoDB'
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('remark');
    }
}
