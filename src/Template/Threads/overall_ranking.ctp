<p><a class="btn btn-primary" href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'selectGenreRanking']); ?>">
    ジャンル別ランキング &raquo;</a></p>

<h1>総合ランキング</h1>

<?php foreach ($threads_array as $key => $thread_array): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                <?= $key+1 ?>位:
                <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread_array->id]); ?>"><?= h($thread_array->title); ?></a>
                (<?= $genre_array[$thread_array->genre_id] ?>)
            </h3>
            <span class="badge">
                <?= $tsugicles_count_array[$thread_array->id] ?>ツギクル
            </span>
            <?= $thread_array->created ?>
        </div>
    </div>
<?php endforeach ?>
