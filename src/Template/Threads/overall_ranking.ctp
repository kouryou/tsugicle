<a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'selectGenreRanking']); ?>">ジャンル別ランキングへ</a>

<h1>総合ランキング</h1>
<?php $i=1; ?>
<?php foreach ($threads as $thread): ?>
    <?= $i; ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id, $thread->title, $thread->genre_title]); ?>"><?= h($thread->title); ?></a>
    (<?= $thread->genre_title ?>)
    <?php $i++; ?>
    <br>
<?php endforeach ?>
