<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnRingiInfo extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'ringi_no'     => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '稟議番号 / Ringi Number',
            ],
            'applicant_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '申請者名 / applicant name',
            ],
            'ringi_type' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '契約種別 / Contract type',
            ],
            'target_area' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '対象区分 / Target classification',
            ],
            'target_name' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> '対象名 / Target name',
            ],
            'discount_service_type' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '割引サービス区分 / Discount service classification',
            ],
            'ringi_detail' => [
                'type'   => 'VARCHAR',
                'constraint'=> '2000',
                'null'   => false,
                'comment'=> '詳細 / Detail',
            ],
            'summary_condition' => [
                'type'   => 'VARCHAR',
                'constraint'=> '2000',
                'null'   => false,
                'comment'=> '条件 / Condition',
            ],
            'before_summary_price' => [
                'type'   => 'INTEGER',
                'constraint'=> '64',
                'null'   => false,
                'comment'=> 'サービス前税抜き価格 / Pre-service tax-excluded price',
            ],
            'after_summary_price' => [
                'type'   => 'INTEGER',
                'constraint'=> '64',
                'null'   => false,
                'comment'=> 'サービス後税抜き価格 / Post-service tax-excluded price',
            ],
            'summary_period' => [
                'type'   => 'INTEGER',
                'constraint'=> '16',
                'null'   => false,
                'comment'=> 'サービス期間(月単位) / Service period (month)',
            ],
            'start_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '摘要開始日 / start Date',
            ],
            'end_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '摘要終了日 / end Date',
            ],
            'purpose' => [
                'type'   => 'VARCHAR',
                'constraint'=> '2000',
                'null'   => false,
                'comment'=> '目標 / purpose',
            ],
            'memo' => [
                'type'   => 'VARCHAR',
                'constraint'=> '2000',
                'null'   => true,
                'comment'=> '備考 / Remarks',
            ],
            'delete_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('ringi_no', true);
        $this->forge->createTable('TRN_RINGI_INFO');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_RINGI_INFO');
	}
}
