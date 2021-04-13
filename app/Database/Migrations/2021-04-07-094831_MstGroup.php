<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstGroup extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'group_id'         => [
                'type'         => 'VARCHAR',
                'constraint'   => '12',
                'null'         => false,
                'comment'      => '契約者ID / Group ID',
            ],
            'group_name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '契約者名 / Group Name',
            ],
            'group_name_kana' => [
                'type'        => 'VARCHAR',
                'constraint'  => '200',
                'null'        => true,
                'comment'     => '契約者名カナ / Group Name - Kana',
            ],
            'daihyousha_name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '契約者名 / Representative Name',
            ],
            'daihyousha_name_kana' => [
                'type'          => 'VARCHAR',
                'constraint'    => '200',
                'null'          => true,
                'comment'       => '契約者名カナ / Representative - Kana',
            ],
            'zipcode'          => [
                'type'         => 'VARCHAR',
                'constraint'   => '8',
                'null'         => true,
                'comment'      => '郵便番号 / Postal Code',
            ],
            'address_01'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => true,
                'comment'    => '住所０１ / Address 01',
            ],
            'address_02'    => [
                'type'      => 'VARCHAR',
                'null'      => true,
                'constraint'=> '500',
                'comment'   => '住所０２ / Address 02',
            ],
            'area_id'          => [
                'type'         => 'VARCHAR',
                'constraint'   => '8',
                'null'         => true,
                'comment'      => 'エリアID',
            ],
            'prefecture'          => [
                'type'         => 'VARCHAR',
                'constraint'   => '15',
                'null'         => true,
                'comment'      => '都道府県 / prefecture',
            ],
            'tel_no'          => [
                'type'        => 'VARCHAR',
                'constraint'  => '13',
                'null'        => true,
                'comment'     => '電話番号 / Phone Number',
            ],
            'fax_no'        => [
                'type'      => 'VARCHAR',
                'constraint'=> '13',
                'null'      => true,
                'comment'   => 'FAX番号 / FAX Number',
            ],
            'mail_address'   => [
                'type'       => 'VARCHAR',
                'constraint' => '400',
                'null'       => true,
                'comment'    => 'メールアドレス / Mail Address',
            ],
            'insert_date'    => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '作成日 / Create Date',
            ],
            'insert_user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => false,
                'comment'    => '作成者 / Create By',
            ],
            'update_date'    => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '更新日 / Update Date',
            ],
            'update_user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => false,
                'comment'    => '更新者 / Update By',
            ],
            'delete_flag' => [
                'type'   => 'BOOLEAN',
                'null'   => false,
                'comment'=> '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('group_id', true);
        $this->forge->createTable('MST_GROUP');
	}

	public function down()
	{
        $this->forge->dropTable('MST_GROUP');
	}
}
