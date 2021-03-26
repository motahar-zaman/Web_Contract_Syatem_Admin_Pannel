<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstAuthority extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'authority_id'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '権限ID / Privileges ID',
            ],
            'authority_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '権限名 / Privileges Name',
            ],
            'update_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '更新日 / Update Date',
            ],
            'update_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '更新者 / Update By',
            ],
            'insert_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '作成日 Create Date',
            ],
            'insert_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '作成者 / Create By',
            ],
            'delete_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('authority_id', true);
        $this->forge->createTable('MST_AUTHORITY');
	}

	public function down()
	{
        $this->forge->dropTable('MST_AUTHORITY');
	}
}
