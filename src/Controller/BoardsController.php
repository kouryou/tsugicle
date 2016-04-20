<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class BoardsController extends AppController
{
    public function index()
    {
        # ログインしていないときはTopに飛ばす
        if (!$this->Session->read('access_token.user_id')){
            return $this->redirect(['controller' => 'top']);
        }

        $this->set([
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name')
        ]);
    }

    public function add()
    {
        # ログインしていないときはTopに飛ばす
        if (!$this->Session->read('access_token.user_id')){
            return $this->redirect(['controller' => 'top']);
        }
        $boards = TableRegistry::get('Boards');
        if(isset($this->request->data['id'])){
            $boards->query()->update()
                ->set(['title' => $this->request->data['title'],
                    'description' => $this->request->data['description'],
                    'modified' => date('Y/m/d H:i:s')])
                ->where(['id' => $this->request->data['id']])
                ->execute();
            $this->Flash->set('更新しました', ['element' => 'success']);
        }else{
            $boards->query()->insert(['title', 'user_id', 'description',
            'modified', 'created'])
                ->values([
                    'title' => $this->request->data['title'],
                    'user_id' => $this->Session->read('access_token.user_id'),
                    'description' => $this->request->data['description'],
                    'modified' => date('Y/m/d H:i:s'),
                    'created' => date('Y/m/d H:i:s')
                ])->execute();
            $this->Flash->set('作成しました', ['element' => 'success']);
        }
        return $this->redirect(['controller' => 'boards', 'action'=> 'view']);
    }

    public function my()
    {
        if (!$this->Session->read('access_token.user_id')){
            return $this->redirect(['controller' => 'top']);
        }
        $boards = TableRegistry::get('Boards');
        $boards = $boards->find()->where(['user_id' => $this->Session->read('access_token.user_id')]);
        $this->set([
            'boards' => $boards,
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name')
        ]);
    }

    public function view()
    {
        $boards = TableRegistry::get('Boards');
        $boards = $boards->find();
        $this->set([
            'boards' => $boards,
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name')
        ]);
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

    public function detail($id='', $title='', $genre_title='')
    {
        $boards = TableRegistry::get('Boards');
        $boards = $boards->find()->where(['thread_id' => $id]);
        $this->set([
            'boards' => $boards,
            'thread_title' => $title,
            'genre_title' => $genre_title
        ]);
    }

}
