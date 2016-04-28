<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class threadsController extends AppController
{
    public $components = ['LoginCheck'];
    public $paginate = ['limit' => 20];
    public $helpers = [
        'Paginator' => ['templates' =>
            'paginator-templates']
    ];

    public function overallRanking()
    {

        $genres = TableRegistry::get('Genres');
        $genres = $genres->find();
        $genre_array = [];
        foreach ($genres as $genre) {
            $genre_array[$genre->id] = $genre->title;
        }

        $tsugicles = TableRegistry::get('Tsugicles');
        $tsugicles_count = $tsugicles->find()->select([
            'tsugicle_sum' => $tsugicles->find()->func()->sum('tsugicle'),
            'thread_id' => 'thread_id'
            ])->group('thread_id')->order(['tsugicle_sum' => 'DESC'])->limit(50);


        $tsugicles_count_array = [];
        $threads_array = [];
        $threads = TableRegistry::get('threads');
        foreach ($tsugicles_count as $tsugicle_count) {
            $tsugicles_count_array[$tsugicle_count->thread_id] = $tsugicle_count->tsugicle_sum;
            $threads_array[] = $threads->find()->where(['id' => $tsugicle_count->thread_id])->first();
        }

        $this->set([
            'threads_array' => $threads_array,
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name'),
            'genre_array' => $genre_array,
            'tsugicles_count_array' => $tsugicles_count_array
        ]);
    }

    public function newArrivals($genre_id='')
    {
        $threads = TableRegistry::get('Threads');
        $genres = TableRegistry::get('Genres');
        $genre = $genres->find()->where(['id' => $genre_id])->first();
        $threads = $threads->find()->where(['genre_id' => $genre_id])->order(['created' => 'DESC']);

        $tsugicles = TableRegistry::get('Tsugicles');
        $tsugicles_count = $tsugicles->find()->select([
            'tsugicle_sum' => $tsugicles->find()->func()->sum('tsugicle'),
            'thread_id' => 'thread_id'
            ])->group('thread_id');
        $tsugicles_count_array = [];
        foreach ($tsugicles_count as $tsugicle_count) {
            $tsugicles_count_array[$tsugicle_count->thread_id] = $tsugicle_count->tsugicle_sum;
        }

        $this->set([
            'threads' => $this->paginate($threads),
            'genre' => $genre,
            'tsugicles_count_array' => $tsugicles_count_array
        ]);
    }

    public function eachGenreRanking($genre_id='')
    {
        $threads = TableRegistry::get('Threads');
        $genres = TableRegistry::get('Genres');
        $genre = $genres->find()->where(['id' => $genre_id])->first();

        $tsugicles = TableRegistry::get('Tsugicles');
        $tsugicles_count = $tsugicles->find()->select([
            'tsugicle_sum' => $tsugicles->find()->func()->sum('tsugicle'),
            'thread_id' => 'thread_id'
            ])->group('thread_id')->order(['tsugicle_sum' => 'DESC'])->limit(500);
        $tsugicles_count_array = [];
        $threads_array = [];
        foreach ($tsugicles_count as $tsugicle_count) {
            $tsugicles_count_array[$tsugicle_count->thread_id] = $tsugicle_count->tsugicle_sum;
            if($thread_exist = $threads->find()->where(['id' => $tsugicle_count->thread_id, 'genre_id' => $genre_id])->first()){
                $threads_array[] = $thread_exist;
            }
        }

        $this->set([
            'threads_array' => $threads_array,
            'genre' => $genre,
            'tsugicles_count_array' => $tsugicles_count_array
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
