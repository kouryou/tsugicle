<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class LoginCheckComponent extends Component {

    public function initialize(array $config) {
         $this->Controller = $this->_registry->getController();
    }

     public function loginCheck() {
         if(!$this->Controller->Session->read('access_token.user_id')){
            $this->Controller->Flash->error('ログインしてください');
            return $this->Controller->redirect(['controller'=>'Top', 'action'=>'index']);
        }
     }
}
