<?php
namespace App\Controller;
use App\Controller\AppController;

class TopController extends AppController
{
  public function index($a = '', $b = '')
  {
      $this->set([
          'user_id' => $this->Session->read('access_token.user_id'),
          'screen_name' => $this->Session->read('access_token.screen_name')
      ]);
  }
}
