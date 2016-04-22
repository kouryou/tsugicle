<h1>次くる<?= h($genre->title); ?></h1>

<a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加</a><br>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
        </li>
    <?php endforeach ?>
</ul>
