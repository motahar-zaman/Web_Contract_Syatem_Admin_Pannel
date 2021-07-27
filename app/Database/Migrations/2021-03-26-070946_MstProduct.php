<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstProduct extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'product_id'     => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '商品ID /  Product ID',
            ],
            'product_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => false,
                'comment'    => '商品名 / Product Name',
            ],
            'product_name_official' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => false,
                'comment'=> '商品略称 / Product Abbreviation',
            ],
            'price' => [
                'type'   => 'INTEGER',
                'constraint'=> '10',
                'null'   => false,
                'comment'=> '価格 / Price',
            ],
            'start_date' => [
                'type'   => 'DATE',
                'null'   => false,
                'comment'=> '摘要開始日 / start Date',
            ],
            'end_date' => [
                'type'   => 'DATE',
                'null'   => false,
                'comment'=> '摘要終了日 / end Date',
            ],
            'service_type' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> 'サービス種別 / Service Type',
            ],
            'product_type' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '商品種別 / product_type',
            ],
            'campaign_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ /  campaign Flag',
            ],
            'shop_type' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '適用店舗種類 / Shop Type',
            ],
            'product_note' => [
                'type'   => 'VARCHAR',
                'constraint'=> '1000',
                'null'   => true,
                'comment'=> '商品概要 / Product Summary',
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
                'comment'=> '作成日 / Create Date',
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
        $this->forge->addKey('product_id', true);
        $this->forge->createTable('MST_PRODUCT');
	}

	public function down()
	{
        $this->forge->dropTable('MST_PRODUCT');
	}
}
