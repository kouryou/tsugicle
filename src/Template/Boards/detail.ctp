<h1><?= $thread->title ?></h1>

<h2>コメント一覧</h1>
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'add', $thread->id]); ?>">コメント追加</a><br>

    <?php foreach ($boards as $board): ?>
        <div class="panel panel-info">
            <div class="panel-heading">(投稿時間:<?=$board->created ?>)</div>
            <div class="panel-body">
                <?= nl2br(h($board->description)) ?>
            </div>
        </div>
    <?php endforeach ?>
