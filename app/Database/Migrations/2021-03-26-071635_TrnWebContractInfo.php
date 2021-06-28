<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnWebContractInfo extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'contract_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '契約ID / Contract ID',
            ],
            'item_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => false,
                'comment'    => '項目番号 / Item Number',
            ],
            'branch_no' => [
                'type'   => 'INTEGER',
                'constraint'=> 10,
                'null'   => false,
                'comment'=> '枝番 / Branch Number',
            ],
            'item_value'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '500',
                'null'           => true,
                'comment'        => '項目値 / Item Value',
            ],
            'update_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '更新日 / Update Date',
            ],
            'update_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '更新者 / Update By',
            ],
            'insert_date'          => [
                'type'           => 'DATETIME',
                'null'           => false,
                'comment'        => '作成日 / Create Date',
            ],
            'insert_user_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => false,
                'comment'    => '作成者 / Create By',
            ],
            'delete_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('item_id', true);
        $this->forge->addKey('contract_id', true);
        $this->forge->addKey('branch_no', true);
        $this->forge->createTable('TRN_WEB_CONTRACT_INFO');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_WEB_CONTRACT_INFO');
	}
}
