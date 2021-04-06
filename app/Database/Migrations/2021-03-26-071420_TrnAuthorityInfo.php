<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnAuthorityInfo extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'account_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '社員ID / Account ID',
            ],
            'authority_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '権限ID / Privileges  ID',
            ],
            'update_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '更新日 / Update Date',
            ],
            'update_user_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => false,
                'comment'        => '更新者 / Update By',
            ],
            'insert_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '作成日 / Create Date',
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
                'comment'=> '削除フラグ /  Delete Flag',
            ],
        ]);
        $this->forge->addKey('account_id', true);
        $this->forge->addKey('authority_id', true);
        $this->forge->createTable('TRN_AUTHORITY_INFO');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_AUTHORITY_INFO');
	}
}
