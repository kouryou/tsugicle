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
   <ul>
       <?php foreach ($threads as $thread): ?>
           <li>
               <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
               (<?= $genre_array[$thread->genre_id] ?>)
               <form method="post">
                   <input type="hidden" name="thread_id" value="<?= $thread->id ?>">
                   <button type="submit" class="
                   <?php if(isset($tsugicles_array)){
                       if(in_array($thread->id, $tsugicles_array)){
                           echo "btn btn-warning";
                       }else{
                           echo "btn btn-default";
                       }}else{
                           echo "btn btn-default";
                       }?>">ツギクル</button>
               </form>
           </li>
       <?php endforeach ?>
   </ul>
</div>
