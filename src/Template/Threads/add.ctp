<div class="jumbotron">
    <form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'add']); ?>">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">トピック：</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="次くるもの" class="form-control" id="title" name="title" required>
                </div>
        </div>
        <div class="form-group">
            <label for="genre_id" class="col-sm-2 control-label">ジャンル：</label>
                <div class="col-sm-10">
                    <select class="form-control" id="genre_id" name="genre_id">
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?= $genre->id ?>"><?= h($genre->title); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
        </div>
        <div class="form-group">
            <label for="tag" class="col-sm-2 control-label">タグ：</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="＃スニーカー、＃ソフトクリーム　など" class="form-control" id="tag" name="tag">
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> 投稿</button>
            </div>
        </div>
    </form>
</div>
