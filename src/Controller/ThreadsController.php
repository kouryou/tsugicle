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

    public function newArrivals($id='', $title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $title
        ]);
    }

    public function eachGenreRanking($id='', $title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $title
        ]);
    }
}
