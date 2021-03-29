<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnWebContractHistory extends Migration
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
            'branch_no'       => [
                'type'       => 'INTEGER',
                'constraint' => 10,
                'null'       => false,
                'comment'    => '枝番 / Branch Number',
            ],
            'item_name' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> '項目名 / Item Name',
            ],
            'prev_item_value'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '500',
                'null'           => false,
                'comment'        => '変更前項目値 / Item Value before Change',
            ],
            'change_item_value'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => false,
                'comment'    => '変更後項目値 / Item Value after Change',
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
        ]);
        $this->forge->addKey('contract_id', true);
        $this->forge->addKey('branch_no', true);
        $this->forge->createTable('TRN_WEB_CONTRACT_HISTORY');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_WEB_CONTRACT_HISTORY');
	}
}
