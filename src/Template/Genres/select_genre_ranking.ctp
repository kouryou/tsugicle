<h1>ジャンル一覧</h1>

<ul>
    <?php foreach ($genres as $genre): ?>
        <li>
            <a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'eachGenreRanking', $genre->id, $genre->title]); ?>"><?= h($genre->title); ?></a>
        </li>
    <?php endforeach ?>
</ul>
