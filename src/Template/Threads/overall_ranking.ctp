<h1>ツギクルランキング</h1>
<h4><span class="label label-success"><?= $collection_time->modify('+9 hour')->i18nFormat('YYYY/MM/dd HH:mm') ?> 時点</span></h4>

<?php foreach ($threads_array as $key => $thread_array): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                <?= $key+1 ?>位:
                <u><a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread_array->id]); ?>"><?= h($thread_array->title); ?></a></u>
                (<?= $genre_array[$thread_array->genre_id] ?>)
            </h3>
            <span class="badge">
                <?= $tsugicles_count_array[$thread_array->id] ?>ツギクル
            </span>
            <?= $thread_array->created->modify('+9 hour')->i18nFormat('YYYY/MM/dd HH:mm') ?>
        </div>
    </div>
<?php endforeach ?>
