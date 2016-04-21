<form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'add', $thread_id, $thread_title, $genre_title]); ?>">
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">コメント</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control" id="description" name="description" required></textarea>
            </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">投稿する</button>
        </div>
    </div>
</form>
