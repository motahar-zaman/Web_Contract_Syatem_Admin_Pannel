<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnWebContractBase extends Migration
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
            'shop_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '店舗ID /  Shop ID',
            ],
            'contractor_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '契約者ID / Contractor ID',
            ],
            'tantou_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '担当者ID / Rep.ID',
            ],
            'note' => [
                'type'   => 'VARCHAR',
                'constraint'=> '1000',
                'null'   => true,
                'comment'=> '備考 / Remarks',
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
            'insert_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '作成日 / Create Date',
            ],
            'insert_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '作成者 / / Create By',
            ],
            'delete_flag'       => [
                'type'       => 'BOOLEAN',
                'null'       => false,
                'comment'    => '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('contract_id', true);
        $this->forge->createTable('TRN_WEB_CONTRACT_BASE');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_WEB_CONTRACT_BASE');
	}
}
