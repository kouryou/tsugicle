<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TopController extends AppController
{
  public function index()
  {
      $threads = TableRegistry::get('threads');
      $threads = $threads->find();
      $this->set([
          'threads' => $threads,
          'user_id' => $this->Session->read('access_token.user_id'),
          'screen_name' => $this->Session->read('access_token.screen_name')
      ]);
  }
}
