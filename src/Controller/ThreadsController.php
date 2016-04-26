<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class threadsController extends AppController
{
    public $components = ['LoginCheck'];

    public function overallRanking()
    {
        $threads = TableRegistry::get('threads');
        $threads = $threads->find();

        $genres = TableRegistry::get('Genres');
        $genres = $genres->find();
        $genre_array = [];
        foreach ($genres as $genre) {
            $genre_array[$genre->id] = $genre->title;
        }

            $this->set([
                'threads' => $threads,
                'user_id' => $this->Session->read('access_token.user_id'),
                'screen_name' => $this->Session->read('access_token.screen_name'),
                'genre_array' => $genre_array
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

        $this->LoginCheck->loginCheck();

        if($this->request->is('post')){
            $threads = TableRegistry::get('Threads');
            $genres = TableRegistry::get('Genres');
            $validator = new Validator();
            $validator->add('title','length',['rule'=>['maxLength',30]]);
            $errors = $validator->errors($this->request->data);
            if(empty($errors)){
                $genre = $genres->find()->where(['id' => $genre_id])->first();
                if($threads->query()->insert(['user_id', 'genre_id', 'title', 'modified', 'created'])
                    ->values([
                    'user_id' => $this->Session->read('access_token.user_id'),
                    'genre_id' => $genre_id,
                    'title' => $this->request->data['title'],
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
