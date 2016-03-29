<?php
namespace App\Controller;
use App\Controller\AppController;
use Abraham\TwitterOAuth\TwitterOAuth;
use Cake\Network\Http\Client;
use Cake\Routing\Router;

class TwitterController extends AppController
{
  public function index() {

      // Twitterアプリの設定画面で取得した値
      $consumer_key = 'KDTgCkBp7Je3693Rz1ABzFzOJ';
      $consumer_secret = 'OUVBPpEV3hat9bgkZC1GpEz1yI2Prrh4apcKiYNnZ8Dm84xJfa';

      // コールバックURL
      $callback = $callback = Router::url(['action'=>'callback'], true);

      // リクエストトークンを取得してセッションに保存する
      $connection = new TwitterOAuth($consumer_key, $consumer_secret);
      $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $callback));
      $this->request->session()->write('twitter.request_token', $request_token);

      // Twitterのログイン画面へリダイレクト
      $url = $connection->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));

      return $this->redirect($url);
  }


  /**
   *
   *  Twitter callback
   *
   */
  public function callback() {

      // Twitterアプリの設定で生成された値
      $consumer_key = 'KDTgCkBp7Je3693Rz1ABzFzOJ';
      $consumer_secret = 'OUVBPpEV3hat9bgkZC1GpEz1yI2Prrh4apcKiYNnZ8Dm84xJfa';

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
      $access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $oauth_verifier));

      // $access_tokenにユーザIDが設定されているのでユーザを識別するために使用できる
      // $access_token['user_id']
      // Twitterの場合は、メールアドレスが取得できない。
      // アクセストークンを取得する
      $connection = new TwitterOAuth(
          $consumer_key,
          $consumer_secret,
          $access_token['oauth_token'],
          $access_token['oauth_token_secret']
      );
      $user = $connection->get("account/verify_credentials");

      $this->set('user', $user);
  }
}
