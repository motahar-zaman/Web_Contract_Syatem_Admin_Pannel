<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnContractRingi extends Migration
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
            'ringi_no'     => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '稟議番号 / Ringi Number',
            ],
            'status'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => '契約状況 / Status',
            ],
            'update_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '更新日 Update Date',
            ],
            'update_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '更新者 Update By',
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
                'comment'=> '削除フラグ /  Delete Flag',
            ],
        ]);
        $this->forge->createTable('TRN_CONTRACT_RINGI');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_CONTRACT_RINGI');
	}
}
