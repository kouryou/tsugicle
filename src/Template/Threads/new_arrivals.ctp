<h1>次くる<?= h($genre->title); ?></h1>

<p><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加 &raquo;</a></p>

<?php foreach ($threads as $thread): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                <u><a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a></u>
            </h3>
            <span class="badge">
                <?php if(isset($tsugicles_count_array[$thread->id])){
                    echo $tsugicles_count_array[$thread->id];
                }else{
                    echo "0";
                } ?>ツギクル
            </span>
            <?= $thread->created->modify('+9 hour')->i18nFormat('YYYY/MM/dd HH:mm') ?>
        </div>
    </div>
<?php endforeach ?>

<ul class="pagination">
    <li><?= $this->Paginator->first('<<'); ?></li>
    <li><?= $this->Paginator->prev('<'); ?></li>
    <li><?= $this->Paginator->numbers(); ?></li>
    <li><?= $this->Paginator->next('>'); ?></li>
    <li><?= $this->Paginator->last('>>'); ?></li>
</ul>
