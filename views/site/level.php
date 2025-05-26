<?php $this->registerCssFile("@web/css/urovni.css")?>
<div class="level-titleh">
    <h1>Выберите уровень турнира:</h1>
</div>
<div class="levels-container">
    <?php use yii\helpers\Html;

    if(!empty($levels)): ?>
        <?php foreach ($levels as $level): ?>
            <a href="<?php echo \yii\helpers\Url::to(['site/tournament', 'id' => $level->id]); ?>">
                <img src="img/<?php echo $level->img ?>" alt="">
                <h5><?php echo $level->name; ?></h5>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
