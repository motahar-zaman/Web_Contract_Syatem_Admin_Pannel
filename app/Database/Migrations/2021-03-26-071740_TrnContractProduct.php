<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnContractProduct extends Migration
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
            'product_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '商品ID / Product ID',
            ],
            'shop_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '店舗ID /  Shop ID',
            ],
            'status'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => '契約状況 / Status',
            ],
            'start_date_year'=> [
                'type'       => 'INTEGER',
                'constraint' => 4,
                'null'       => false,
                'comment'    => '契約開始-年 / Contract Start Year',
            ],
            'start_date_month'=> [
                'type'       => 'INTEGER',
                'constraint' => 2,
                'null'       => false,
                'comment'    => '契約開始-月 / Contract Start Month',
            ],
            'end_date_year'  => [
                'type'       => 'INTEGER',
                'constraint' => 4,
                'null'       => true,
                'comment'    => '契約終了-年/ Contract End Year',
            ],
            'end_date_month' => [
                'type'       => 'INTEGER',
                'constraint' => 2,
                'null'       => true,
                'comment'    => '契約終了-月 / Contract End Month',
            ],
            'tantou_id'     => [
                'type'      => 'VARCHAR',
                'constraint'=> '20',
                'null'   => true,
                'comment'=> '担当者ID / Rep. ID',
            ],
            'note'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '1000',
                'null'           => true,
                'comment'        => '備考 / Remarks',
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
        $this->forge->addKey('branch_no', true);
        $this->forge->addKey('contract_id', true);
        $this->forge->createTable('TRN_CONTRACT_PRODUCT');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_CONTRACT_PRODUCT');
	}
}
