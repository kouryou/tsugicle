<?php
use Phinx\Seed\AbstractSeed;

class InitSeed extends AbstractSeed
{
    public function run() {
        $table = $this->table('genres');
        $data = [
            ['id' => '1', 'title' => 'テスト'],
            ['id' => '2', 'title' => 'Android'],
            ['id' => '3', 'title' => 'iPhone'],
        ];
        $table->insert($data)->save();
    }
}
