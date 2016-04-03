<!-- Main component for a primary marketing message or call to action -->
<h1>新規投稿</h1>
<form class="form-horizontal" method="post" action="<?php echo $this->Url->build(['controller'=>'board', 'action'=>'add']); ?>">
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">タイトル</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">投稿内容</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">投稿する</button>
    </div>
  </div>
</form>
