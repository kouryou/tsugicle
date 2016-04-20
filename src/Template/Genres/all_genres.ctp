<h1>全ジャンル</h1>

<ul>
    <?php foreach ($genres as $genre): ?>
        <li>
            <a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'newArrivals', $genre->id, $genre->title]); ?>"><?= h($genre->title); ?></a>
        </li>
    <?php endforeach ?>
</ul>
