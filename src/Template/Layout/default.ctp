<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container clearfix">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">掲示板</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $this->Url->build(['controller'=>'Top', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>投稿する</a></li>
                <li><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'my']); ?>"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>自分の投稿</a></li>
                <li><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'view']); ?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>投稿一覧</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <?php if(isset($user_id)): ?>
                <li><a href="<?php echo $this->Url->build(['controller'=>'Twitter', 'action'=>'logout']); ?>">Twitterでログアウト</a></li>
              <?php else: ?>
                <li><a href="<?php echo $this->Url->build(['controller'=>'Twitter', 'action'=>'index']); ?>">Twitterでログイン</a></li>
              <?php endif; ?>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>

        <div class="row">
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Top', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
              <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>投稿する</a></li>
              <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'my']); ?>"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>自分の投稿</a></li>
              <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Boards', 'action'=>'view']); ?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>投稿一覧</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
          </div>
         </div>
    </div>
    <footer>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
