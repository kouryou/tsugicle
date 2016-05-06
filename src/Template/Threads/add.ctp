<form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'add', $genre_id]); ?>">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> 投稿</button>
        </div>
    </div>
</form>
