<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class BoardsController extends AppController
{
    public function add($thread_id='')
    {
        $this->set([
            'thread_id' => $thread_id,
        ]);
        
        if(!$this->Session->read('access_token.user_id')){
            $this->Flash->error('投稿するにはログインする必要があります');
            return $this->redirect(['controller'=>'Top', 'action'=>'index']);
        }

        if($this->request->is('post')){
            $boards = TableRegistry::get('Boards');
            $threads = TableRegistry::get('Threads');
            $validator = new Validator();
            $validator->add('description','length',['rule'=>['maxLength',500]]);
            $errors = $validator->errors($this->request->data);
            if(empty($errors)){
                if($boards->query()->insert(['description', 'thread_id', 'modified', 'created'])
                    ->values([
                    'description' => $this->request->data['description'],
                    'thread_id' => $thread_id,
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

    public function edit($id = '')
    {
        $boards = TableRegistry::get('Boards');
        $board = $boards->find()->where(['id' => $id])->first();
        $this->set([
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name'),
            'board' => $board
        ]);
        $this->render('index');
    }

    public function delete($id = '')
    {
        $boards = TableRegistry::get('Boards');
        $this->Flash->set('削除しました', ['element' => 'success']);
        $boards->query()->delete()->where(['id' => $id])->execute();
        return $this->redirect(['controller' => 'boards', 'action'=> 'view']);
    }

    public function detail($thread_id='')
    {
        $boards = TableRegistry::get('Boards');
        $threads = TableRegistry::get('Threads');
        $thread = $threads->find()->where(['id' => $thread_id])->first();
        $boards = $boards->find()->where(['thread_id' => $thread_id]);
        $this->set([
            'boards' => $boards,
            'thread' => $thread
        ]);
    }
}
