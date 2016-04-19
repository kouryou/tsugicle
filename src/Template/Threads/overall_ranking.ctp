<a href="<?php echo $this->Url->build(['controller'=>'Genres', 'action'=>'eachGenreRanking']); ?>">ジャンル別ランキングへ</a>

<h1>総合ランキング</h1>

<ul>
    <?php foreach ($threads as $thread): ?>
        <li>
            <?=$thread->title ?>
        </li>
    <?php endforeach ?>
</ul>
