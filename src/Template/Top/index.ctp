<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>ツギクルへようこそ</h1>
  <?php if(isset($user_id)): ?>
      <p><?=$screen_name ?> さんこんにちは</p>
      <a class="btn btn-lg btn-primary" href="<?php echo $this->Url->build(['controller'=>'Twitter', 'action'=>'logout']); ?>" role="button">ログアウト &raquo;</a>
   <?php else: ?>
      <p> ログインする </p>
      <a class="btn btn-lg btn-primary" href="<?php echo $this->Url->build(['controller'=>'Twitter', 'action'=>'index']); ?>" role="button">Twitter認証 &raquo;</a>
   <?php endif; ?>

   <h2>新着投稿</h2>
   <?php foreach ($boards as $board): ?>
     <div class="panel panel-info">
       <div class="panel-heading"><?=$board->title ?>(投稿時間:<?=$board->created ?>)</div>
       <div class="panel-body">
         <?=$board->description ?>
       </div>
     </div>
   <?php endforeach ?>
</div>
