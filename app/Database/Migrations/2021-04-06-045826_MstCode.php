<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstCode extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'function_id'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => '機能ID / Function ID',
            ],
            'group_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => 'グループID / Group ID',
            ],
            'code_id'       => [
                'type'      => 'VARCHAR',
                'constraint'=> '20',
                'null'      => false,
                'comment'   => 'コードID / Code ID',
            ],
            'code_value'      => [
                'type'        => 'VARCHAR',
                'constraint'  => '20',
                'null'        => true,
                'comment'     => 'コード値 / Code Value',
            ],
            'function_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
                'comment'    => '機能名 / Function Name',
            ],
            'group_name'=> [
                'type'   => 'VARCHAR',
                'constraint'=> '100',
                'null'   => false,
                'comment'=> 'グループ名 / Group Name',
            ],
            'code_name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
                'comment'        => 'コード名 / Code Name',
            ],
            'sort_order'     => [
                'type'       => 'INT',
                'null'       => false,
                'comment'    => 'ソート順 / Sort Order',
            ],
            'update_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '更新日 / Update Date',
            ],
            'update_user_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => false,
                'comment'        => '更新者 / Update User ID',
            ],
            'insert_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '作成日 / Insert Date',
            ],
            'insert_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '作成者 / Insert User ID',
            ],
        ]);
        $this->forge->addKey('code_id', true);
        $this->forge->createTable('MST_CODE');
	}

	public function down()
	{
        $this->forge->dropTable('MST_CODE');
	}
}