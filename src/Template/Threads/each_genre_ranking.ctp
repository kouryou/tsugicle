<h1>次くる<?= h($genre->title); ?>ランキング</h1>

<p><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加 &raquo;</a></p>

<?php foreach ($threads_array as $key => $thread_array): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                <?= $key+1 ?>位:
                <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread_array->id]); ?>"><?= h($thread_array->title); ?></a>
            </h3>
            <span class="badge">
                <?= $tsugicles_count_array[$thread_array->id] ?>ツギクル
            </span>
            <?= $thread_array->created ?>
        </div>
    </div>
<?php endforeach ?>
