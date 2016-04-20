<h1>次くる<?= $genre_title?> : <?= $thread_title ?></h1>

<h2>コメント一覧</h1>
    <?php foreach ($boards as $board): ?>
      <div class="panel panel-info">
        <div class="panel-heading"><?=$board->title ?>(投稿時間:<?=$board->created ?>)</div>
        <div class="panel-body">
          <?=$board->description ?>
        </div>
      </div>
    <?php endforeach ?>
