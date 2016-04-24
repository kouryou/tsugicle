<?php
use Phinx\Seed\AbstractSeed;

class InitSeed extends AbstractSeed
{
    public function run() {
        $table = $this->table('genres');
        $data = [
            ['id' => '1', 'title' => 'アプリ'],
            ['id' => '2', 'title' => '芸人'],
            ['id' => '3', 'title' => 'マンガ'],
        ];
        $table->insert($data)->save();
    }
}
