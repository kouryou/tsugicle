<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ツギクル
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
                    <a class="navbar-brand" href="#">ツギクル</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Top', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'overallRanking']); ?>"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>ランキング</a></li>
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'allGenres']); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>ジャンル</a></li>
                        <li><a href="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'add']); ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>投稿</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>

        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Top', 'action'=>'index']); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'overallRanking']); ?>"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>ランキング</a></li>
                    <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'allGenres']); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>ジャンル</a></li>
                    <li class="list-group-item"><a href="<?php echo $this->Url->build(['controller'=>'Threads', 'action'=>'add']); ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>投稿</a></li>
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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-77349649-1', 'auto');
      ga('send', 'pageview');

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
