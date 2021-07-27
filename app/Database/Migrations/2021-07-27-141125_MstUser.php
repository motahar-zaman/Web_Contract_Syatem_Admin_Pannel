<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstUser extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'comment' => 'ユーザID / User ID',
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => false,
                'comment' => 'ユーザ名 / User Name',
            ],
            'user_name_kana' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => false,
                'comment' => 'ユーザ名カナ / User Name Kana',
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => false,
                'comment' => 'パスワード / Password',
            ],
            'zipcode' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'comment' => '郵便番号 / Postal Code',
            ],
            'address_01' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => false,
                'comment' => '住所０１ / Address 01',
            ],
            'address_02' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
                'comment' => '住所０２ / Address 02',
            ],
            'tel_no' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => false,
                'comment' => '電話番号 / Phone Number',
            ],
            'fax_no' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => true,
                'comment' => 'FAX番号 / FAX Number',
            ],
            'mail_address' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true,
                'comment' => 'メールアドレス / Mail Address',
            ],
            'update_date' => [
                'type' => 'DATETIME',
                'null' => false,
                'comment' => '更新日 Update Date',
            ],
            'update_user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
                'comment' => '更新者 / Update By',
            ],
            'insert_date' => [
                'type' => 'DATETIME',
                'null' => false,
                'comment' => '作成日 / Create Date',
            ],
            'insert_user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
                'comment' => '作成者 / Create By',
            ],
            'delete_flag' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'comment' => '削除フラグ / Delete Flag',
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('mst_user');
	}

	public function down()
	{
        $this->forge->dropTable('mst_user');
	}
}
