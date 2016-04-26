<a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'selectGenreRanking']); ?>">ジャンル別ランキングへ</a>

<h1>総合ランキング</h1>
<?php foreach ($threads as $key => $thread): ?>
    <?= $key+1 ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
    (<?= $genre_array[$thread->genre_id] ?>)
    <br>
<?php endforeach ?>
