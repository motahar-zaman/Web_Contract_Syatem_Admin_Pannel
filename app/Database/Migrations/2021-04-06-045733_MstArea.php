<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MstArea extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'area_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => 'エリアID',
            ],
            'district_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => '地方ID',
            ],
            'prefecture_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => '都道府県ID',
            ],
            'large_area_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
                'comment'        => '大エリアID',
            ],
            'small_area_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => true,
                'comment'        => '小エリアID',
            ],
            'area_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
                'comment'    => '名称',
            ],
            'area_areas'=> [
                'type'   => 'VARCHAR',
                'constraint'=> '100',
                'null'   => false,
                'comment'=> '名称略',
            ],
            'sort_order'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => false,
                'comment'        => '表示順',
            ],
            'update_date' => [
                'type'   => 'DATETIME',
                'null'   => false,
                'comment'=> '更新日',
            ],
            'update_user_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => false,
                'comment'        => '更新者',
            ],
            'insert_date'       => [
                'type'       => 'DATETIME',
                'null'       => false,
                'comment'    => '作成日',
            ],
            'insert_user_id' => [
                'type'   => 'VARCHAR',
                'constraint'=> '15',
                'null'   => false,
                'comment'=> '作成者',
            ],
            'delete_flag'          => [
                'type'           => 'BOOLEAN',
                'null'           => false,
                'comment'        => '削除フラグ',
            ],
        ]);
        $this->forge->addKey('area_id', true);
        $this->forge->createTable('MST_AREA');
	}

	public function down()
	{
        $this->forge->dropTable('MST_AREA');
	}
}