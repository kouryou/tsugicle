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
          'threads' => $threads
      ]);
  }
}
