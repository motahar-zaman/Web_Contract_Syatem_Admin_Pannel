<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstShop extends Migration
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
            'shop_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '店舗名 / Shop Name',
            ],
            'shop_name_kana' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => true,
                'comment'=> '店舗名-フリガナ / Shop Name - Furigana',
            ],
            'zipcode' => [
                'type'   => 'VARCHAR',
                'constraint'=> '8',
                'null'   => true,
                'comment'=> '郵便番号 / Postal Code',
            ],
            'address_01'     => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => true,
                'comment'    => '住所０１ / Address 01',
            ],
            'address_02' => [
                'type'      => 'VARCHAR',
                'null'      => true,
                'constraint'=> '500',
                'comment'   => '住所０２ / Address 02',
            ],
            'area_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '8',
                'null'   => true,
                'comment'=> 'エリアID /  Area ID',
            ],
            'prefecture' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => true,
                'comment'=> '都道府県 / Prefecture',
            ],
            'tel_no'          => [
                'type'        => 'VARCHAR',
                'constraint'  => '13',
                'null'        => false,
                'comment'     => '電話番号 / Phone Number',
            ],
            'fax_no'       => [
                'type'      => 'VARCHAR',
                'constraint'=> '13',
                'null'      => true,
                'comment'   => 'FAX番号 / FAX Number',
            ],
            'mail_address' => [
                'type'   => 'VARCHAR',
                'constraint'=> '400',
                'null'      => true,
                'comment'=> 'メールアドレス / Mail Address',
            ],
            'site_url' => [
                'type'   => 'VARCHAR',
                'constraint'=> '400',
                'null'      => true,
                'comment'=> '店舗サイトURL / Shop Site URL',
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
        $this->forge->createTable('MST_SHOP');
	}

	public function down()
	{
        $this->forge->dropTable('MST_SHOP');
	}
}
