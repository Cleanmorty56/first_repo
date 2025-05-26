<?php

use app\models\Planning;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
$this->registerCssFile("@web/css/onetothree.css");

/** @var yii\web\View $this */
/** @var app\models\PlanningSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки на планирование турнира';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planning-index chess-theme">

    <h1 class="chess-main-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-chess']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'chess-grid'],
        'tableOptions' => ['class' => 'table table-striped table-bordered chess-table'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell text-center'],
                'header' => '#'
            ],
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell text-center'],
            ],
            [
                'attribute' => 'content',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'organizer',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->username;
                },
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
                'label' => 'Пользователь'
            ],
            [
                'attribute' => 'gamemode_id',
                'value' => function ($model) {
                    return $model->gamemode->name;
                },
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
                'label' => 'Режим игры'
            ],
            [
                'attribute' => 'quantity_rounds',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell text-center'],
                'label' => 'Количество туров'
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
                'label' => 'Дата создания'
            ],
            // В массив columns GridView добавьте:
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return Planning::getStatuses()[$model->status];
                },
                'filter' => Planning::getStatuses(),
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-cell'],
            ],
            [
                'class' => ActionColumn::className(),
                'header' => 'Действия',
                'headerOptions' => ['class' => 'chess-header'],
                'contentOptions' => ['class' => 'chess-action-cell'],
                'buttonOptions' => ['class' => 'btn btn-chess-sm'],
                'template' => '{view} {update} {delete} {approve} {reject}',
                'buttons' => [
                    'approve' => function($url, $model, $key) {
                        if ($model->status != Planning::STATUS_APPROVED) {
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                                'title' => 'Одобрить',
                                'class' => 'btn btn-chess-sm btn-success',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите одобрить эту заявку?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        return '';
                    },
                    'reject' => function($url, $model, $key) {
                        if ($model->status != Planning::STATUS_REJECTED) {
                            return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                'title' => 'Отклонить',
                                'class' => 'btn btn-chess-sm btn-danger',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите отклонить эту заявку?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        return '';
                    }
                ],
                'urlCreator' => function ($action, Planning $model, $key, $index, $column) {
                    if ($action === 'approve') {
                        return Url::toRoute(['approve', 'id' => $model->id]);
                    }
                    if ($action === 'reject') {
                        return Url::toRoute(['reject', 'id' => $model->id]);
                    }
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>

<style>
    .chess-theme {
        font-family: 'Georgia', serif;
        background-color: #f8f1e5;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(139, 69, 19, 0.1);
        margin: 20px auto;
        max-width: 1200px;
    }

    .chess-main-title {
        color: #8b4513;
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        padding-bottom: 10px;
        border-bottom: 2px solid #8b4513;
    }

    .btn-chess {
        background-color: #8b4513;
        border-color: #6b3100;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 5px;
        transition: all 0.3s;
        margin-bottom: 20px;
        display: inline-block;
    }

    .btn-chess:hover {
        background-color: #6b3100;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        color: #fff;
    }

    .btn-chess-sm {
        background-color: #8b4513;
        border-color: #6b3100;
        color: white;
        padding: 3px 8px;
        margin: 2px;
        font-size: 12px;
        transition: all 0.2s;
    }

    .btn-chess-sm:hover {
        background-color: #6b3100;
    }

    .chess-grid {
        background-color: #fff;
        border: 2px solid #8b4513;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        font-size: 15px;
    }

    .chess-cell {
        background-color: #fff;
        color: #333;
        vertical-align: middle;
        border: 1px solid #e0d0b8 !important;
        padding: 12px 8px !important;
    }

    .chess-table > tbody > tr:nth-child(odd) > td {
        background-color: #f0d9b5;
    }

    .chess-table > tbody > tr:nth-child(even) > td {
        background-color: #e6c9a0;
    }

    .chess-action-cell {
        text-align: center;
        background-color: #f8f1e5 !important;
        white-space: nowrap;
    }

    .text-center {
        text-align: center;
    }

    @media (max-width: 768px) {
        .chess-theme {
            padding: 15px;
        }

        .chess-table {
            font-size: 14px;
        }

        .chess-cell {
            padding: 8px 5px !important;
        }

        .btn-chess {
            padding: 8px 15px;
            font-size: 14px;
            width: 100%;
            text-align: center;
        }
    }
</style>