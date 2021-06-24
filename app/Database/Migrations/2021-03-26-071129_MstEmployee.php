<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstEmployee extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'employee_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '社員ID / Employee ID',
            ],
            'employee_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'comment'    => '社員名 / Employee Name',
            ],
            'employee_name_kana' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> '社員名カナ / Employee Name Kana',
            ],
            'mail_address' => [
                'type'   => 'VARCHAR',
                'constraint'=> '500',
                'null'      => true,
                'comment'=> 'メールアドレス / Mail Address',
            ],
            'password' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> 'パスワード / password',
            ],
            'department' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '部署コード / Department Code',
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
                'comment'=> '更新者 / Update By',
            ],
            'insert_date'          => [
                'type'           => 'DATETIME',
                'null'           => false,
                'comment'        => '作成日 / Create Date',
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
        $this->forge->addKey('employee_id', true);
        $this->forge->createTable('MST_EMPLOYEE');
	}

	public function down()
	{
        $this->forge->dropTable('MST_EMPLOYEE');
	}
}
