<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnShopInfo extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'shop_id'     => [
                'type'       => 'VARCHAR',
                'constraint' => '12',
                'null'       => false,
                'comment'    => '店舗ID / Shop ID',
            ],
            'shop_status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'comment'    => '店舗状況 / Shop Status',
            ],
            'shop_daihyo_name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => true,
                'comment'    => '店舗代表者名 / Shop Rep. Name',
            ],
            'shop_daihyo_name_kana' => [
                'type'          => 'VARCHAR',
                'constraint'    => '200',
                'null'          => true,
                'comment'       => '店舗代表者名カナ / Shop Rep. Name kana',
            ],
            'business' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => true,
                'comment'=> '業種 / Business',
            ],
            'notificate_file_path'     => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
                'null'       => true,
                'comment'    => '届出書パス / Notification Letter Path',
            ],
            'pl_id' => [
                'type'      => 'VARCHAR',
                'null'      => true,
                'constraint'=> '50',
                'comment'   => 'ぴゅあらばID / PureLove ID',
            ],
            'pj_id' => [
                'type'      => 'VARCHAR',
                'null'      => true,
                'constraint'=> '50',
                'comment'   => 'ぴゅあじょID / PureJo ID',
            ],
            'torihikisaki_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '50',
                'null'   => true,
                'comment'=> '取引先店舗ID / Customer Shop ID',
            ],
            'insert_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '登録日 / Registration Date',
            ],
            'insert_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '登録ユーザ / Registered User',
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
                'comment'=> '更新ユーザ / Updated User',
            ],
            'delete_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ /  Delete Flag',
            ],
        ]);
        $this->forge->addKey('shop_id', true);
        $this->forge->createTable('TRN_SHOP_INFO');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_SHOP_INFO');
	}
}
