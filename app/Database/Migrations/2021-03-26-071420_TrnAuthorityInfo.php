<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnAuthorityInfo extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'employee_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '社員ID / Employee ID',
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
            'item_no' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '有効フラグ / Valid Flag',
            ],
        ]);
        $this->forge->addKey('employee_id', true);
        $this->forge->addKey('authority_id', true);
        $this->forge->createTable('TRN_AUTHORITY_INFO');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_AUTHORITY_INFO');
	}
}
