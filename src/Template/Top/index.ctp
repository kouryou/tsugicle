<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="page-header">
        <h1>ツギクル <small>トレンド先どり投稿サイト</small></h1>
    </div>
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
                       <u><a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a></u>
                       (<?= $genre_array[$thread->genre_id] ?>)
                   </h3>
                       <span class="badge">
                           <?php if(isset($tsugicles_count_array[$thread->id])){
                               echo $tsugicles_count_array[$thread->id];
                           }else{
                               echo "0";
                           } ?>ツギクル
                       </span>
                   <?= $thread->created->modify('+9 hour')->i18nFormat('YYYY/MM/dd HH:mm') ?>
                   <span class="label label-info"><?= $thread->tag ?></span>
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
