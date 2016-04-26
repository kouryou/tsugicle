<h1>次くる<?= h($genre->title); ?>ランキング</h1>

<a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加</a><br>

<?php foreach ($threads_array as $key => $thread_array): ?>
    <?= $key+1 ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread_array->id]); ?>"><?= h($thread_array->title); ?></a>
    <?= $tsugicles_count_array[$thread_array->id] ?>ツギクル
    <br>
<?php endforeach ?>
