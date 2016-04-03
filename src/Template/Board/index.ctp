<!-- Main component for a primary marketing message or call to action -->
<?php if(isset($board)): ?>
<h1>投稿修正</h1>
<?php else: ?>
<h1>新規投稿</h1>
<?php endif; ?>
<form class="form-horizontal" method="post" action="<?php echo $this->Url->build('/board/add/'); ?>">
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">タイトル</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($board)){ print($board->title); } ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">投稿内容</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" id="description" name="description" required><?php if(isset($board)){ print($board->description); } ?></textarea>
    </div>
  </div>
  <?php if(isset($board)): ?>
  <input type="hidden" name="id" value="<?=$board->id ?>">
  <?php endif; ?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <?php if(isset($board)): ?>
      <button type="submit" class="btn btn-default">修正する</button>
    <?php else: ?>
      <button type="submit" class="btn btn-default">投稿する</button>
    <?php endif; ?>
    </div>
  </div>
</form>
