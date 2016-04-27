<h1>次くる<?= h($genre->title); ?></h1>

<a href="<?= $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre->id]); ?>">項目追加</a><br>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'detail', $thread->id]); ?>"><?= h($thread->title); ?></a>
            <?php if(isset($tsugicles_count_array[$thread->id])){
                echo $tsugicles_count_array[$thread->id];
            }else{
                echo "0";
            } ?>ツギクル
        </li>
    <?php endforeach ?>
</ul>

<ul class="pagination">
    <li><?= $this->Paginator->first('<<'); ?></li>
    <li><?= $this->Paginator->prev('<'); ?></li>
    <li><?= $this->Paginator->numbers(); ?></li>
    <li><?= $this->Paginator->next('>'); ?></li>
    <li><?= $this->Paginator->last('>>'); ?></li>
</ul>
