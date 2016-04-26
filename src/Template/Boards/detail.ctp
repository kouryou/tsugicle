<h1><?= $thread->title ?></h1>
<form method="post">
    <input type="hidden" name="tsugicle" value="true">
    <button type="submit" class="
    <?php if(isset($tsugicles_user)){
            echo "btn btn-warning";
        }else{
            echo "btn btn-default";
        }?>">ツギクル</button>
</form>


<h2>コメント一覧</h1>
    <a href="<?= $this->Url->build(['controller'=>'Boards', 'action'=>'add', $thread->id]); ?>">コメント追加</a><br>

    <?php foreach ($boards as $board): ?>
        <div class="panel panel-info">
            <div class="panel-heading">(投稿時間:<?=$board->created ?>)</div>
            <div class="panel-body">
                <?= nl2br(h($board->description)) ?>
            </div>
            <form method="post">
                <input type="hidden" name="board_id" value="<?= $board->id ?>">
                <button type="submit" class="
                <?php if(isset($goods_array)){
                    if(in_array($board->id, $goods_array)){
                        echo "btn btn-warning";
                    }else{
                        echo "btn btn-default";
                    }}else{
                        echo "btn btn-default";
                    }?>">いいね</button>
            </form>
        </div>
    <?php endforeach ?>
