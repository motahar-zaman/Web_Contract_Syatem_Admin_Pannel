<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstContractor extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'contractor_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '契約者ID / Contractor ID',
            ],
            'contractor_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => false,
                'comment'    => '契約者名 / Contractor Name',
            ],
            'contractor_name_kana' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => false,
                'comment'=> '契約者名カナ / Contractor Name - Kana',
            ],
            'password' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> 'パスワード / password',
            ],
            'zipcode'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '郵便番号 / Postal Code',
            ],
            'address_01'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => false,
                'comment'    => '住所０１ / Address 01',
            ],
            'address_02' => [
                'type'      => 'VARCHAR',
                'null'      => true,
                'constraint'=> '500',
                'comment'   => '住所０２ / Address 02',
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
                'constraint'=> '500',
                'null'      => true,
                'comment'=> 'メールアドレス / Mail Address',
            ],
            'type_contractor'   => [
                'type'          => 'VARCHAR',
                'constraint'    => '2',
                'null'          => false,
                'comment'       => '契約者種別 / Contractor Type',
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
            'insert_user_id' => [
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
        $this->forge->addKey('contractor_id', true);
        $this->forge->createTable('MST_CONTRACTOR');
	}

	public function down()
	{
        $this->forge->dropTable('MST_CONTRACTOR');
	}
}
