<h1>次くる<?= h($genre_title); ?></h1>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id, $thread->title, $genre_title]); ?>"><?= h($thread->title); ?></a>
        </li>
    <?php endforeach ?>
</ul>
