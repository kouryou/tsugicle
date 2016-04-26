<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TopController extends AppController
{
    public $components = ['LoginCheck'];
    public function index()
    {
          $threads = TableRegistry::get('threads');
          $threads = $threads->find();

          $genres = TableRegistry::get('Genres');
          $genres = $genres->find();
          $genre_array = [];
          foreach ($genres as $genre) {
              $genre_array[$genre->id] = $genre->title;
          }
          //global試し//

              $this->set([
                  'threads' => $threads,
                  'user_id' => $this->Session->read('access_token.user_id'),
                  'screen_name' => $this->Session->read('access_token.screen_name'),
                  'genre_array' => $genre_array
              ]);
    }
}
