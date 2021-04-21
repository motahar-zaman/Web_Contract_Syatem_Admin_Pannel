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
            'password' => [
                'type'   => 'VARCHAR',
                'constraint'=> '200',
                'null'   => false,
                'comment'=> 'パスワード / password',
            ],
            'update_date datetime NOT NULL default current_timestamp on update current_timestamp',
            'update_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '更新者 / Update By',
            ],
            'insert_date datetime NOT NULL default current_timestamp',
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
