<?php
use Phinx\Seed\AbstractSeed;

class InitSeed extends AbstractSeed
{
    public function run() {
        $table = $this->table('genres');
        $data = [
            ['id' => '1', 'title' => '芸能'],
            ['id' => '2', 'title' => 'ファッション'],
            ['id' => '3', 'title' => '趣味'],
            ['id' => '4', 'title' => '2次元'],
            ['id' => '5', 'title' => 'アプリ・ゲーム'],
            ['id' => '6', 'title' => '音楽'],
            ['id' => '7', 'title' => '美容・健康'],
            ['id' => '8', 'title' => 'グルメ・料理'],
            ['id' => '9', 'title' => 'ライフスタイル'],
            ['id' => '10', 'title' => '本・雑誌'],
            ['id' => '11', 'title' => 'デジタル・家電'],
            ['id' => '12', 'title' => 'ビジネス・経済'],
            ['id' => '13', 'title' => '地域'],
            ['id' => '14', 'title' => 'スポーツ'],
            ['id' => '15', 'title' => 'その他'],
        ];
        $table->insert($data)->save();
    }
}
