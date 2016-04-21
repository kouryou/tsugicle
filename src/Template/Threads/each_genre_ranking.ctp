<h1>次くる<?= h($genre_title); ?>ランキング</h1>

<a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre_id, $genre_title]); ?>">項目追加</a><br>


<?php foreach ($threads as $rank => $thread): ?>
    <?= $rank+1; ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id, $thread->title, $genre_title]); ?>"><?= h($thread->title); ?></a>
    <br>
<?php endforeach ?>
