<?php
namespace App\Controller;
use App\Controller\AppController;
use Abraham\TwitterOAuth\TwitterOAuth;
use Cake\Network\Http\Client;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\ORM\TableRegistry;

class TwitterController extends AppController
{
    public function index() {
        // Twitterアプリの設定画面で取得した値
        $consumer_key = Configure::read('twitter.consumer_key');
        $consumer_secret = Configure::read('twitter.consumer_secret');
        // コールバックURL
        $callback = $callback = Router::url(['action'=>'callback'], true);
        // リクエストトークンを取得してセッションに保存する
        $connection = new TwitterOAuth($consumer_key, $consumer_secret);
        $request_token = $connection->oauth('oauth/request_token',
            array('oauth_callback' => $callback));
        $this->request->session()->write('twitter.request_token', $request_token);
        // Twitterのログイン画面へリダイレクト
        $url = $connection->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));
        return $this->redirect($url);
    }

    public function callback() {
        $consumer_key = Configure::read('twitter.consumer_key');
        $consumer_secret = Configure::read('twitter.consumer_secret');
        // URLパラメータを取得する
        $oauth_token =    $this->request->query('oauth_token');
        $oauth_verifier = $this->request->query('oauth_verifier');
        // セッションに保存したリクエストトークンを取得する
        $request_token = $this->request->session()->read('twitter.request_token');
        // アクセストークンを取得する
        $connection = new TwitterOAuth(
            $consumer_key,
            $consumer_secret,
            $request_token['oauth_token'],
            $request_token['oauth_token_secret']
        );
        $access_token = $connection->oauth('oauth/access_token',
        array('oauth_verifier' => $oauth_verifier));
        $this->Session->write('access_token', $access_token);

        $users = TableRegistry::get('Users');
        //ユーザーがあった場合はupdate
        if($users->find()->where(['id' => $access_token['user_id']])->first()){
            $users->query()->update()
            ->set(['screen_name' => $access_token['screen_name'],
            'modified' => date('Y/m/d H:i:s')])
            ->where(['id' => $access_token['user_id']])
            ->execute();
        }else{
            $users->query()->insert(['id', 'screen_name', 'oauth_token',
            'oauth_token_secret', 'modified', 'created'])
            ->values([
                'id' => $access_token['user_id'],
                'screen_name' => $access_token['screen_name'],
                'oauth_token' => $access_token['oauth_token'],
                'oauth_token_secret' => $access_token['oauth_token_secret'],
                'modified' => date('Y/m/d H:i:s'),
                'created' => date('Y/m/d H:i:s')
                ])->execute();
        }
        return $this->redirect(['controller' => 'top']);
    }

    public function logout() {
        $this->Session->write('access_token', []);
        return $this->redirect(['controller' => 'top']);
    }
}
