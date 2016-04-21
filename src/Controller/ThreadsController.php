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

    public function newArrivals($genre_id='',$genre_title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $genre_id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $genre_title,
            'genre_id' => $genre_id
        ]);
    }

    public function eachGenreRanking($genre_id='', $genre_title='')
    {
        $threads = TableRegistry::get('Threads');
        $threads = $threads->find()->where(['genre_id' => $genre_id]);
        $this->set([
            'threads' => $threads,
            'genre_title' => $genre_title,
            'genre_id' => $genre_id
        ]);
    }

    public function add($genre_id='', $genre_title='')
    {
        $this->set([
            'genre_title' => $genre_title,
            'genre_id' => $genre_id
        ]);
        if($this->request->is('post')){
            $threads = TableRegistry::get('Threads');
            if($threads->query()->insert(['title','genre_id','genre_title','modified','created'])
            ->values([
            'title' => $this->request->data['title'],
            'genre_id' => $genre_id,
            'genre_title' => $genre_title,
            'modified' => date('Y/m/d H:i:s'),
            'created' => date('Y/m/d H:i:s')
            ])->execute()){
                $this->Flash->success('投稿しました');
                return $this->redirect(['controller'=>'Threads', 'action'=>'newArrivals', $genre_id, $genre_title]);
            } else {
                $this->Flash->error('投稿に失敗しました');
            }
        }
    }
}
