<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

class RankingShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Tsugicles');
    }

    public function overallRanking()
    {
        $collection_time = date('Y/m/d H:i:s');
        $tsugicles = TableRegistry::get('Tsugicles');
        $tsugicles_count = $tsugicles->find()->select([
            'tsugicle_sum' => $tsugicles->find()->func()->sum('tsugicle'),
            'thread_id' => 'thread_id'
            ])->group('thread_id')->order(['tsugicle_sum' => 'DESC'])->limit(100);

        $rankings = TableRegistry::get('Rankings');
        foreach ($tsugicles_count as $tsugicle_count){
            $rankings->query()->insert(['tsugicle_sum', 'thread_id', 'collection_time'])
                ->values([
                'tsugicle_sum' => $tsugicle_count->tsugicle_sum,
                'thread_id' => $tsugicle_count->thread_id,
                'collection_time' => $collection_time,
                ])->execute();
        }

        $constants = TableRegistry::get('Constants');
        $constants->query()->insert(['key_column', 'value_column'])
            ->values([
                'key_column' => 'collection_time',
                'value_column' => $collection_time
            ])->execute();
    }
}
