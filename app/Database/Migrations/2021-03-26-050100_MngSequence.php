<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MngSequence extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'prefix'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null'           => false,
                'comment'        => 'プレフィックス / Prefix',
            ],
            'sequence'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
                'comment'    => 'シーケンス / sequence',
            ],
            'increment' => [
                'type'   => 'VARCHAR',
                'constraint'=> '20',
                'null'   => false,
                'comment'=> '増加値 / Increase value',
            ],
        ]);
        $this->forge->addKey('prefix', true);
        $this->forge->createTable('mng_sequence');
	}

	public function down()
	{
		$this->forge->dropTable('mng_sequence');
	}
}
