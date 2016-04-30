<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class BoardsController extends AppController
{
    public $components = ['LoginCheck'];

    public $paginate = ['limit' => 20];
    public $helpers = [
        'Paginator' => ['templates' =>
            'paginator-templates']
    ];

    public function add($thread_id='')
    {
        $this->set([
            'thread_id' => $thread_id,
        ]);

        $this->LoginCheck->loginCheck();

        if($this->request->is('post')){
            $boards = TableRegistry::get('Boards');
            $threads = TableRegistry::get('Threads');
            $validator = new Validator();
            $validator->add('description','length',['rule'=>['maxLength',500]]);
            $errors = $validator->errors($this->request->data);
            if(empty($errors)){
                if($boards->query()->insert(['user_id', 'thread_id', 'description', 'modified', 'created'])
                    ->values([
                    'user_id' => $this->Session->read('access_token.user_id'),
                    'thread_id' => $thread_id,
                    'description' => $this->request->data['description'],
                    'modified' => date('Y/m/d H:i:s'),
                    'created' => date('Y/m/d H:i:s')
                    ])->execute()){
                    $this->Flash->success('投稿しました');
                    return $this->redirect(['controller'=>'Boards', 'action'=>'detail', $thread_id]);
                } else {
                    $this->Flash->error('投稿に失敗しました');
                }
            }else{
            $this->Flash->error('500文字以内してください');
            }
        }
    }

    public function detail($thread_id='')
    {
        $boards = TableRegistry::get('Boards');
        $threads = TableRegistry::get('Threads');
        $thread = $threads->find()->where(['id' => $thread_id])->first();
        $tsugicles = TableRegistry::get('Tsugicles');
        $goods = TableRegistry::get('Goods');
        $boards = $boards->find()->where(['thread_id' => $thread_id]);

        $tsugicles_user = $tsugicles->find()->where([
            'user_id' => $this->Session->read("access_token.user_id"), 'thread_id' => $thread_id, 'tsugicle' => true
        ])->first();

        $goods_user = $goods->find()->where(['user_id' => $this->Session->read("access_token.user_id"), 'good' => true]);
        $goods_array = [];
        foreach($goods_user as $good_user){
            $goods_array[] = $good_user->board_id;
        }

        $goods_count = $goods->find()->select([
            'good_sum' => $goods->find()->func()->sum('good'),
            'board_id' => 'board_id'
            ])->group('board_id');
        $goods_count_array = [];
        foreach ($goods_count as $good_count) {
            $goods_count_array[$good_count->board_id] = $good_count->good_sum;
        }

        $this->set([
            'boards' => $this->paginate($boards),
            'thread' => $thread,
            'tsugicles_user' => $tsugicles_user,
            'goods_array' => $goods_array,
            'goods_count_array' => $goods_count_array
        ]);
    }

    public function changeTsugicle($thread_id = '')
    {
        $tsugicles = TableRegistry::get('Tsugicles');
        if(!$this->LoginCheck->loginCheck()){
            if(
            $tsugicle_exist = $tsugicles->find()->where([
                'user_id' => $this->Session->read("access_token.user_id"), 'thread_id' => $thread_id
            ])
            ->first()){
                $tsugicle = !($tsugicle_exist->tsugicle);
                $tsugicles->query()->update()
                ->set([
                    'tsugicle' => $tsugicle,
                    'modified' => date('Y/m/d H:i:s')
                ])
                ->where(['user_id' => $this->Session->read("access_token.user_id"), 'thread_id' => $thread_id ])
                ->execute();
            }else{
                $tsugicles->query()->insert(['user_id', 'thread_id', 'tsugicle', 'modified', 'created'])
                ->values([
                    'user_id' => $this->Session->read('access_token.user_id'),
                    'thread_id' => $thread_id,
                    'tsugicle' => true,
                    'modified' => date('Y/m/d H:i:s'),
                    'created' => date('Y/m/d H:i:s')
                    ])->execute();
            }
            $this->redirect(['controller'=>'Boards', 'action'=>'detail', $thread_id]);
        }
    }


    public function changeGood($thread_id='') {
        $goods = TableRegistry::get('Goods');
        if(!$this->LoginCheck->loginCheck()){
            if(
                $good_exist = $goods->find()->where([
                    'user_id' => $this->Session->read("access_token.user_id"), 'board_id' => $this->request->data['board_id']
                    ])
                    ->first()){
                $good = !($good_exist->good);
                $goods->query()->update()
                  ->set([
                      'good' => $good,
                      'modified' => date('Y/m/d H:i:s')
                  ])
                  ->where(['user_id' => $this->Session->read("access_token.user_id"), 'board_id' => $this->request->data['board_id']])
                  ->execute();
            }else{
                $goods->query()->insert(['user_id', 'board_id', 'good', 'modified', 'created'])
                ->values([
                    'user_id' => $this->Session->read('access_token.user_id'),
                    'board_id' => $this->request->data['board_id'],
                    'good' => true,
                    'modified' => date('Y/m/d H:i:s'),
                    'created' => date('Y/m/d H:i:s')
                ])->execute();
            }
            $this->redirect(['controller'=>'Boards', 'action'=>'detail', $thread_id]);
        }
    }
}
