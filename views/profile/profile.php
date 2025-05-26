<?php

use app\models\RegToTournament;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
$this->registerCssFile("@web/css/onetothree.css");

?>
<div class="profile-container">
    <div class="profile-avatar">
        <img src="img/free-icon-user-2550260.png" alt="">
        <a href="<?= Url::to(['profile/update']) ?>" class="btn btn-chess">Изменить почту</a>
        <a href="<?= Url::to(['profile/password']) ?>" class="btn btn-chess">Изменить пароль</a>
    </div>
    <div class="user-profile">
        <?php echo DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'detail-view table table-striped table-bordered chess-table'],
            'attributes' => [
                'id',
                'username',
                'first_name',
                'last_name',
                'email',
                'elo',
                'region_id',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>

        <h3 class="chess-heading">Мои турниры</h3>
        <?php if (!empty($tournaments)): ?>
            <div class="user-tournaments">
                <?php foreach ($tournaments as $t): ?>
                    <div class="user-tournament-card chess-card">
                        <h4><?= Html::encode($t->name) ?></h4>
                        <p>Статус: <?= Html::encode($t->status) ?></p>
                        <p>Дата регистрации: <?= Html::encode(RegToTournament::find()
                                ->where(['user_id' => $model->id, 'tournament_id' => $t->id])
                                ->one()->registration_date) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="chess-text">Вы не зарегистрированы ни на один турнир.</p>
        <?php endif; ?>
    </div>
</div>
<style>
    .profile-container {
        font-family: 'Georgia', serif;
        background-color: #f0d9b5;
        padding: 20px;
        border-radius: 10px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .profile-avatar {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-avatar img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid #8b4513;
        background-color: #fff;
    }

    .chess-table {
        background-color: #fff;
        border: 2px solid #8b4513 !important;
    }

    .chess-table tr:nth-child(odd) {
        background-color: #f0d9b5;
    }

    .chess-table tr:nth-child(even) {
        background-color: #b58863;
        color: white;
    }

    .chess-table th {
        background-color: #8b4513 !important;
        color: white !important;
        font-weight: bold;
        text-align: center;
    }

    .chess-heading {
        color: #8b4513;
        text-align: center;
        margin-top: 30px;
        border-bottom: 2px solid #8b4513;
        padding-bottom: 10px;
    }

    .chess-text {
        color: #8b4513;
        text-align: center;
        font-style: italic;
    }

    .user-tournaments {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .chess-card {
        background: linear-gradient(135deg, #f0d9b5 0%, #b58863 100%);
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        border: 1px solid #8b4513;
        transition: transform 0.3s;
    }

    .chess-card:hover {
        transform: translateY(-5px);
    }

    .chess-card h4 {
        margin-top: 0;
        color: #8b4513;
        text-align: center;
        font-weight: bold;
    }

    .btn-chess {
        display: inline-block;
        padding: 8px 16px;
        margin: 5px;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 2px solid #8b4513;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        background-color: #8b4513;
        transition: all 0.3s;
    }

    .btn-chess:hover {
        background-color: #6b3100;
        border-color: #6b3100;
        color: white;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .user-tournaments {
            grid-template-columns: 1fr;
        }

        .profile-avatar img {
            width: 100px;
            height: 100px;
        }
    }

     body {
         margin: 0;
         display: flex;
         flex-direction: column;
         min-height: 100vh;
     }

    main {
        flex: 1;
    }

</style>