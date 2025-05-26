<?php

use app\models\Tournament;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
$this->registerCssFile("@web/css/onetothree.css");
/** @var yii\web\View $this */
/** @var app\models\TournamentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Турниры';
?>
<div class="tournament-index chess-theme">

    <h1 class="chess-main-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить турнир', ['create'], ['class' => 'btn btn-chess']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'chess-grid'],
        'tableOptions' => ['class' => 'table table-striped table-bordered chess-table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => '#'],

            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function($model) {
                    return Html::img('@web/uploads/' . $model->img, ['width' => '50px', 'class' => 'chess-thumbnail']);
                },
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'name',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'description',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'gamemode_id',
                'value' => function ($model) {
                    return $model->gamemode->name;
                },
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'location',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'quantity_rounds',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell text-center'],
            ],
            [
                'attribute' => 'status',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => function($model) {
                    $class = 'chess-cell ';
                    $class .= $model->status == 'Завершен' ? 'chess-status-completed' :
                        ($model->status == 'Запланирован' ? 'chess-status-not-started' : 'chess-status-planned');
                    return ['class' => $class];
                },
            ],
            [
                'attribute' => 'level_id',
                'value' => function ($model) {
                    return $model->level->name;
                },
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'class' => ActionColumn::className(),
                'header' => 'Действия',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-action-cell'],
                'buttonOptions' => ['class' => 'btn btn-chess-sm'],
                'urlCreator' => function ($action, Tournament $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <div class="chess-summary">
        Показаны записи <?= $dataProvider->getCount() ?> из <?= $dataProvider->getTotalCount() ?>.
    </div>
</div>
<style>
    .chess-theme {
        font-family: 'Georgia', serif;
        background-color: #f8f1e5;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(139, 69, 19, 0.2);
    }

    .chess-main-title {
        color: #8b4513;
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .btn-chess {
        background-color: #8b4513;
        border-color: #6b3100;
        color: white;
        font-weight: bold;
        padding: 8px 20px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-chess:hover {
        background-color: #6b3100;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .btn-chess-sm {
        background-color: #8b4513;
        border-color: #6b3100;
        color: white;
        padding: 3px 8px;
        margin: 2px;
        font-size: 12px;
    }

    .chess-grid {
        background-color: #fff;
        border: 2px solid #8b4513;
        border-radius: 8px;
        overflow: hidden;
    }

    .chess-table {
        margin-bottom: 0;
    }

    .chess-header {
        background-color: #8b4513 !important;
        color: white !important;
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
    }

    .chess-cell {
        background-color: #fff;
        color: #333;
        vertical-align: middle;
        border: 1px solid #ddd !important;
    }

    .chess-table > tbody > tr:nth-child(odd) > td {
        background-color: #f0d9b5;
    }

    .chess-table > tbody > tr:nth-child(even) > td {
        background-color: #e6c9a0;
    }

    .chess-thumbnail {
        border: 2px solid #8b4513;
        border-radius: 4px;
    }

    .chess-status-completed {
        background-color: #d4edda !important;
        color: #155724;
        font-weight: bold;
    }

    .chess-status-not-started {
        background-color: #fff3cd !important;
        color: #856404;
        font-weight: bold;
    }

    .chess-status-planned {
        background-color: #d1ecf1 !important;
        color: #0c5460;
        font-weight: bold;
    }

    .chess-action-cell {
        text-align: center;
        background-color: #f8f1e5 !important;
    }

    .chess-summary {
        color: #8b4513;
        font-style: italic;
        text-align: right;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .chess-table {
            font-size: 14px;
        }

        .btn-chess {
            padding: 6px 12px;
            font-size: 14px;
        }
    }
</style>