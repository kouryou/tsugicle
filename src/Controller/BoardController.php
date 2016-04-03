<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class BoardController extends AppController
{
    public function index($a = '', $b = '')
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

        $boards = TableRegistry::get('Board');
        $boards->query()->insert(['title', 'user_id', 'description',
        'updated_at', 'created_at'])
            ->values([
                'title' => $this->request->data['title'],
                'user_id' => $this->Session->read('access_token.user_id'),
                'description' => $this->request->data['description'],
                'updated_at' => date('Y/m/d H:i:s'),
                'created_at' => date('Y/m/d H:i:s')
            ])->execute();
        return $this->redirect(['controller' => 'board', 'action'=> 'view']);
    }

    public function my()
    {
        if (!$this->Session->read('access_token.user_id')){
            return $this->redirect(['controller' => 'top']);
        }
        $boards = TableRegistry::get('Board');
        $boards = $boards->find()->where(['user_id' => $this->Session->read('access_token.user_id')]);
        $this->set([
            'boards' => $boards,
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name')
        ]);
    }

    public function view()
    {
        $boards = TableRegistry::get('Board');
        $boards = $boards->find();
        $this->set([
            'boards' => $boards,
            'user_id' => $this->Session->read('access_token.user_id'),
            'screen_name' => $this->Session->read('access_token.screen_name')
        ]);
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
