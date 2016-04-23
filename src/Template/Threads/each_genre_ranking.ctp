<h1>次くる<?= h($genre->title); ?>ランキング</h1>

<a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加</a><br>

<?php foreach ($threads as $key => $thread): ?>
    <?= $key+1 ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
    <br>
<?php endforeach ?>
