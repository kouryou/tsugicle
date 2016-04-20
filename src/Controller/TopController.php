<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TopController extends AppController
{
  public function index()
  {
      $boards = TableRegistry::get('Boards');
      $boards = $boards->find();
      $this->set([
          'boards' => $boards,
          'user_id' => $this->Session->read('access_token.user_id'),
          'screen_name' => $this->Session->read('access_token.screen_name')
      ]);
  }
}
