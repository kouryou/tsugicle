<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

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

    public function newArrivals($genre_id='')
    {
        $threads = TableRegistry::get('Threads');
        $genres = TableRegistry::get('Genres');
        $genre = $genres->find()->where(['id' => $genre_id])->first();
        $threads = $threads->find()->where(['genre_id' => $genre_id]);
        $this->set([
            'threads' => $threads,
            'genre' => $genre
        ]);
    }

    public function eachGenreRanking($genre_id='')
    {
        $threads = TableRegistry::get('Threads');
        $genres = TableRegistry::get('Genres');
        $genre = $genres->find()->where(['id' => $genre_id])->first();
        $threads = $threads->find()->where(['genre_id' => $genre_id]);
        $this->set([
            'threads' => $threads,
            'genre' => $genre
        ]);
    }

    public function add($genre_id='')
    {
        $this->set([
            'genre_id' => $genre_id
        ]);
        if($this->request->is('post')){
            $threads = TableRegistry::get('Threads');
            $genres = TableRegistry::get('Genres');
            $validator = new Validator();
            $validator->add('title','length',['rule'=>['maxLength',30]]);
            $errors = $validator->errors($this->request->data);
            if(empty($errors)){
                $genre = $genres->find()->where(['id' => $genre_id])->first();
                if($threads->query()->insert(['title','genre_id','genre_title','modified','created'])
                    ->values([
                    'title' => $this->request->data['title'],
                    'genre_id' => $genre_id,
                    'genre_title' => $genre->title,
                    'modified' => date('Y/m/d H:i:s'),
                    'created' => date('Y/m/d H:i:s')
                    ])->execute()){
                    $this->Flash->success('投稿しました');
                    return $this->redirect(['controller'=>'Threads', 'action'=>'newArrivals', $genre_id]);
                } else {
                    $this->Flash->error('投稿に失敗しました');
                }
            }else{
                $this->Flash->error('30文字以内してください');
            }
        }
    }
}
