<a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'selectGenreRanking']); ?>">ジャンル別ランキングへ</a>

<h1>総合ランキング</h1>
<?php foreach ($threads_array as $key => $thread_array): ?>
    <?= $key+1 ?>位:
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread_array->id]); ?>"><?= h($thread_array->title); ?></a>
    (<?= $genre_array[$thread_array->genre_id] ?>)
    <?= $tsugicles_count_array[$thread_array->id] ?>ツギクル
    <br>
<?php endforeach ?>
