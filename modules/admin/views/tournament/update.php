<?php

use yii\helpers\Html;
$this->registerCssFile("@web/css/onetothree.css");
/** @var yii\web\View $this */
/** @var app\models\Tournament $model */

$this->title = 'Изменить турнир: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
