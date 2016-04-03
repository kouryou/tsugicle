<?php foreach ($boards as $board): ?>
  <div class="panel panel-default">
    <div class="panel-heading"><?=$board->title ?>(投稿時間:<?=$board->created_at ?>)</div>
    <div class="panel-body">
      <?=$board->description ?>
    </div>
    <div class="panel-footer">
      <a class="btn btn-default" href="<?php echo $this->Url->build('/board/edit/' . $board->id); ?>" role="button">編集</a>
      <a class="btn btn-danger" href="<?php echo $this->Url->build('/board/delete/' . $board->id); ?>" role="button">削除</a>
    </div>
  </div>
<?php endforeach ?>
