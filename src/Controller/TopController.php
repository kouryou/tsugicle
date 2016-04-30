<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TopController extends AppController
{
    public $components = ['LoginCheck'];
    public $paginate = ['limit' => 20];
    public $helpers = [
        'Paginator' => ['templates' =>
            'paginator-templates']
    ];

    public function index()
    {
          $threads = TableRegistry::get('threads');
          $threads = $threads->find()->order(['created' => 'DESC']);

          $genres = TableRegistry::get('Genres');
          $genres = $genres->find();
          $genre_array = [];
          foreach ($genres as $genre) {
              $genre_array[$genre->id] = $genre->title;
          }

          $tsugicles = TableRegistry::get('Tsugicles');
          $tsugicles_count = $tsugicles->find()->select([
              'tsugicle_sum' => $tsugicles->find()->func()->sum('tsugicle'),
              'thread_id' => 'thread_id'
              ])->group('thread_id');
          $tsugicles_count_array = [];
          foreach ($tsugicles_count as $tsugicle_count) {
              $tsugicles_count_array[$tsugicle_count->thread_id] = $tsugicle_count->tsugicle_sum;
          }

          $this->set([
              'threads' => $this->paginate($threads),
              'user_id' => $this->Session->read('access_token.user_id'),
              'screen_name' => $this->Session->read('access_token.screen_name'),
              'genre_array' => $genre_array,
              'tsugicles_count_array' => $tsugicles_count_array
          ]);
    }
    
}
