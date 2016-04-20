<h1>次くる<?= h($genre_title); ?>ランキング</h1>

<?php $i=1; ?>
<?php foreach ($threads as $thread): ?>
    <?= $i . '位:'; ?>
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id, $thread->title, $genre_title]); ?>"><?= h($thread->title); ?></a>
    <?php $i++; ?>
    <br>
<?php endforeach ?>
