<form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'add', $thread_id]); ?>">
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">コメント</label>
        <div class="col-sm-10">
            <textarea rows="10" class="form-control" id="description" name="description" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> 投稿する</button>
        </div>
    </div>
</form>
