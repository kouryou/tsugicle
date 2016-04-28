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
       <?php foreach ($threads as $thread): ?>
           <div class="panel panel-info">
               <div class="panel-heading">
                   <h3>
                       <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
                       (<?= $genre_array[$thread->genre_id] ?>)
                   </h3>
                       <span class="badge">
                           <?php if(isset($tsugicles_count_array[$thread->id])){
                               echo $tsugicles_count_array[$thread->id];
                           }else{
                               echo "0";
                           } ?>ツギクル
                       </span>
                   <?= $thread->created ?>
               </div>
           </div>
       <?php endforeach ?>
   <ul class="pagination">
       <li><?= $this->Paginator->first('<<'); ?></li>
       <li><?= $this->Paginator->prev('<'); ?></li>
       <li><?= $this->Paginator->numbers(); ?></li>
       <li><?= $this->Paginator->next('>'); ?></li>
       <li><?= $this->Paginator->last('>>'); ?></li>
   </ul>
</div>
