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

      $genres = TableRegistry::get('Genres');
      $genres = $genres->find();
      $genre_array = [];
      foreach ($genres as $genre) {
          $genre_array[$genre->id] = $genre->title;
      }

      $tsugicles = TableRegistry::get('Tsugicles');

      if($this->request->is('post')){
          if(!$this->Session->read('access_token.user_id')){
              $this->Flash->error('ログインしてください');
              return $this->redirect(['controller'=>'Top', 'action'=>'index']);
          }else{
              if(
              $tsugicle_exist = $tsugicles->find()->where([
                  'user_id' => $this->Session->read("access_token.user_id"), 'thread_id' => $this->request->data['thread_id']
                  ])
                  ->first()){
                  $tsugicle = !($tsugicle_exist->tsugicle);
                  $tsugicles->query()->update()
                    ->set([
                        'tsugicle' => $tsugicle,
                        'modified' => date('Y/m/d H:i:s')
                    ])
                    ->where(['user_id' => $this->Session->read("access_token.user_id"), 'thread_id' => $this->request->data['thread_id']])
                    ->execute();
              }else{
                  $tsugicles->query()->insert(['user_id', 'thread_id', 'tsugicle', 'modified', 'created'])
                  ->values([
                      'user_id' => $this->Session->read('access_token.user_id'),
                      'thread_id' => $this->request->data['thread_id'],
                      'tsugicle' => true,
                      'modified' => date('Y/m/d H:i:s'),
                      'created' => date('Y/m/d H:i:s')
                  ])->execute();
              }
          }
      }

      $tsugicles_user = $tsugicles->find()->where(['user_id' => $this->Session->read("access_token.user_id"), 'tsugicle' => true]);
      $tsugicles_array = [];
      foreach($tsugicles_user as $tsugicle_user){
          $tsugicles_array[] = $tsugicle_user->thread_id;
      }

          $this->set([
              'threads' => $threads,
              'user_id' => $this->Session->read('access_token.user_id'),
              'screen_name' => $this->Session->read('access_token.screen_name'),
              'tsugicles_array' => $tsugicles_array,
              'genre_array' => $genre_array
          ]);
    }
}
