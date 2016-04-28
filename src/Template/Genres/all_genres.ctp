<div class="list-group">
    <h1 class="list-group-item">全ジャンル</h1>
    <?php foreach ($genres as $genre): ?>
        <a class="list-group-item list-group-item-info" href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'newArrivals', $genre->id]); ?>"><?= h($genre->title); ?></a>
    <?php endforeach ?>
</div>
