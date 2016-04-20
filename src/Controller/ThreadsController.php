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

    public function newArrivals($id='',$genre_title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $genre_title
        ]);
    }

    public function eachGenreRanking($id='', $genre_title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $genre_title
        ]);
    }
}
