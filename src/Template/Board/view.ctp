<?php foreach ($boards as $board): ?>
  <div class="panel panel-default">
    <div class="panel-heading"><?=$board->title ?>(投稿時間:<?=$board->created_at ?>)</div>
    <div class="panel-body">
      <?=$board->description ?>
    </div>
  </div>
<?php endforeach ?>
