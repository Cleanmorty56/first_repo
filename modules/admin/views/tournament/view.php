<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->registerCssFile("@web/css/onetothree.css");
/** @var yii\web\View $this */
/** @var app\models\Tournament $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tournament-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img',
            'name',
            'description',
            'gamemode_id',
            'location',
            'quantity_rounds',
            'status',
            'level_id',
            'registration_date',
        ],
    ]) ?>

</div>
