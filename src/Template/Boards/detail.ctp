<div class="jumbotron">
    <h1><?= $thread->title ?></h1>
    <form method="post" action="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'changeTsugicle', $thread->id]); ?>">
            <input type="hidden" name="tsugicle" value="true">
            <button type="submit" class="
            <?php if(isset($tsugicles_user)){
                    echo "btn btn-warning";
                }else{
                    echo "btn btn-default";
                }?>">ツギクル</button>
    </form>
</div>

<div>
    <h2>コメント一覧</h2>
    <p><a class="btn btn-sm btn-primary" href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'add', $thread->id]); ?>">コメント追加 &raquo;</a></p>

    <?php foreach ($boards as $board): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <?=$board->created ?>
                <span class="badge">
                    <?php if(isset($goods_count_array[$board->id])){
                        echo $goods_count_array[$board->id];
                    }else{
                        echo "0";
                    } ?>いいね!
                </span>
            </div>
            <div class="panel-body">
                <?= nl2br(h($board->description)) ?>
            </div>
            <form method="post" action="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'changeGood', $thread->id]); ?>">
                <input type="hidden" name="board_id" value="<?= $board->id ?>">
                <button type="submit" class="
                <?php if(isset($goods_array)){
                    if(in_array($board->id, $goods_array)){
                        echo "btn btn-warning";
                    }else{
                        echo "btn btn-default";
                    }}else{
                        echo "btn btn-default";
                    }?>"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> いいね!</button>
            </form>
        </div>
    <?php endforeach ?>
</div>
    <ul class="pagination">
        <li><?= $this->Paginator->first('<<'); ?></li>
        <li><?= $this->Paginator->prev('<'); ?></li>
        <li><?= $this->Paginator->numbers(); ?></li>
        <li><?= $this->Paginator->next('>'); ?></li>
        <li><?= $this->Paginator->last('>>'); ?></li>
    </ul>
