<form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'editInformation', $thread_id]); ?>">
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">情報</label>
        <div class="col-sm-10">
            <textarea rows="50" class="form-control" id="information" name="information" required><?php
            if(isset($information)){
                echo $information;
            }?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> 完了</button>
        </div>
    </div>
</form>
