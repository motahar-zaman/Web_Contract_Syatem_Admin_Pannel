<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstUser extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'comment' => 'ユーザーID / User ID',
            ],
            'contractor_id' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'comment' => '契約者ID / Contractor ID',
            ],
            'insert_date' => [
                'type' => 'DATETIME',
                'null' => false,
                'comment' => '登録日 / Registration date',
            ],
            'insert_user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
                'comment' => '登録ユーザ / Registration by',
            ],
            'update_date' => [
                'type' => 'DATETIME',
                'null' => false,
                'comment' => '更新日 / Update date',
            ],
            'update_user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
                'comment' => '更新者 / Update By',
            ],
            'delete_flag' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'comment' => '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey(['user_id', 'contractor_id'], true);
        $this->forge->addKey('update_user_id');
        $this->forge->addKey('insert_user_id');
        $this->forge->createTable('trn_user_contractor_map');
	}

	public function down()
	{
        $this->forge->dropTable('trn_user_contractor_map');
	}
}
