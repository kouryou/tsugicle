<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class threadsController extends AppController
{
    public function overallRanking()
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find();
        $this->set([
            'threads' => $threads,
        ]);
    }
}
