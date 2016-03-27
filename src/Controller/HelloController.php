<?php
namespace App\Controller;
use App\Controller\AppController;

class HelloController extends AppController
{
  public function index($a = '', $b = '')
  {
  }

  public function err()
  {
      $this->autoRender = false;
      echo "<html><head></head><body>";
      echo "<h1>Hello!</h1>";
      echo "<p>パラメータがありませんでした</p>";
      echo "</body></html>";
  }
}
