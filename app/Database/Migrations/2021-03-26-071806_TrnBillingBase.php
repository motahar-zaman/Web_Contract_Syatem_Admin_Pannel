<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrnBillingBase extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'billing_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '請求ID / Invoice ID',
            ],
            'contract_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => '契約ID / Contract ID',
            ],
            'product_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '商品ID / Product ID',
            ],
            'product_branch_no' => [
                'type'   => 'INTEGER',
                'constraint'=> 10,
                'null'   => false,
                'comment'=> '商品枝番 / Product Branch Number',
            ],
            'bill_zipcode' => [
                'type'   => 'INTEGER',
                'constraint'=> 20,
                'null'   => true,
                'comment'=> '請求先郵便番号 / Invoice Postal Code',
            ],
            'bill_address_01' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '請求先住所０１ / Invoice Address 01',
            ],
            'bill_address_02' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '請求先住所０２ / Invoice Address 02',
            ],
            'bill_tel_no' => [
                'type'   => 'INTEGER',
                'constraint'=> 13,
                'null'   => true,
                'comment'=> '請求先電話番号 / Invoice Phone Number',
            ],
            'bill_fax_no' => [
                'type'   => 'INTEGER',
                'constraint'=> 13,
                'null'   => true,
                'comment'=> '請求先FAX番号 / Invoice FAX Number',
            ],
            'bill_mail_address' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '請求先メールアドレス / Invoice Mail Address',
            ],
            'bill_to_name' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '請求先名 / Invoice Name',
            ],
            'bill_to_name_kana' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '請求先名カナ / Invoice Name - Kana',
            ],
            'receipt_name' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '領収書名 / Receipt Name',
            ],
            'receipt_name_kana' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'   => true,
                'comment'=> '領収書名カナ / Receipt Name - Kana',
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
                'comment'=> '削除フラグ / Delete Flag',
            ],

        ]);
        $this->forge->addKey('billing_id', true);
        $this->forge->createTable('TRN_BILLING_BASE');
	}

	public function down()
	{
        $this->forge->dropTable('TRN_BILLING_BASE');
	}
}
